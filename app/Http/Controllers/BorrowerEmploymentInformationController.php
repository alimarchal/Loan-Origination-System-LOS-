<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowerEmploymentInformationRequest;
use App\Http\Requests\UpdateBorrowerEmploymentInformationRequest;
use App\Models\Borrower;
use App\Models\BorrowerEmploymentInformation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowerEmploymentInformationController extends Controller
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
    public function store(StoreBorrowerEmploymentInformationRequest $request, Borrower $borrower)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'branch_id' => $user->branch_id,
            'region_id' => $user->branch->region_id,
            'borrower_id' => $borrower->id,
        ]);

        DB::beginTransaction();
        try {
            $employment_information = BorrowerEmploymentInformation::create($request->all());
            DB::commit();
            session()->flash('success', 'Borrower employment information created successfully.');
            return to_route('applicant.employment-information.edit',$borrower->id);
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
    public function show(BorrowerEmploymentInformation $borrowerEmploymentInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrower $borrower)
    {
        return view('borrowers-employment-information.edit', compact('borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBorrowerEmploymentInformationRequest $request, Borrower $borrower, BorrowerEmploymentInformation $borrowerEmploymentInformation)
    {


        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'branch_id' => $user->branch_id,
            'region_id' => $user->branch->region_id,
            'borrower_id' => $borrower->id,
        ]);

        DB::beginTransaction();
        try {
            $borrowerEmploymentInformation->update($request->all());
            DB::commit();
            session()->flash('success', 'Borrower employment information update successfully.');
            return to_route('applicant.employment-information.edit',$borrower->id);
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
    public function destroy(BorrowerEmploymentInformation $borrowerEmploymentInformation)
    {
        //
    }
}
