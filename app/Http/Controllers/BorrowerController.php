<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowerRequest;
use App\Http\Requests\UpdateBorrowerRequest;
use App\Models\Borrower;

class BorrowerController extends Controller
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
