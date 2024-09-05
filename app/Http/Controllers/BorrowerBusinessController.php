<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowerBusinessRequest;
use App\Http\Requests\UpdateBorrowerBusinessRequest;
use App\Models\Borrower;
use App\Models\BorrowerBusiness;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowerBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::findOrFail($id);
        $borrowers_business = BorrowerBusiness::where('borrower_id', $id)->get();
        return view('applicant-business.index', compact('borrowers_business','borrower'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        return view('applicant-business.create', compact('borrower'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowerBusinessRequest $request, Borrower $borrower)
    {

        $user = Auth::user();
        $request->merge([
            'borrower_id' => $borrower->id,
            'user_id' => $user->id,
        ]);
//        dd($request->all());
        DB::beginTransaction();
        try {
            $applicant_business_information = BorrowerBusiness::create($request->all());
            DB::commit();
            session()->flash('success', 'Borrower business information created successfully.');
            return to_route('applicant.applicant-business.index', $borrower->id);
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
    public function show(BorrowerBusiness $borrowerBusiness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, BorrowerBusiness $businessID)
    {
        $borrower = Borrower::findOrFail($id);
        $borrowers = BorrowerBusiness::where('borrower_id', $id)->get();
        return view('applicant-business.edit', compact('borrowers','borrower','businessID'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBorrowerBusinessRequest $request, Borrower $borrower, BorrowerBusiness $borrowerBusiness)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
        ]);
        DB::beginTransaction();
        try {
            $borrowerBusiness->update($request->all());
            DB::commit();
            session()->flash('success', 'Applicant business information successfully updated.');
            return to_route('applicant.applicant-business.edit', [$borrower->id, $borrowerBusiness->id]);
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    public function authorized(Request $request, Borrower $borrower, BorrowerBusiness $borrowerBusiness)
    {

        $user = Auth::user();
        if ($request->input('is_authorize') == 'Yes') {
            $mergeData['authorizer_id'] = $user->id;
            $mergeData['is_authorize'] = $request->is_authorize;
        }

        $request->merge($mergeData);

        DB::beginTransaction();
        try {
            $borrowerBusiness->update($request->all());
            DB::commit();
            session()->flash('success', 'Applicant business information successfully updated.');
            return to_route('applicant.applicant-business.index', [$borrower->id]);
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
    public function destroy(Borrower $borrower, BorrowerBusiness $borrowerBusiness)
    {
        DB::beginTransaction();
        try {
            $borrowerBusiness->delete();
            DB::commit();
            session()->flash('error', 'Applicant deleted successfully.');
            return to_route('applicant.applicant-business.index', [$borrower->id]);
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
