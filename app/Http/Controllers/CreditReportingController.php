<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditReportingRequest;
use App\Http\Requests\UpdateCreditReportingRequest;
use App\Models\Branch;
use App\Models\CreditReporting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class CreditReportingController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // Ensure only users with the 'Branch Manager', 'Credit Manager', or 'Admin' role can access the index
            new Middleware('role:Branch Manager|Credit Manager|Admin', ['only' => ['index']]),

            // Only allow users with 'Branch Manager' or 'Admin' roles to create credit reports
            new Middleware('role:Branch Manager|Admin', ['only' => ['create', 'store']]),

            // Only allow users with 'Admin' or specific role to view credit reports
            new Middleware('role:Admin|Credit Officer', ['only' => ['show']]),

            // Only allow users with 'Admin' or 'Credit Officer' roles to edit and update credit reports
            new Middleware('role:Admin|Credit Officer', ['only' => ['edit', 'update']]),

            // Only users with 'Admin' role can delete credit reports (if necessary)
            new Middleware('role:Admin', ['only' => ['destroy']]),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = CreditReporting::query();

        if ($user->hasRole(['Branch Manager','Branch Credit Manager','Branch Credit Officer'])) {
            // If the user is a Branch Manager, only show entries related to their branch
            $query->where('branch_id', $user->branch_id);
        } elseif($user->hasRole(['Regional Credit Manager','Regional Credit Officer','Regional Head']))  {
            // For other roles, we'll show all entries
            $region_branches = $user->branch?->region?->branches?->pluck('id')->toArray();
//            dd($region_branches);
            $query->whereIn('branch_id', $region_branches);
            // You can add more specific filters here for other roles if needed
        }
        elseif($user->hasRole(['Manager Officer CRBD','Divisional Head CMD','Senior Manager CMD', 'Manager Officer CMD']))  {
            // For other roles, we'll show all entries
            $allBranches = Branch::all()->pluck('id')->toArray();
            $query->whereIn('branch_id', $allBranches);
            // You can add more specific filters here for other roles if needed
        }

        $credit_reporting = QueryBuilder::for($query)
            ->allowedFilters([
                AllowedFilter::exact('branch_id'),
                AllowedFilter::exact('national_id_cnic'),
                AllowedFilter::exact('status'),
                AllowedFilter::exact('id'),
                AllowedFilter::partial('name'),
            ])
            ->with(['branch','user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('credit-reporting.index', compact('credit_reporting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('credit-reporting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditReportingRequest $request)
    {

        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'branch_id' => $user->branch_id,
        ]);


        DB::beginTransaction();
        try {
            $credit_reporting = CreditReporting::create([
                'user_id' => $request->user_id,
                'branch_id' => $request->branch_id,
                'name' => $request->name,
                'national_id_cnic' => $request->national_id_cnic,
            ]);

            DB::commit();
            session()->flash('success', 'Request for Data Check Credit send to region successfully.');
            return to_route('credit-reporting.index');
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditReporting $creditReporting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreditReporting $creditReporting)
    {
        return view('credit-reporting.edit', compact('creditReporting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditReportingRequest $request, CreditReporting $creditReporting)
    {

        DB::beginTransaction();
        try {

            if ($request->hasFile('path_attachment_one')) {
                $cnicBackPic = $request->file('path_attachment_one')->store('path_attachment', 'public');
                $request->merge(['path_attachment' => $cnicBackPic]);
            }

            $creditReporting->update([
                'comments' => $request->comments,
                'path_attachment' => $request->path_attachment,
                'status' => $request->status,
            ]);

            DB::commit();
            session()->flash('success', 'Request for data check send to relevant branch successfully.');
            return to_route('credit-reporting.index');
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function getCreditReportingName($id)
    {
        $creditReporting = CreditReporting::find($id);

        if ($creditReporting) {
            return response()->json([
                'name' => $creditReporting->name,
                'national_id_cnic' => $creditReporting->national_id_cnic,
            ]);
        } else {
            return response()->json(['error' => 'Not found'], 404);
        }
    }
}
