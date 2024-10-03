<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSanctionAdviceRequest;
use App\Http\Requests\UpdateSanctionAdviceRequest;
use App\Models\Borrower;
use App\Models\SanctionAdvice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SanctionAdviceController extends Controller
{

    public function index()
    {
//        $sanction_advices = Borrower::where('status','Approved')->where('is_sanction_advice_issued','No')->get();
        $sanction_advices = SanctionAdvice::all();
        return view('sanction-advices.consumer.advance-salary.index',compact('sanction_advices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
//        if (empty($borrower->sanction_advice))
//        {
            return view('sanction-advices.consumer.advance-salary.create', compact('borrower'));
//        } else {
//            abort(403);
//        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSanctionAdviceRequest $request, Borrower $borrower)
    {
//        dd($request->all());
        // Start database transaction
        DB::beginTransaction();
        $sanction_advice = null;

        try {
            $request->merge([
                'borrower_id' => $borrower->id,
                'date_of_report' => Carbon::now()->format('Y-m-d'),
            ]);

            $sanction_advice = SanctionAdvice::create($request->all());
            // Commit the transaction if everything goes well
            DB::commit();

            // Flash success message to the session
            session()->flash('success', 'Sanction Advice successfully created!');

        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Log the error for debugging
            Log::error('Sanction Advice creation failed: ' . $e->getMessage());

            // Flash error message to the session
            session()->flash('error', 'Sanction Advice creation failed! Please try again.');

            // Redirect back with input
            return redirect()->back()->withInput();
        }

        if(!empty($sanction_advice)){
            return to_route("sanction-advice.edit", [$sanction_advice->id, $borrower->id]);
        } else{
            return to_route("sanction-advice.index");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(SanctionAdvice $sanctionAdvice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SanctionAdvice $sanctionAdvice, Borrower $borrower)
    {
        return view('sanction-advices.consumer.advance-salary.edit', compact('sanctionAdvice','borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSanctionAdviceRequest $request, Borrower $borrower, SanctionAdvice $sanctionAdvice)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Add the current date to the request data
            $request->merge([
                'date_of_report' => Carbon::now()->format('Y-m-d'),
            ]);

            // Update the SanctionAdvice record
            $updated = $sanctionAdvice->update($request->all());

            if (!$updated) {
                throw new \Exception("Sanction Advice update failed unexpectedly.");
            }

            // Commit the transaction if everything goes well
            DB::commit();

            // Flash success message to the session
            session()->flash('success', 'Sanction Advice successfully updated!');

            // Redirect back to the edit page with success message
            return redirect()->route('sanction-advice.edit', [$sanctionAdvice->id, $borrower->id]);

        } catch (\Exception $e) {
            // Rollback the transaction in case of any error
            DB::rollBack();

            // Log the error with additional context
            Log::error('Sanction Advice update failed for ID ' . $sanctionAdvice->id . ' due to: ' . $e->getMessage());

            // Flash error message to the session
            session()->flash('error', 'Sanction Advice update failed! Please try again.');

            // Redirect back with old input data
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SanctionAdvice $sanctionAdvice)
    {
        //
    }


}