<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanStatusHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'submit_by',
        'submit_to',
        'borrower_id',
        'name',
        'designation',
        'placement',
        'employee_no',
        'description',
        'loan_status_id',
        'attachment',
    ];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
