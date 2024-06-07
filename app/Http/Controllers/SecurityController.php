<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecurityRequest;
use App\Http\Requests\UpdateSecurityRequest;
use App\Models\Security;

class SecurityController extends Controller
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
    public function store(StoreSecurityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Security $security)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Security $security)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSecurityRequest $request, Security $security)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Security $security)
    {
        //
    }
}
