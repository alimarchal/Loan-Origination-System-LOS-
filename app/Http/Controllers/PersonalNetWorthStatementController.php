<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalNetWorthStatementRequest;
use App\Http\Requests\UpdatePersonalNetWorthStatementRequest;
use App\Models\Borrower;
use App\Models\PersonalNetWorthStatement;

class PersonalNetWorthStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::with('reference')->findOrFail($id);
        return view('pnws-consumer.index-pnws-consumer', compact( 'borrower'));
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
    public function store(StorePersonalNetWorthStatementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalNetWorthStatement $personalNetWorthStatement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalNetWorthStatement $personalNetWorthStatement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonalNetWorthStatementRequest $request, PersonalNetWorthStatement $personalNetWorthStatement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalNetWorthStatement $personalNetWorthStatement)
    {
        //
    }
}
