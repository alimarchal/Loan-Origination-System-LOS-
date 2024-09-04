<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class SalaryAutoFormController extends Controller
{
    public function employer_undertaking(Request $request, Borrower $borrower)
    {
        return view('auto-forms.salary .employer-undertaking', compact('borrower'));
    }

}
