<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanStatusRequest;
use App\Http\Requests\UpdateLoanStatusRequest;
use App\Models\LoanStatus;

class LoanStatusController extends Controller
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
    public function store(StoreLoanStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanStatus $loanStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanStatus $loanStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanStatusRequest $request, LoanStatus $loanStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanStatus $loanStatus)
    {
        //
    }
}
