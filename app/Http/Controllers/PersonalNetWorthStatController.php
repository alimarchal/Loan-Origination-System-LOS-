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
    public function index($id)
    {
        $borrower = Borrower::with('reference')->findOrFail($id);
        $personalNetWorthStat = $borrower->personalNetWorthStat ?? $borrower->personalNetWorthStat()->create();

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
