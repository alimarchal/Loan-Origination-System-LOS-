<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBasicBorrowerFactSheetConsumerRequest;
use App\Http\Requests\UpdateBasicBorrowerFactSheetConsumerRequest;
use App\Models\BasicBorrowerFactSheetConsumer;
use App\Models\Borrower;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BasicBorrowerFactSheetConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::with('reference')->findOrFail($id);
        $factSheets = BasicBorrowerFactSheetConsumer::where('borrower_id', $id)->get();
        return view('fact-sheet.index_consumer_individual_bbfs', compact('factSheets', 'borrower'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        $factSheets = BasicBorrowerFactSheetConsumer::where('borrower_id', $borrower->id)->get();
        return view('fact-sheet.create_consumer_individual_bbfs', compact('factSheets', 'borrower'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBasicBorrowerFactSheetConsumerRequest $request, Borrower $borrower)
    {
        $reference_one_id = null;
        $reference_two_id = null;
        if ($borrower->reference->isNotEmpty() && $borrower->reference->count() == 2) {
            $count = 1;
            foreach ($borrower->reference as $rf) {
                if ($count == 1) {
                    $reference_one_id = $rf->id;
                } elseif ($count == 2) {
                    $reference_two_id = $rf->id;
                }
                $count++;
            }

            $request->merge(['reference_id_first' => $reference_one_id, 'reference_id_second' => $reference_two_id]);
            $user = Auth::user();
            $request->merge([
                'borrower_id' => $borrower->id,
                'user_id' => $user->id,
            ]);
            DB::beginTransaction();
            try {
                $bbfs = BasicBorrowerFactSheetConsumer::create($request->all());
                DB::commit();
                session()->flash('success', 'Borrower basic fact sheet created successfully.');
                return to_route('fact-sheet.close', $borrower->id);
            } catch (\Exception $e) {
                DB::rollback();
                session()->flash('error', 'An error occurred: ' . $e->getMessage());
                return back()->withInput();
            }
        } else {
            session()->flash('error', 'You must add the ');
            return back()->withInput();
        }


    }

    public function close(Borrower $borrower)
    {
        return view('fact-sheet.close', compact('borrower'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BasicBorrowerFactSheetConsumer $basicBorrowerFactSheetConsumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BasicBorrowerFactSheetConsumer $basicBorrowerFactSheetConsumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBasicBorrowerFactSheetConsumerRequest $request, BasicBorrowerFactSheetConsumer $basicBorrowerFactSheetConsumer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower, BasicBorrowerFactSheetConsumer $factSheet)
    {
        DB::beginTransaction();
        try {
            $factSheet->delete();
            DB::commit();
            session()->flash('error', 'BBFS deleted successfully.');
            return to_route('fact-sheet.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


}
