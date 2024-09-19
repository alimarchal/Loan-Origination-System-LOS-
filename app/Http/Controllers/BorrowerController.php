<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowerRequest;
use App\Http\Requests\UpdateBorrowerRequest;
use App\Models\Borrower;
use App\Models\Branch;
use App\Models\LoanCategory;
use App\Models\LoanStatus;
use App\Models\LoanStatusHistory;
use App\Models\LoanSubCategory;
use App\Models\ObligorScoreCard;
use App\Models\ObligorScoreCardFactor;
use App\Models\Region;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $query = Borrower::query();

        if ($user->hasRole('Super-Admin')) {
            // Super Admin can see all borrowers
        } elseif ($user->hasRole('Branch Manager')) {
            // Branch Manager can see borrowers from their branch
            $query->where('branch_id', $user->branch_id);
        } elseif ($user->hasRole('Regional Chief')) {
            // Regional Chief can see borrowers from their region
            $query->whereHas('branch', function ($q) use ($user) {
                $q->where('region_id', $user->branch->region_id);
            });
        } else {
            // Other roles can only see borrowers from their branch
            $query->where('branch_id', $user->branch_id);
        }

        $borrowers = QueryBuilder::for($query)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('user_id'),
                AllowedFilter::exact('authorizer_id'),
                AllowedFilter::exact('region_id'),
                AllowedFilter::exact('branch_id'),
                AllowedFilter::scope('date_registered_between'),
                AllowedFilter::scope('date_of_birth_between'),
                AllowedFilter::exact('loan_category_id'),
                AllowedFilter::exact('loan_sub_category_id'),
                'borrower_type',
                'name',
                'relationship_status',
                'gender',
                'national_id_cnic',
                'ntn',
                'education_qualification',
                'email',
                'mobile_number',
                'occupation_title',
                'marital_status',
                'home_ownership_status',
                'nationality',
            ])
            ->with(['region', 'branch', 'loan_category', 'loan_sub_category'])
            ->paginate(15)
            ->withQueryString();

        $regions = Region::all();
        $branches = Branch::all();
        $loanCategories = LoanCategory::all();
        $loanSubCategories = LoanSubCategory::all();

        return view('borrowers.index', compact('borrowers', 'regions', 'branches', 'loanCategories', 'loanSubCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrowers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowerRequest $request)
    {

        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'date_registered' => now(),
            'nationality' => "Pakistani/AJK Resident",
        ]);
        // Assuming 'date_of_birth' is in the format 'Y-m-d'
        $dateOfBirth = $request->date_of_birth;

        // Create a Carbon instance from the date of birth
        $dob = Carbon::parse($dateOfBirth);

        // Calculate the age
        $age = round($dob->diffInYears(Carbon::now()),1);

        DB::beginTransaction();
        try {
            $borrower = Borrower::create([
                'user_id' => $request->user_id,
                'credit_reporting_id' => $request->credit_reporting_id,
                'authorizer_id' => NULL,
                'region_id' => $request->region_id,
                'branch_id' => $request->branch_id,
                'borrower_type' => $request->borrower_type,
                'date_registered' => $request->date_registered,
                'loan_category_id' => $request->loan_category_id,
                'loan_sub_category_id' => $request->loan_sub_category_id,
                'name' => $request->name,
                'relationship_status' => $request->relationship_status,
                'parent_spouse_name' => $request->parent_spouse_name,
                'gender' => $request->gender,
                'national_id_cnic' => $request->national_id_cnic,
                'parent_spouse_national_id_cnic' => $request->parent_spouse_national_id_cnic,
                'number_of_dependents' => $request->number_of_dependents,
                'education_qualification' => $request->education_qualification,
                'email' => $request->email,
                'fax' => $request->fax,
                'mobile_number' => $request->mobile_number,
                'phone_number' => $request->phone_number,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'occupation_title' => $request->occupation_title,
                'date_of_birth' => $request->date_of_birth,
                'age' => $age,
                'marital_status' => $request->marital_status,
                'home_ownership_status' => $request->home_ownership_status,
                'nationality' => $request->nationality,
                'next_of_kin_name' => $request->next_of_kin_name,
                'next_of_kin_mobile_number' => $request->next_of_kin_mobile_number,
                'nadra_verification_for_signature' => NULL,
                'signature_date' => NULL,
                'nadra_verification_scanned_attachment' => NULL,
                'digital_signature_scanned_attachment' => NULL,
            ]);


            if ($request->hasFile('cnic_back')) {
                $cnicBackPic = $request->file('cnic_back')->store('cnic_back_pictures', 'public');
                $request->merge(['cnic_back_picture' => $cnicBackPic]);
            }

            DB::commit();
            session()->flash('success', 'Borrower created  successfully.');
            return to_route('applicant.edit',$borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrower $borrower)
    {
        return view('borrowers.print', compact('borrower'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrower $borrower)
    {
        return view('borrowers.edit', compact('borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBorrowerRequest $request, Borrower $borrower)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'branch_id' => $user->branch_id,
            'region_id' => $user->branch->region_id,
            'nationality' => "Pakistani/AJK Resident",
        ]);
        // Assuming 'date_of_birth' is in the format 'Y-m-d'
        $dateOfBirth = $request->date_of_birth;

        // Create a Carbon instance from the date of birth
        $dob = Carbon::parse($dateOfBirth);

        // Calculate the age
        $age = $dob->diffInYears(Carbon::now());

        DB::beginTransaction();
        try {
            $borrower->update($request->all());
            DB::commit();
            session()->flash('success', 'Borrower updated  successfully.');
            return to_route('applicant.edit', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    public function authorized(Request $request, Borrower $borrower)
    {
        $user = Auth::user();

        if ($request->input('is_authorize') == 'Yes') {
            $mergeData['authorizer_id'] = $user->id;
            $mergeData['is_authorize'] = $request->is_authorize;
        }

        $request->merge($mergeData);

        DB::beginTransaction();
        try {
            $borrower->update($request->all());
            DB::commit();
            session()->flash('success', 'Authorized updated successfully.');
            return to_route('applicant.edit', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower)
    {
        //
    }


    public function make_template()
    {
        $fillable = [
            'user_id' => 'select',
            'authorizer_id' => 'select',
            'region_id' => 'select',
            'branch_id' => 'select',
            'borrower_type' => 'select',
            'date_registered' => 'date',
            'loan_category_id' => 'select',
            'loan_sub_category_id' => 'select',
            'name' => 'text',
            'relationship_status' => 'select',
            'parent_spouse_name' => 'text',
            'gender' => 'select',
            'national_id_cnic' => 'text',
            'parent_spouse_national_id_cnic' => 'text',
            'number_of_dependents' => 'number',
            'education_qualification' => 'text',
            'email' => 'email',
            'fax' => 'text',
            'nature_of_business' => 'text',
            'details_of_payment_schedule_if_sought' => 'text',
            'residence_phone_number' => 'text',
            'office_phone_number' => 'text',
            'mobile_number' => 'text',
            'present_address' => 'text',
            'permanent_address' => 'text',
            'occupation_title' => 'text',
            'job_title' => 'text',
            'date_of_birth' => 'date',
            'age' => 'number',
            'marital_status' => 'select',
            'home_ownership_status' => 'select',
            'nationality' => 'text',
            'next_of_kin_name' => 'text',
            'next_of_kin_mobile_number' => 'text',
            'business_name' => 'text',
            'business_address' => 'text',
            'business_contact_number' => 'text',
            'business_email' => 'email',
            'business_registration_number' => 'text',
            'nadra_verification_for_signature' => 'select',
            'signature_date' => 'date',
            'nadra_verification_scanned_attachment' => 'file',
            'digital_signature_scanned_attachment' => 'file'
        ];

        return view('borrowers.make-template', compact('fillable'));
    }


    public function print(Borrower $borrower)
    {



        return view('borrowers.print', compact('borrower'));
    }

    public function download(Borrower $borrower)
    {

        // Create a new instance of mPDF
        $mpdf = new Mpdf([
            'mode' => 'utf-32',
            'format' => 'A4-P', // 'P' for Portrait, 'L' for Landscape
            'dpi' => 150, // High DPI setting
            'default_font' => 'sans-serif',
        ]);

        // Convert the image to Base64
        $imagePath = public_path('images/logo.png');
        $base64Image = $this->base64EncodeImage($imagePath);

        // Render the Blade view to HTML
        $html = View::make('borrowers.download', compact('borrower','base64Image'))->render();

        // Write the HTML content to the PDF
        $mpdf->WriteHTML($html);

        // Output the PDF (you can specify a filename and options here)
        return $mpdf->Output('borrower.pdf', 'I'); // 'I' for inline display, 'D' for download
//        $pdf = Pdf::loadView('borrowers.download', compact('borrower'));
//
//        $pdf->setPaper('A4', 'portrait');
//        $pdf->setOptions([
//            'dpi' => 150,
//            'defaultFont' => 'sans-serif',
//            'isHtml5ParserEnabled' => true,
//            'isRemoteEnabled' => true
//        ]);
//        return $pdf->download('applicant_information.pdf');
////        return $pdf->stream("", array("Attachment" => false));
    }

    function base64EncodeImage($path) {
        $imageData = file_get_contents($path);
        $base64 = base64_encode($imageData);
        $mimeType = mime_content_type($path);
        return 'data:' . $mimeType . ';base64,' . $base64;
    }


    public function submit_for_approval_view(Request $request, Borrower $borrower)
    {
        if($borrower->is_lock === "No"){
            return view('borrowers.approval.consumer.salary_submit_for_approval_branch', compact('borrower'));
        } elseif($borrower->is_lock === "Yes")
        {
            session()->flash('error', 'Your have already submitted your case. Your borrower status is lock.');
            return to_route('applicant.checklist.show', $borrower->id);
        }
    }


    public function submit_consumer_salary(Request $request, Borrower $borrower)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'placement' => 'required',
            'employee_no' => 'required',
            'description' => 'required',
            'password_confirmation' => 'required',
        ]);
        // Check if the provided password matches the user's password
        if (!Hash::check($request->password_confirmation, auth()->user()->password)) {
            return back()->withErrors(['password_confirmation' => 'The provided password is incorrect.']);
        }

        $user = Auth::user();

        DB::beginTransaction();
        try {

            $borrower->update(['is_authorize' => 'Yes', 'authorizer_id' => $user->id, 'pending_at_branch' => 'No', 'is_lock' => 'Yes', 'status' => 'Submitted',]);
            $borrower->employment_information?->update(['authorizer_id' => $user->id, 'is_authorize' => 'Yes']);
            $borrower->applicant_requested_loan_information?->update(['authorizer_id' => $user->id, 'is_authorize' => 'Yes']);

            // 1: Draft , 2: Returned With Observation , 3: Submitted , 4: In Process, 5: Approved, 6: Declined
            $loan_status_id = 3;

            $loan_status_histories = LoanStatusHistory::create([
                'submit_by' => $user->id,
                'submit_to' => NULL,
                'borrower_id' => $borrower->id,
                'name' => $request->name,
                'designation' => $request->designation,
                'placement' => $request->placement,
                'employee_no' => $request->employee_no,
                'description' => "This application has been reviewed and meets all necessary criteria outlined in our bank's current policies, guidelines before submitting, and confirming my password for verification. It is recommended to proceed for approval, as per bank policy." . $request->description,
                'loan_status_id' => $loan_status_id,
                'attachment' => NULL,
            ]);

            DB::commit();
            session()->flash('success', 'Applicant details have been successfully submitted for approval.');
            return to_route('applicant.index');
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }

    }



}