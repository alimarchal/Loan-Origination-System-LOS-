<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'is_authorize',
        'authorizer_id',
        'requested_loan_amount_id',
        'vehicle_type',
        'price_of_vehicle',
        'down_payment_percentage',
        'finance_amount',
        'model_year',
        'year_of_manufacturing',
        'make',
        'model',
        'cost_of_vehicle',
        'equity_dawn_payment',
        'financial_institute_contribution',
        'name_authorized_dealer_seller',
        'repayment_mode',
        'tenure_in_years',
        'tenure_in_month',
        'markup_rate_type',
    ];

}
