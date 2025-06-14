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
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BorrowerController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */


    public static function middleware(): array
    {
        return [
            new Middleware('role_or_permission:inputter', only: ['create']),
            new Middleware('role_or_permission:borrower edit', only: ['edit']),
            new Middleware('role_or_permission:borrower edit', only: ['update']),
        ];
    }

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
//            $query->where('branch_id', $user->branch_id);
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
                AllowedFilter::exact('pending_at_region'),
                AllowedFilter::exact('pending_at_branch'),
                AllowedFilter::exact('pending_at_head_office'),
                AllowedFilter::exact('latestStatus.loan_status_id'),
                AllowedFilter::exact('latestStatus.loanStatus.name'),

//                'latestStatus',
//                'latestStatus.loanStatus',
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
            ->with([
                'region',
                'branch',
                'loan_category',
                'loan_sub_category',
                'latestStatus',
                'latestStatus.loanStatus'
                ])
            ->paginate(15)
            ->withQueryString();

        $regions = Region::all();
        $branches = Branch::all();
        $loanCategories = LoanCategory::all();
        $loanSubCategories = LoanSubCategory::all();

        return view('borrowers.index', compact('borrowers', 'user', 'regions', 'branches', 'loanCategories', 'loanSubCategories'));
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
            'region_id' => $user->branch->region_id,
            'branch_id' => $user->branch_id,
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
        $user = Auth::user();

        return view('borrowers.print', compact('borrower','user'));
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

    function base64EncodeImage($path) {
        Log::info("Original path: " . $path);

        if ($path === 'images/logo.png') {
            $fullPath = public_path($path);
        } else if (strpos($path, '/') === 0 || (PHP_OS_FAMILY === 'Windows' && strpos($path, ':\\') === 1)) {
            $fullPath = $path;
        } else {
            $fullPath = storage_path('app/public/' . $path);
        }

        Log::info("Attempting to access: " . $fullPath);

        if (!file_exists($fullPath)) {
            Log::error("File does not exist: $fullPath");
            return null;
        }

        if (!is_readable($fullPath)) {
            Log::error("File is not readable: $fullPath");
            return null;
        }

        $imageData = @file_get_contents($fullPath);
        if ($imageData === false) {
            $errorMessage = "Failed to read file contents: $fullPath. Error: " . error_get_last()['message'];
            Log::error($errorMessage);
            return null;
        }

        $base64 = base64_encode($imageData);
        $mimeType = mime_content_type($fullPath) ?: 'application/octet-stream';

        Log::info("Successfully encoded image: $fullPath");
        return 'data:' . $mimeType . ';base64,' . $base64;
    }

    public function download(Borrower $borrower)
    {
        ini_set('pcre.backtrack_limit', '5000000');
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-32',
            'format' => 'A4-P',
            'margin_left' => 12.7,
            'margin_right' => 12.7,
            'margin_top' => 12.7,
            'margin_bottom' => 12.7,
//            'margin_header' => 5,
            'margin_footer' => 10,
            'dpi' => 150,
            'default_font' => 'sans-serif'
        ]);

        $mpdf->SetTitle('Borrower Information');
        $mpdf->SetAuthor('Your Application Name');

        // Add page numbers
        $mpdf->SetFooter( 'Print Date: ' . date('d-m-Y H:i:s') . ', UID:' . Auth::user()->id . ', BID: ' . $borrower->id . '  <br>Page {PAGENO} of {nbpg} ' );


        // Convert the logo image to Base64
        $imagePath = 'images/logo.png';
        $base64Image = $this->base64EncodeImage($imagePath);

        // Prepare documents
        $documents = [];
        if ($borrower->documents->isNotEmpty()) {
            foreach ($borrower->documents as $document) {
                $result = $this->base64EncodeImage($document->path_attachment);
                if ($result) {
                    $documents[] = [
                        'image' => $result,
                        'type' => $document->document_type,
                    ];
                } else {
                    $documents[] = [
                        'error' => "Could not load document",
                        'type' => $document->document_type,
                    ];
                }
            }
        }



        // Render the main content
        $html = view('borrowers.download', compact('borrower', 'base64Image', 'documents'))->render();

        // Write the HTML content to the PDF
        $mpdf->WriteHTML($html);


        // Generate a unique filename
        $filename = 'borrower_' . $borrower->id . '_' . time() . '.pdf';

        // Save the PDF to storage
//        Storage::put('borrower_pdfs/' . $filename, $mpdf->Output('', 'S'));

        // Output the PDF for download
        return response($mpdf->Output($filename, 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        // Output the PDF
//        return $mpdf->Output('borrower.pdf', 'I');
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


            if ($user->hasRole(['Branch Credit Manager','Branch Credit Officer']))
            {
                // 1: Draft , 2: Returned With Observation , 3: Submitted , 4: In Process, 5: Approved, 6: Declined
                $loan_status_id = 1;
                $borrower->pending_at_branch = "Yes";

                $branch_manager = User::where('branch_id', $user->branch_id)->role('Branch Manager')->get();

                foreach ($branch_manager as $bm) {
                    $loan_status_histories = LoanStatusHistory::create([
                        'submit_by' => $user->id,
                        'submit_to' => $bm->id,
                        'borrower_id' => $borrower->id,
                        'name' => $request->name,
                        'designation' => $request->designation,
                        'placement' => $request->placement,
                        'employee_no' => $request->employee_no,
                        'description' => "It is recommended to proceed for authorization, as per bank policy." . $request->description,
                        'loan_status_id' => $loan_status_id,
                        'attachment' => NULL,
                    ]);
                }

            } elseif($user->hasRole(['Branch Manager']))
            {
                $submit_to_user= User::find($request->submit_to);
                if ($submit_to_user->hasRole('Regional Credit Manager'))
                {
                    $borrower->update(['is_authorize' => 'Yes', 'authorizer_id' => $user->id, 'pending_at_branch' => 'No', 'is_lock' => 'Yes', 'status' => 'Submitted',]);
                    $borrower->employment_information?->update(['authorizer_id' => $user->id, 'is_authorize' => 'Yes']);
                    $borrower->applicant_requested_loan_information?->update(['authorizer_id' => $user->id, 'is_authorize' => 'Yes']);

                    // 1: Draft , 2: Returned With Observation , 3: Submitted , 4: In Process, 5: Approved, 6: Declined
                    $loan_status_id = 3;


                    // get the region first which region it belongs to
                    $region_id = $borrower->branch->region_id;
                    // Fetch all users with the role "Regional Credit Manager"
                    $regional_credit_manager = User::role('Regional Credit Manager')->where('branch_id', $borrower->branch_id)->get();

                    foreach ($regional_credit_manager as $rcm) {
                        $loan_status_histories = LoanStatusHistory::create([
                            'submit_by' => $user->id,
                            'submit_to' => $rcm->id,
                            'borrower_id' => $borrower->id,
                            'name' => $request->name,
                            'designation' => $request->designation,
                            'placement' => $request->placement,
                            'employee_no' => $request->employee_no,
                            'description' => "This application has been reviewed and meets all necessary criteria outlined in our bank's current policies, guidelines before submitting, and confirming my password for verification. It is recommended to proceed for approval, as per bank policy." . $request->description,
                            'loan_status_id' => $loan_status_id,
                            'attachment' => NULL,
                        ]);
                    }
                }
                elseif($submit_to_user->hasRole(['Branch Credit Manager','Branch Credit Officer'])) {

                    // 1: Draft , 2: Returned With Observation , 3: Submitted , 4: In Process, 5: Approved, 6: Declined
                    $loan_status_id = 1;
                    $borrower->pending_at_branch = "Yes";
                    $borrower->save();

                    $loan_status_histories = LoanStatusHistory::create([
                        'submit_by' => $user->id,
                        'submit_to' => $request->submit_to,
                        'borrower_id' => $borrower->id,
                        'name' => $request->name,
                        'designation' => $request->designation,
                        'placement' => $request->placement,
                        'employee_no' => $request->employee_no,
                        'description' => $request->description,
                        'loan_status_id' => $loan_status_id,
                        'attachment' => NULL,
                    ]);

                }

            }




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
