<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTelephoneRequest;
use App\Http\Requests\UpdateTelephoneRequest;
use App\Models\Telephone;

class TelephoneController extends Controller
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
    public function store(StoreTelephoneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Telephone $telephone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Telephone $telephone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTelephoneRequest $request, Telephone $telephone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Telephone $telephone)
    {
        //
    }
}
