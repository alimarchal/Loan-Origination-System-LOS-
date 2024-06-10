<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'requested_loan_amount_id',
        'vehicle_type',
        'model_year',
        'year_of_manufacturing',
        'make',
        'model',
        'cost_of_vehicle',
        'equity_dawn_payment',
        'financial_institute_contribution',
        'name_authorized_dealer_seller',
        'repayment',
        'tenure'
    ];

}
