<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChecklistRequest;
use App\Http\Requests\UpdateChecklistRequest;
use App\Models\Borrower;
use App\Models\Checklist;

class ChecklistController extends Controller
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
    public function store(StoreChecklistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrower  $borrower)
    {
        return view('checklist.show', compact('borrower'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checklist $checklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChecklistRequest $request, Checklist $checklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist)
    {
        //
    }
    public function show($borrowerId)
    {
        $borrower = Borrower::with('loan_sub_category')->findOrFail($borrowerId);
        $checklistItems = Checklist::where('loan_sub_category_id', $borrower->loan_sub_category->id)->get();

        // Debugging: Check if the data is fetched correctly
        dd($checklistItems);

        return view('download-checklist', [
            'borrower' => $borrower,
            'checklistItems' => $checklistItems,
        ]);
    }

}