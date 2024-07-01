<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalNetWorthStatRequest;
use App\Http\Requests\UpdatePersonalNetWorthStatRequest;
use App\Models\Borrower;
use App\Models\PersonalNetWorthStat;

class PersonalNetWorthStatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index($id)
//    {
//        $borrower = Borrower::with('reference')->findOrFail($id);
//
//        $official_or_business_address = null;
//        $landline_telephone = null;
//        $residential_address = $borrower->permanent_address;
//        $residential_phone_number = $borrower->residence_phone_number;
//
//        if (!empty($borrower->applicant_business)) {
//            $official_or_business_address = $borrower->applicant_business;
//        } elseif (!empty($borrower->employment_information)) {
//            $official_or_business_address = $borrower->employment_information;
//        }
//
//        if (!empty($borrower->applicant_business)) {
//            $landline_telephone = $borrower->applicant_business?->landline;
//        } elseif (!empty($borrower->employment_information)) {
//            $landline_telephone = $borrower->employment_information?->office_phone_number;
//        }
//
//
//        $personalNetWorthStat = $borrower->personalNetWorthStat ?? $borrower->personalNetWorthStat()->create([
//            'borrower_id' => $id,
//            'name' => $borrower->name,
//            'nic_no' => $borrower->national_id_cnic,
//            'father_name' => $borrower->parent_spouse_name,
//            'ntn_no' => $borrower->ntn,
//            'business_address' => $borrower->ntn,
//            'tel_office' => $borrower->ntn,
//            'res_address' => $borrower->ntn,
//            'tel_res' => $borrower->ntn,
//        ]);
//
//
//        return view('pnws-consumer.index-pnws-consumer', compact('borrower'));
//    }

    public function index($id)
    {
        $borrower = Borrower::with('reference', 'personalNetWorthStat')->findOrFail($id);
        return view('pnws-consumer.index-pnws-consumer', compact('borrower'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonalNetWorthStatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalNetWorthStat $personalNetWorthStat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalNetWorthStat $personalNetWorthStat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonalNetWorthStatRequest $request, PersonalNetWorthStat $personalNetWorthStat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalNetWorthStat $personalNetWorthStat)
    {
        //
    }
}
