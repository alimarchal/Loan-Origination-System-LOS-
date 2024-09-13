<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{

    protected $loanStatusService;

    public function __construct(LoanStatusService $loanStatusService)
    {
        $this->loanStatusService = $loanStatusService;
    }

    public function updateStatus(Request $request, Borrower $borrower)
    {
        $this->loanStatusService->updateStatus(
            $borrower,
            $request->status,
            $request->comments,
            $request->file('attachment')
        );

        return redirect()->back()->with('success', 'Loan status updated successfully.');
    }
}
