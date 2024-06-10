<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'guarantor_type',
        'title',
        'name',
        'father_husband',
        'national_id',
        'phone_number',
        'phone_number_two',
        'email',
        'present_address',
        'permanent_address',
        'department',
        'designation',
        'reporting_to',
        'employee_personal_number',
        'employment_status',
        'monthly_gross_salary',
        'monthly_deductions_salary',
        'monthly_net_salary',
        'date_of_retirement',
        'relationship_to_borrower',
        'net_worth',
        'business_registration_number',
        'annual_revenue',
        'annual_expenses',
        'net_annual_income'
    ];

}
