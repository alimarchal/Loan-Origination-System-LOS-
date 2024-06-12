<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanSubCategoryRequest;
use App\Http\Requests\UpdateLoanSubCategoryRequest;
use App\Models\LoanSubCategory;

class LoanSubCategoryController extends Controller
{
    public function getLoanSubCategories($categoryId)
    {
        $subCategories = LoanSubCategory::where('loan_category_id', $categoryId)->orderBy('name')->get();
        return response()->json($subCategories);
    }

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
    public function store(StoreLoanSubCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanSubCategory $loanSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanSubCategory $loanSubCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanSubCategoryRequest $request, LoanSubCategory $loanSubCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanSubCategory $loanSubCategory)
    {
        //
    }
}
