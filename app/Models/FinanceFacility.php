<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceFacility extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'is_authorize',
        'authorizer_id',
        'institution_name',
        'repayment_status',
        'facility_type',
        'sanctioned_amount',
//        'loan_limit',
        'outstanding_amount',
        'monthly_installment',
        'interest_rate',
        'term_months',
        'start_date',
        'end_date',
        'purpose_of_loan',
        'remarks',
        'amount_rescheduled',
    ];
}
