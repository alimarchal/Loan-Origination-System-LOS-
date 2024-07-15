<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreObligorScoreCardRequest;
use App\Http\Requests\UpdateObligorScoreCardRequest;
use App\Models\Borrower;
use App\Models\ObligorScoreCard;
use App\Models\ObligorScoreCardFactor;
use App\Models\OscfOpt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ObligorScoreCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::with('obligor_score_card')->findOrFail($id);
        $obsf = ObligorScoreCardFactor::with('obligor_score_factor_options')->get();

        $osc = ObligorScoreCard::where('borrower_id', $borrower->id)->get();
        $osf_exist = false;
        if ($osc->isEmpty()) {
            $osf_exist = true;
        }

        return view('obligor-score-card.index', compact('borrower', 'obsf', 'osf_exist', 'osc'));
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
    public function store(StoreObligorScoreCardRequest $request, Borrower $borrower)
    {
//        dd($request->all());
        $answers = $request->answers;
        $user = Auth::user();
        $request->merge([
            'borrower_id' => $borrower->id,
        ]);
        DB::beginTransaction();
        try {
            foreach ($answers as $question_id => $answer_id) {
                $obc = ObligorScoreCard::create([
                    'borrower_id' => $request->borrower_id,
                    'score_card_factor_id' => $question_id,
                    'score_card_factor_opt_id' => $answer_id,
                    'score_available' => OscfOpt::findOrFail($answer_id)->score_available,
                    'score_gained' => OscfOpt::findOrFail($answer_id)->score_available,
                ]);
            }
            DB::commit();
            session()->flash('success', 'Obligor score card saved successfully.');
            return to_route('obligor-score-card.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ObligorScoreCard $obligorScoreCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ObligorScoreCard $obligorScoreCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObligorScoreCardRequest $request, ObligorScoreCard $obligorScoreCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower)
    {
        DB::beginTransaction();
        try {
            $osc = ObligorScoreCard::where('borrower_id', $borrower->id)->get();
            foreach ($osc as $osc) {
                $osc->delete();
            }
            DB::commit();
            session()->flash('error', 'Obligor score card has been deleted successfully.');
            return to_route('obligor-score-card.index', [$borrower->id]);
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
