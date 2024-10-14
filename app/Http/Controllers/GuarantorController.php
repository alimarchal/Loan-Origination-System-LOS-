<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuarantorRequest;
use App\Http\Requests\UpdateGuarantorRequest;
use App\Models\Borrower;
use App\Models\Guarantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuarantorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::findOrFail($id);
        $guarantors = Guarantor::where('borrower_id', $id)->get();
        return view('guarantor.index', compact('guarantors', 'borrower'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        return view('guarantor.create', compact('borrower'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuarantorRequest $request, Borrower $borrower)
    {
        $user = Auth::user();
        $request->merge([
            'borrower_id' => $borrower->id,
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            $path_attachment_document =  null;
            if ($request->hasFile('statement_of_account_attachment_one')) {
                $path = $request->document_type;
                $path_attachment_document = $request->file('statement_of_account_attachment_one')->store('soa', 'public');
            }
            $request->merge(['statement_of_account_attachment' => $path_attachment_document]);
            $guarantor = Guarantor::create($request->all());
            DB::commit();
            session()->flash('success', 'Guarantor information created successfully.');
            return to_route('guarantor.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Guarantor $guarantor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Guarantor $guarantor)
    {
        $borrower = Borrower::findOrFail($id);
        return view('guarantor.edit', compact('guarantor', 'borrower'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuarantorRequest $request, Borrower $borrower, Guarantor $guarantor)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('statement_of_account_attachment_one')) {
                $path = $request->document_type;
                $path_attachment_document = $request->file('statement_of_account_attachment_one')->store('soa', 'public');
            }
           // $request->merge(['statement_of_account_attachment' => $path_attachment_document]);

            $guarantor->update($request->all());
            DB::commit();
            session()->flash('success', 'Guarantor information successfully updated.');
            return to_route('guarantor.edit', [$borrower->id, $guarantor->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    public function authorized(Request $request, Borrower $borrower, Guarantor $guarantor)
    {

        $user = Auth::user();
        if ($request->input('is_authorize') == 'Yes') {
            $mergeData['authorizer_id'] = $user->id;
            $mergeData['is_authorize'] = $request->is_authorize;
        }

        $request->merge($mergeData);

        DB::beginTransaction();
        try {
            $guarantor->update($request->all());
            DB::commit();
            session()->flash('success', 'Guarantor information successfully updated.');
            return to_route('guarantor.index', [$borrower->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower, Guarantor $guarantor)
    {
        DB::beginTransaction();
        try {
            $guarantor->delete();
            DB::commit();
            session()->flash('error', 'Guarantor deleted successfully.');
            return to_route('guarantor.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}