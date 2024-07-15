<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowerRequest;
use App\Http\Requests\UpdateBorrowerRequest;
use App\Models\Borrower;
use App\Models\Branch;
use App\Models\LoanCategory;
use App\Models\LoanSubCategory;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $borrowers = QueryBuilder::for(Borrower::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('user_id'),
                AllowedFilter::exact('authorizer_id'),
                AllowedFilter::exact('region_id'),
                AllowedFilter::exact('branch_id'),
                'borrower_type',
                AllowedFilter::exact('loan_category_id'),
                AllowedFilter::exact('loan_sub_category_id'),
                'name',
                'relationship_status',
                'gender',
                'national_id_cnic',
                'ntn',
                'education_qualification',
                'email',
                'mobile_number',
                'occupation_title',
                AllowedFilter::scope('date_of_birth_between'),
                'marital_status',
                'home_ownership_status',
                'nationality',
                AllowedFilter::scope('date_registered_between'),
            ])
            ->with(['region', 'branch', 'loan_category', 'loan_sub_category'])
            ->paginate(15)
            ->withQueryString();

//        $borrowers = QueryBuilder::for(Borrower::class)
//            ->allowedIncludes([
//                'branch',
//                'region',
//                'loan_category',
//                'loan_sub_category',
//                'latestStatus',
//                'latestStatus.status',
//                'sessionYear.session',
//                'applied_for_certificates.certificate_category_id',
//                'adt',
//                'blood_group',
//                'cfs',
//                'schedules',
//                'fee_schedules',
//                'student_balance',
//                'exam_marks',
//                'notes',
//                'issued_certificates',
//            ])
//            ->allowedFilters([
//                AllowedFilter::exact('id'),
//                AllowedFilter::exact('branch_id'),
//                AllowedFilter::exact('blood_group_id'),
//                AllowedFilter::exact('gender'),
//                AllowedFilter::exact('district'),
//                AllowedFilter::scope('age_between', 'ageBetween'),
//                AllowedFilter::exact('cnic'),
//                AllowedFilter::exact('qualification'),
//                AllowedFilter::exact('mobile_no'),
//                AllowedFilter::exact('guardian_emergency_contact'),
//                AllowedFilter::exact('mobile_number_for_sms_alert'),
//                AllowedFilter::exact('certification_required'),
//                AllowedFilter::exact('admission_type'),
//                AllowedFilter::exact('computer_knowledge'),
//                AllowedFilter::exact('phone_network_id'),
//                AllowedFilter::exact('session_year_id'),
//
//                AllowedFilter::scope('age_between', 'ageBetween'),
//                AllowedFilter::exact('admission_date'),
//                AllowedFilter::partial('admission_no'),
//                AllowedFilter::partial('roll_no'),
//                AllowedFilter::partial('firstname'),
//                AllowedFilter::partial('lastname'),
//                AllowedFilter::partial('father_name'),
//                AllowedFilter::partial('email'),
////                AllowedFilter::exact('bloodGroup.id'),
//                AllowedFilter::exact('latestStatus.status_id'),
//                AllowedFilter::exact('applied_for_certificates.certificate_category_id'),
//                AllowedFilter::scope('starts_between'),
//                'section.id',
//                'category.id',
//                'dob', 'religion', 'cast', 'house', 'height', 'weight', 'measure_date', 'fees_discount',
//            ])
////            ->defaultSort('firstname')
//            ->with([
//                'branch',
//                'region',
//                'loan_category',
//                'loan_sub_category',
//                'latestStatus',
//                'latestStatus.status',
//                'sessionYear.session',
//                'applied_for_certificates.certificate',
//                'adt',
//                'blood_group',
//                'cfs',
//                'schedules',
//                'fee_schedules',
//                'student_balance',
//                'exam_marks',
//                'notes',
//                'issued_certificates',
//            ])->get();


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
            'branch_id' => $user->branch_id,
            'region_id' => $user->branch->region_id,
            'date_registered' => now(),
        ]);
        // Assuming 'date_of_birth' is in the format 'Y-m-d'
        $dateOfBirth = $request->date_of_birth;

        // Create a Carbon instance from the date of birth
        $dob = Carbon::parse($dateOfBirth);

        // Calculate the age
        $age = $dob->diffInYears(Carbon::now());

        DB::beginTransaction();
        try {
            $borrower = Borrower::create([
                'user_id' => $request->user_id,
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
                'residence_phone_number' => $request->residence_phone_number,
                'office_phone_number' => $request->office_phone_number,
                'mobile_number' => $request->mobile_number,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'occupation_title' => $request->occupation_title,
                'date_of_birth' => $request->date_of_birth,
                'age' => $age,
                'marital_status' => $request->marital_status,
                'home_ownership_status' => $request->home_ownership_status,
                'nationality' => $request->nationality,
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
            $borrower->update([
                'user_id' => $request->user_id,
                'authorizer_id' => NULL,
                'region_id' => $request->region_id,
                'branch_id' => $request->branch_id,
                'borrower_type' => $request->borrower_type,
                'loan_category_id' => $request->loan_category_id,
                'loan_sub_category_id' => $request->loan_sub_category_id,
                'name' => $request->name,
                'relationship_status' => $request->relationship_status,
                'parent_spouse_name' => $request->parent_spouse_name,
                'gender' => $request->gender,
                'national_id_cnic' => $request->national_id_cnic,
                'ntn' => $request->ntn,
                'parent_spouse_national_id_cnic' => $request->parent_spouse_national_id_cnic,
                'number_of_dependents' => $request->number_of_dependents,
                'education_qualification' => $request->education_qualification,
                'email' => $request->email,
                'fax' => $request->fax,
                'residence_phone_number' => $request->residence_phone_number,
                'office_phone_number' => $request->office_phone_number,
                'mobile_number' => $request->mobile_number,
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
}
