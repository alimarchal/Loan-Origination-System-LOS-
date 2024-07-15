<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerEmploymentInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'job_title_designation',
        'employment_status',
        'employer_name',
        'monthly_gross_salary',
        'monthly_net_salary',
        'service_length_in_years',
        'service_length_in_months',
        'remaining_service_years',
        'remaining_service_months',
        'department',
        'official_address',
        'legal_status',
        'office_mobile_number',
        'office_phone_number',
        'personal_number',
        'grade',
        'service_status',
        'mode_of_salary_receipt',
        'salary_disbursement_office_name',
        'contact_person_for_disbursement',
        'terminal_benefits',
        'other_benefits',
        'other_sources_of_income'
    ];

}
