<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestedLoanAmountRequest;
use App\Http\Requests\UpdateRequestedLoanAmountRequest;
use App\Models\Borrower;
use App\Models\BorrowerEmploymentInformation;
use App\Models\RequestedLoanAmount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestedLoanAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreRequestedLoanAmountRequest $request, Borrower $borrower)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'borrower_id' => $borrower->id,
            'loan_category_id' => $borrower->loan_category_id,
            'loan_sub_category_id' => $borrower->loan_sub_category_id,
            'currency' => 'PKR',
        ]);

        DB::beginTransaction();
        try {
            $requested_loan_amount = RequestedLoanAmount::create($request->all());
            DB::commit();
            session()->flash('success', 'Applicant requested for loan created successfully.');
            return to_route('applicant.requested-loan-information.edit',$borrower->id);
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
    public function show(RequestedLoanAmount $requestedLoanAmount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrower $borrower)
    {
        return view('requested-loan-information.edit', compact('borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestedLoanAmountRequest $request, Borrower $borrower, RequestedLoanAmount $requestedLoanAmount)
    {


        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'borrower_id' => $borrower->id,
            'loan_category_id' => $borrower->loan_category_id,
            'loan_sub_category_id' => $borrower->loan_sub_category_id,
            'currency' => 'PKR',
        ]);

        DB::beginTransaction();
        try {
            $requestedLoanAmount->update($request->all());
            DB::commit();
            session()->flash('success', 'Applicant requested for loan update successfully.');
            return to_route('applicant.requested-loan-information.edit',$borrower->id);
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
    public function destroy(RequestedLoanAmount $requestedLoanAmount)
    {
        //
    }
}
