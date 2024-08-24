<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditReportingRequest;
use App\Http\Requests\UpdateCreditReportingRequest;
use App\Models\CreditReporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class CreditReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $credit_reporting = QueryBuilder::for(CreditReporting::query())
            ->allowedFilters([
                AllowedFilter::exact('branch_id'),
                AllowedFilter::exact('national_id_cnic'),
                AllowedFilter::exact('status'),
                AllowedFilter::exact('id'),
                AllowedFilter::partial('name'),
            ])
            ->orderBy('created_at', 'desc') // Adjust the column and order as needed
            ->get();

        return view('credit-reporting.index', compact('credit_reporting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('credit-reporting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditReportingRequest $request)
    {

        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'branch_id' => $user->branch_id,
        ]);


        DB::beginTransaction();
        try {
            $credit_reporting = CreditReporting::create([
                'user_id' => $request->user_id,
                'branch_id' => $request->branch_id,
                'name' => $request->name,
                'national_id_cnic' => $request->national_id_cnic,
            ]);

            DB::commit();
            session()->flash('success', 'Request for Data Check Credit send to region successfully.');
            return to_route('credit-reporting.index');
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
    public function show(CreditReporting $creditReporting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreditReporting $creditReporting)
    {
        return view('credit-reporting.edit', compact('creditReporting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditReportingRequest $request, CreditReporting $creditReporting)
    {

        DB::beginTransaction();
        try {

            if ($request->hasFile('path_attachment_one')) {
                $cnicBackPic = $request->file('path_attachment_one')->store('path_attachment', 'public');
                $request->merge(['path_attachment' => $cnicBackPic]);
            }

            $creditReporting->update([
                'comments' => $request->comments,
                'path_attachment' => $request->path_attachment,
                'status' => $request->status,
            ]);

            DB::commit();
            session()->flash('success', 'Request for data check send to relevant branch successfully.');
            return to_route('credit-reporting.index');
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
    public function destroy(CreditReporting $creditReporting)
    {
        //
    }
}
