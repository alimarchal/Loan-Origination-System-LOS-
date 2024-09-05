<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinanceFacilityRequest;
use App\Http\Requests\UpdateFinanceFacilityRequest;
use App\Models\Borrower;
use App\Models\FinanceFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinanceFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::findOrFail($id);
        $finance_facilities = FinanceFacility::where('borrower_id', $id)->get();
        return view('finance_facility.index', compact('finance_facilities', 'borrower'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        return view('finance_facility.create', compact('borrower'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinanceFacilityRequest $request, Borrower $borrower)
    {
        $user = Auth::user();
        $request->merge([
            'borrower_id' => $borrower->id,
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            $finance_facility = FinanceFacility::create($request->all());
            DB::commit();
            session()->flash('success', 'Finance facility created successfully.');
            return to_route('finance_facility.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FinanceFacility $financeFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, FinanceFacility $financeFacility)
    {
        $borrower = Borrower::findOrFail($id);
        return view('finance_facility.edit', compact('financeFacility', 'borrower'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinanceFacilityRequest $request, Borrower $borrower, FinanceFacility $financeFacility)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            $financeFacility->update($request->all());
            DB::commit();
            session()->flash('success', 'Finance facility successfully updated.');
            return to_route('finance_facility.edit', [$borrower->id, $financeFacility->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    public function authorized(Request $request, Borrower $borrower, FinanceFacility $financeFacility)
    {
        $user = Auth::user();
        if ($request->input('is_authorize') == 'Yes') {
            $mergeData['authorizer_id'] = $user->id;
            $mergeData['is_authorize'] = $request->is_authorize;
        }

        $request->merge($mergeData);

        DB::beginTransaction();
        try {
            $financeFacility->update($request->all());
            DB::commit();
            session()->flash('success', 'Finance facility successfully updated.');
            return to_route('finance_facility.index', [$borrower->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower, FinanceFacility $financeFacility)
    {
        DB::beginTransaction();
        try {
            $financeFacility->delete();
            DB::commit();
            session()->flash('success', 'Finance facility deleted successfully.');
            return to_route('finance_facility.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
