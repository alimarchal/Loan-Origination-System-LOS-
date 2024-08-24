<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanSubCategoryRequest;
use App\Http\Requests\UpdateLoanSubCategoryRequest;
use App\Models\LoanSubCategory;
use App\Models\Status;

class LoanSubCategoryController extends Controller
{
    public function getLoanSubCategories($categoryId)
    {
        $subCategories = LoanSubCategory::where('loan_category_id', $categoryId)->orderBy('name')->get();
        return response()->json($subCategories);
    }

    public function getOccupationTitles($subCategoryId)
    {
        $loan_sub_category = LoanSubCategory::find($subCategoryId);

        // Retrieve all statuses where status is 'Gender'
        $occupationTitles = Status::where('status', 'occupation_title')->where('loan_sub_category_id',$loan_sub_category->id)->get();

        return response()->json($occupationTitles);
    }

    public function getBorrowerTypes($occupationTitle, $subCategoryId)
    {

        $loan_sub_category = LoanSubCategory::find($subCategoryId);

        // Retrieve all statuses where status is 'Gender'
        $occupationTitles = Status::where('status', 'borrower_type')->where('loan_sub_category_id',$loan_sub_category->id)->get();


        return response()->json($occupationTitles);

    }


    public function getApplicantStatuses($subCategoryId)
    {
        $loan_sub_category = LoanSubCategory::find($subCategoryId);
        $relationshipStatuses = Status::where('status', 'relationship_status')->where('loan_sub_category_id',$loan_sub_category->id)->get();
        $genders = Status::where('status', 'gender')->where('loan_sub_category_id',$loan_sub_category->id)->get();
        $maritalStatuses = Status::where('status', 'marital_status')->where('loan_sub_category_id',$loan_sub_category->id)->get();
        $educationalQualification = Status::where('status', 'education_qualification')->where('loan_sub_category_id',$loan_sub_category->id)->get();
        $borrowerType = Status::where('status', 'borrower_type')->where('loan_sub_category_id',$loan_sub_category->id)->get();

        return response()->json([
            'relationship_statuses' => $relationshipStatuses,
            'genders' => $genders,
            'marital_statuses' => $maritalStatuses,
            'education_qualification' => $educationalQualification,
            'borrower_type' => $borrowerType,
        ]);
    }
}
