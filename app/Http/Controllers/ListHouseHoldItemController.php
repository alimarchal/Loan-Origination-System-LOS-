<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListHouseHoldItemRequest;
use App\Http\Requests\UpdateListHouseHoldItemRequest;
use App\Models\Borrower;
use App\Models\ListHouseHoldItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListHouseHoldItemController extends Controller
{
    public function index($id)
    {
        $borrower = Borrower::findOrFail($id);
        $listHouseHoldItems = ListHouseHoldItem::where('borrower_id', $id)->get();
        return view('list-house-hold-item.index', compact('listHouseHoldItems', 'borrower'));
    }

    public function create(Borrower $borrower)
    {
        return view('list-house-hold-item.create', compact('borrower'));
    }

    public function store(StoreListHouseHoldItemRequest $request, Borrower $borrower)
    {
        DB::beginTransaction();
        try {
            $request->merge(['borrower_id' => $borrower->id]);
            $listHouseHoldItem =ListHouseHoldItem::create($request->all());
            DB::commit();
            session()->flash('success', 'List House Hold Item created successfully.');
            return to_route('list-house-hold-item.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id, ListHouseHoldItem $listHouseHoldItem)
    {
        $borrower = Borrower::findOrFail($id);
        return view('list-house-hold-item.edit', compact('listHouseHoldItem', 'borrower'));
    }

    public function update(UpdateListHouseHoldItemRequest $request, Borrower $borrower, ListHouseHoldItem $listHouseHoldItem)
    {
        DB::beginTransaction();
        try {
            $listHouseHoldItem->update($request->all());
            DB::commit();
            session()->flash('success', 'List House Hold Item successfully updated.');
            return to_route('list-house-hold-item.edit', [$borrower->id, $listHouseHoldItem->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    public function authorized(Request $request, Borrower $borrower, ListHouseHoldItem $listHouseHoldItem)
    {

        $user = Auth::user();
        if ($request->input('is_authorize') == 'Yes') {
            $mergeData['authorizer_id'] = $user->id;
            $mergeData['is_authorize'] = $request->is_authorize;
        }

        $request->merge($mergeData);

        DB::beginTransaction();
        try {
            $listHouseHoldItem->update($request->all());
            DB::commit();
            session()->flash('success', 'List House Hold Item authorized updated.');
            return to_route('list-house-hold-item.index', [$borrower->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    public function destroy(Borrower $borrower, ListHouseHoldItem $listHouseHoldItem)
    {
        DB::beginTransaction();
        try {
            $listHouseHoldItem->delete();
            DB::commit();
            session()->flash('success', 'List House Hold Item deleted successfully.');
            return to_route('list-house-hold-item.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back();
        }
    }
}