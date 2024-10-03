<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSanctionAdviceRequest;
use App\Http\Requests\UpdateSanctionAdviceRequest;
use App\Models\Borrower;
use App\Models\SanctionAdvice;

class SanctionAdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $sanction_advices = Borrower::where('status','Approved')->where('is_sanction_advice_issued','No')->get();
        $sanction_advices = Borrower::all();
        return view('sanction-advices.consumer.advance-salary.index',compact('sanction_advices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {

//        if (empty($borrower->sanction_advice))
//        {
            return view('sanction-advices.consumer.advance-salary.create',compact(var_name: 'borrower'));
//        } else {
//            abort(403);
//        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSanctionAdviceRequest $request)
    {
        //
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
    public function edit(SanctionAdvice $sanctionAdvice)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSanctionAdviceRequest $request, SanctionAdvice $sanctionAdvice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SanctionAdvice $sanctionAdvice)
    {
        //
    }


}