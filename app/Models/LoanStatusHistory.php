<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function from()
    {
        return $this->belongsTo(User::class, 'submit_by');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'submit_to');
    }

    public function loan_status(): BelongsTo
    {
        return $this->belongsTo(LoanStatus::class);
    }
}
