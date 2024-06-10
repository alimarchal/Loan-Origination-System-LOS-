<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerBusiness extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'name',
        'type',
        'start_date',
        'acquisition_date',
        'experience_years',
        'address',
        'designation',
        'number_of_employees',
        'tax_number',
        'landline',
        'mobile',
        'initial_investment',
        'investment_source',
        'premises_status',
        'monthly_rent',
        'security_deposit',
        'bank_accounts',
        'average_monthly_balance',
        'account_opening_date',
        'average_balance_six_months',
        'account_number',
        'bank_name',
        'net_worth',
        'business_plan',
        'business_type',
        'new_venture',
        'total_investment_needed',
        'self_financed_amount',
        'monthly_revenue',
        'monthly_expenses',
        'net_monthly_income',
        'status',
        'product_description',
        'credit_score',
        'loan_amount',
        'loan_interest_rate',
        'loan_term',
        'loan_start_date',
        'loan_end_date',
        'collateral_description',
        'collateral_value',
        'annual_revenue',
        'annual_expenses',
        'net_annual_income',
        'alternate_contact_name',
        'alternate_contact_phone'
    ];

}
