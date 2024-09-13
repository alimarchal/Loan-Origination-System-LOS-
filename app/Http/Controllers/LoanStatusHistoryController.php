<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanStatusHistoryRequest;
use App\Http\Requests\UpdateLoanStatusHistoryRequest;
use App\Models\Borrower;
use App\Models\LoanStatusHistory;

class LoanStatusHistoryController extends Controller
{
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
    public function store(StoreLoanStatusHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanStatusHistory $loanStatusHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanStatusHistory $loanStatusHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(UpdateLoanStatusHistoryRequest $request, LoanStatusHistory $loanStatusHistory)
//    {
//        //
//    }


    public function updateStatus(Borrower $borrower, string $status, string $comments = null, UploadedFile $attachment = null)
    {
        $statusData = [
            'borrower_id' => $borrower->id,
            'user_id' => auth()->id(),
            'status' => $status,
            'comments' => $comments,
        ];

        if ($attachment) {
            $path = $attachment->store('loan_status_attachments', 'public');
            $statusData['attachment'] = $path;
        }

        return LoanStatusHistory::create($statusData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanStatusHistory $loanStatusHistory)
    {
        //
    }
}
