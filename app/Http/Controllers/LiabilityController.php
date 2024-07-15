<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLiabilityRequest;
use App\Http\Requests\UpdateLiabilityRequest;
use App\Models\Liability;

class LiabilityController extends Controller
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
    public function store(StoreLiabilityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Liability $liability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Liability $liability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLiabilityRequest $request, Liability $liability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Liability $liability)
    {
        //
    }
}
