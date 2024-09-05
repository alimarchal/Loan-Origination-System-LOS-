<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Borrower;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::findOrFail($id);
        $documents = Document::where('borrower_id', $id)->get();
        return view('document.index', compact('documents', 'borrower'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        return view('document.create', compact('borrower'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request, Borrower $borrower)
    {
        $user = Auth::user();
        $request->merge([
            'borrower_id' => $borrower->id,
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('path_attachment_one')) {
                $path = $request->document_type;
                $path_attachment_document = $request->file('path_attachment_one')->store($path, 'public');
                $request->merge(['path_attachment' => $path_attachment_document]);
            }
            $request->merge(['path_attachment' => $path_attachment_document]);

            $document = Document::create($request->all());

            DB::commit();
            session()->flash('success', 'Document created successfully.');
            return to_route('document.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        // Code for showing a specific document
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Document $document)
    {
        $borrower = Borrower::findOrFail($id);
        return view('document.edit', compact('document', 'borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Borrower $borrower, Document $document)
    {
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
        ]);

        DB::beginTransaction();
        try {
            $document->update($request->all());
            DB::commit();
            session()->flash('success', 'Document successfully updated.');
            return to_route('document.edit', [$borrower->id, $document->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    public function authorized(UpdateDocumentRequest $request, Borrower $borrower, Document $document)
    {
        $user = Auth::user();
        if ($request->input('is_authorize') == 'Yes') {
            $mergeData['authorizer_id'] = $user->id;
            $mergeData['is_authorize'] = $request->is_authorize;
        }

        $request->merge($mergeData);

        DB::beginTransaction();
        try {
            $document->update($request->all());
            DB::commit();
            session()->flash('success', 'Document successfully updated.');
            return to_route('document.index', [$borrower->id]);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower, Document $document)
    {
        DB::beginTransaction();
        try {
            // Delete the file from storage
            if ($document->path_attachment && Storage::disk('public')->exists($document->path_attachment)) {
                Storage::disk('public')->delete($document->path_attachment);
            }

            $document->delete();
            DB::commit();
            session()->flash('error', 'Document deleted successfully.');
            return to_route('document.index', $borrower->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
