<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReferenceRequest;
use App\Http\Requests\UpdateReferenceRequest;
use App\Models\Borrower;
use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::findOrFail($id);
        $references = Reference::where('borrower_id', $id)->get();
        return view('reference.index', compact('references', 'borrower'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        return view('reference.create', compact('borrower'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReferenceRequest $request, Borrower $borrower)
    {
        $user = Auth::user();
        $request->merge([
            'borrower_id' => $borrower->id,
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            $reference = Reference::create($request->all());
            DB::commit();
            session()->flash('success', 'Reference created successfully.');
            return to_route('reference.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reference $reference)
    {
        // Code for showing a specific reference
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Reference $reference)
    {
        $borrower = Borrower::findOrFail($id);
        return view('reference.edit', compact('reference', 'borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReferenceRequest $request, Borrower $borrower, Reference $reference)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            $reference->update($request->all());
            DB::commit();
            session()->flash('success', 'Reference successfully updated.');
            return to_route('reference.edit', [$borrower->id, $reference->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower, Reference $reference)
    {
        DB::beginTransaction();
        try {
            $reference->delete();
            DB::commit();
            session()->flash('success', 'Reference deleted successfully.');
            return to_route('reference.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
