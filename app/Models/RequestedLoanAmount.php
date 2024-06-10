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
        'currency',
        'loan_purpose',
        'loan_type',
        'status',
        'tenure_in_months',
        'repayment_frequency',
        'repayment_amount',
        'requested_limits_fund_based_amount',
        'requested_limits_non_fund_based_amount',
        'requested_limits_fund_based_tenure',
        'requested_limits_non_fund_based_tenure'
    ];
}
