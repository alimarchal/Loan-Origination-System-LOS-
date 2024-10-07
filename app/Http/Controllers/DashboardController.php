<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\Branch;
use App\Models\LoanCategory;
use App\Models\LoanStatus;
use App\Models\LoanSubCategory;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DashboardController extends Controller
{
    public function index()
    {


//        $loan_sub_cat_group = Borrower::where('is_lock','Yes')->groupBy('loan_sub_category_id')->count();
        $loan_sub_cat_group = [];
        foreach (LoanSubCategory::all() as $lsc) {
            $loan_sub_cat_group[$lsc->name] =  Borrower::where('is_lock','Yes')->where('loan_sub_category_id',$lsc->id)->count();;
        }

        $gender_wise = ["Male" => Borrower::where('gender','Male')->where('is_lock','Yes')->count(), "Female" => Borrower::where('gender','Female')->where('is_lock','Yes')->count()];
        $primary_cards = [];
        $secondary_cards = [];



        foreach (LoanStatus::all() as $ls) {
            $secondary_cards[$ls->name] = 0;
        }

        foreach (LoanCategory::all() as $ls) {
            $primary_cards[$ls->id] = 0;
        }

        $user = Auth::user();
        $region_branches = Branch::with('region')->where('region_id', $user->branch->region_id)->pluck('id')->toArray();
        $branches = [];

        // Apply role-based filtering to the query
        if ($user->hasRole(['Branch Manager','Branch Credit Manager', 'Branch Credit Officer'])) {
            foreach ($primary_cards as $key => $value) {
                $primary_cards[$key] = Borrower::where('branch_id',$user->branch_id)->where('is_lock','Yes')->where('loan_category_id', $key)->count();
            }

            foreach ($secondary_cards as $key => $value) {
                $secondary_cards[$key] = Borrower::where('branch_id',$user->branch_id)->where('status',$key)->count();
            }


        } elseif ($user->hasRole(['Regional Credit Manager','Regional Credit Officer', 'Regional Head'])) {
            foreach ($primary_cards as $key => $value) {
                $primary_cards[$key] = Borrower::whereIn('branch_id', $region_branches)->where('is_lock','Yes')->where('loan_category_id', $key)->count();
            }

            foreach ($secondary_cards as $key => $value) {
                $secondary_cards[$key] = Borrower::whereIn('branch_id', $region_branches)->where('status',$key)->count();
            }

        } elseif ($user->hasRole(['Divisional Head CRBD', 'Senior Manager CRBD', 'Manager Officer CRBD', 'Divisional Head CMD', 'Senior Manager CMD', 'Manager Officer CMD', 'Super-Admin',])) {
            // Regional Chief can see borrowers from their region
            foreach ($primary_cards as $key => $value) {
                $primary_cards[$key] = Borrower::where('is_lock','Yes')->where('loan_category_id', $key)->count();
            }

            foreach ($secondary_cards as $key => $value) {
                $secondary_cards[$key] = Borrower::where('status',$key)->count();
            }

        }


        // Return view with borrowers data
        return view('dashboard.dashboard',compact('primary_cards','secondary_cards', 'branches', 'loan_sub_cat_group','gender_wise'));
    }
}
