<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowerRequest;
use App\Http\Requests\UpdateBorrowerRequest;
use App\Models\Borrower;
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
            ->allowedIncludes([
//                'branch',
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
            ])
            ->allowedFilters([
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
            ])
//            ->defaultSort('firstname')
            ->with([
//                'branch',
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
            ])->get();
        return view('borrowers.index', compact('borrowers'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrower $borrower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrower $borrower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBorrowerRequest $request, Borrower $borrower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower)
    {
        //
    }
}
