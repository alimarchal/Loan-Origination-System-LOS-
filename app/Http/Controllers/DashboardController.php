<?php

namespace App\Http\Controllers;

use App\Models\LoanSubCategory;
use App\Models\Borrower;
use App\Models\LoanStatus;
use App\Models\LoanCategory;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch data for dashboard components
        //  $loanSubCatGroup = $this->getLoanSubCategoryGroup();
        $genderWise = $this->getGenderWiseData();
        $primaryCards = $this->getPrimaryCards($user);
        $secondaryCards = $this->getSecondaryCards($user);

        // Get branches (if needed in the future)
        $branches = [];
        // Return view with compact data
        return view('dashboard.dashboard', compact('primaryCards', 'secondaryCards', 'branches', 'genderWise'));
    }

    /**
     * Get loan sub-category group data
     */
    private function getLoanSubCategoryGroup(): array
    {
        return LoanSubCategory::all()->mapWithKeys(function ($lsc) {
            return [$lsc->name => Borrower::where('is_lock', 'Yes')
                ->where('loan_sub_category_id', $lsc->id)
                ->count()];
        })->toArray();
    }

    /**
     * Get gender-wise data
     */
    private function getGenderWiseData(): array
    {
        return ['Male' => Borrower::where('gender', 'Male')->where('is_lock', 'Yes')->count(),
            'Female' => Borrower::where('gender', 'Female')->where('is_lock', 'Yes')->count()];
    }

    /**
     * Get primary cards data based on user role
     */
    private function getPrimaryCards($user): array
    {
        $primaryCards = LoanCategory::pluck('id')->flip()->map(function () {
            return 0;
        })->toArray();


        $query = $this->getBorrowerQueryBasedOnRole($user);



        foreach ($primaryCards as $key => $value) {
            $primaryCards[$key] = $query->where('loan_category_id', $key)->count();
        }

        return $primaryCards;
    }

    /**
     * Get secondary cards data based on user role
     */
    private function getSecondaryCards($user): array
    {
        $secondaryCards = LoanStatus::pluck('name')->flip()->map(function () {
            return 0;
        })->toArray();

        $query = $this->getBorrowerQueryBasedOnRole($user);
        $counts = $query->groupBy('status')
            ->selectRaw('status, count(*) as count')
            ->pluck('count', 'status')
            ->toArray();

        return array_merge($secondaryCards, $counts);
    }

    /**
     * Get Borrower query based on user role
     */
    private function getBorrowerQueryBasedOnRole($user)
    {
        $query = Borrower::where('is_lock', 'Yes');

        if ($user->hasRole(['Branch Manager', 'Branch Credit Manager', 'Branch Credit Officer'])) {
            $query->where('branch_id', $user->branch_id);
        } elseif ($user->hasRole(['Regional Credit Manager', 'Regional Credit Officer', 'Regional Head'])) {
            $regionBranches = Branch::where('region_id', $user->branch->region_id)->pluck('id');
            $query->whereIn('branch_id', $regionBranches);
        } elseif ($user->hasRole(['Divisional Head CRBD', 'Senior Manager CRBD', 'Manager Officer CRBD', 'Divisional Head CMD', 'Senior Manager CMD', 'Manager Officer CMD', 'Super Admin'])) {
            $allBranches = Branch::all()->pluck('id')->toArray();
            $query->whereIn('branch_id', $allBranches);
        } else {
            // For any unspecified role, return an empty query to ensure no data is shown
            $query->whereRaw('1 = 0');
        }

        return $query;
    }

}