<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerBusiness extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'borrower_id',
        'is_authorize',
        'authorizer_id',
        'name',
        'type',
        'address',
        'landline',
        'mobile',
        'designation',
        'monthly_revenue',
        'experience_years',
        'monthly_expenses',
        'net_monthly_income',
        'start_date',
        'acquisition_date',
        'number_of_employees',
        'tax_number',
        'initial_investment',
        'investment_source',
        'premises_status',
        'monthly_rent',
        'average_monthly_balance',
        'account_opening_date',
        'average_balance_six_months',
        'account_no',
        'bank_name',
        'net_worth',
    ];


}
