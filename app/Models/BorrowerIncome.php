<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerIncome extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'is_authorize',
        'authorizer_id',
        'monthly_salary',
        'salary_receipt_mode',
        'salary_account_number',
        'salary_bank_name',
        'salary_bank_branch_name',
        'service_length',
        'remaining_service_year',
        'family_personal_saving',
        'terminal_benefits',
        'other_benefits',
        'other_source_of_income',
        'salary_disbursement_office_name',
        'contact_disbursement'
    ];

}
