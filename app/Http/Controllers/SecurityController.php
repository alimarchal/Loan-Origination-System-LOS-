<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecurityRequest;
use App\Http\Requests\UpdateSecurityRequest;
use App\Models\Borrower;
use App\Models\Security;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::findOrFail($id);
        $securities = Security::where('borrower_id', $id)->get();
        return view('security.index', compact('borrower', 'securities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        return  view('security.create', compact('borrower'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSecurityRequest $request, Borrower $borrower)
    {
        $user = Auth::user();
        $request->merge([
            'borrower_id' => $borrower->id,
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            $security = Security::create($request->all());
            DB::commit();
            session()->flash('success', 'Security created successfully.');
            return to_route('security.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
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
    public function edit($id, Security $security)
    {
        $borrower = Borrower::findOrFail($id);
        return view('security.edit', compact('security', 'borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSecurityRequest $request, Borrower $borrower, Security $security)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            $security->update($request->all());
            DB::commit();
            session()->flash('success', 'Security successfully updated.');
            return to_route('security.edit', [$borrower->id, $security->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    public function authorized(Request $request, Borrower $borrower, Security $security)
    {
        $user = Auth::user();
        if ($request->input('is_authorize') == 'Yes') {
            $mergeData['authorizer_id'] = $user->id;
            $mergeData['is_authorize'] = $request->is_authorize;
        }

        $request->merge($mergeData);
        DB::beginTransaction();
        try {
            $security->update($request->all());
            DB::commit();
            session()->flash('success', 'Security successfully updated.');
            return to_route('security.index', [$borrower->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower, Security $security)
    {
        DB::beginTransaction();
        try {
            $security->delete();
            DB::commit();
            session()->flash('success', 'Security deleted successfully.');
            return to_route('security.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
