<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\LoanStatusHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{
    public function store(Request $request, Borrower $borrower, User $user)
    {
        $request->validate([
            'submit_to' => 'required',
            'loan_status_id' => 'required',
            'attachment_one' => 'nullable|mimes:pdf,jpg,png',
            'description' => 'required',
            'password_confirmation' => 'required',
        ], [
            'submit_to.required' => 'The Forward To (Submit To) to field is required.',
            'loan_status_id.required' => 'The loan status field is required.',
            'attachment_one.mimes' => 'The attachment must be a file of type: pdf, jpg, png.',
            'description.required' => 'The description field is required.',
            'password_confirmation.required' => 'The password confirmation field is required.',
        ]);

        // Check if the provided password matches the user's password
        if (!Hash::check($request->password_confirmation, auth()->user()->password)) {
            return back()->withErrors(['password_confirmation' => 'Confirmation provided password is incorrect.']);
        }


        if ($user->hasPermissionTo('Remarks')) {

            $path_attachment_document = null;
            if ($request->hasFile('attachment_one')) {
                $path = 'Remarks/' . $borrower->id;
                $path_attachment_document = $request->file('attachment_one')->store($path, 'public');
                $request->merge(['path_attachment' => $path_attachment_document]);
            }
            $request->merge([
                'submit_by' => $user->id,
                'borrower_id' => $borrower->id,
                'name' => $user->name,
                'designation' => $user->designation,
                'placement' => $user->placement,
                'employee_no' => $user->employee_no,
                'attachment' => $path_attachment_document
            ]);


            DB::beginTransaction();
            try {
                LoanStatusHistory::create($request->all());

//                $borrower->status = 'In Process';
//                $borrower->pending_at_region = 'Yes';
//                $borrower->pending_at_branch = 'No';
//                $borrower->pending_at_head_office = 'No';
                $borrower->save();

                DB::commit();
                session()->flash('success', 'Your remarks / notes has been recorded in borrower loan application successfully.');
                return to_route('applicant.print', $borrower->id);
            } catch (\Exception $e) {
                DB::rollback();
                // Handle error
                session()->flash('error', 'An error occurred: ' . $e->getMessage());
                return back()->withInput();
            }


            dd(request()->all());
        } else {

            session()->flash('error', 'Unauthorized access detected. You do not have any related permission.');
            return redirect()->back();
        }
        dd($request->all());
    }
}
