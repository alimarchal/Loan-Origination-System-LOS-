<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedLoanAmount extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'user_id',
        'loan_category_id',
        'loan_sub_category_id',
        'request_date',
        'requested_amount',
        'margin_on_gold_limit',
        'currency',
        'loan_purpose',
        'status',
        'tenure_in_years',
        'tenure_in_months',
        'repayment_frequency',
        'salary_account_no',
        'salary_account_branch_name',
        'salary_account_bank_name',
        'account_with_bajk',
        'account_with_other_banks',
        'markup_rate_type',
        'is_insured',
    ];
}
