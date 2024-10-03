<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionAdvice extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'date_of_report',
        'type_of_finance',
        'sgl_code',
        'nature_of_finance',
        'purpose_of_finance',
        'take_home_salary',
        'dsr_required',
        'dsr_actual',
        'requested_amount_status',
        'amount_of_finance_limit',
        'previous_outstanding',
        'enhancement_amount',
        'enhancement',
        'total_amount',
        'tenure',
        'repayment_history',
        'rate_of_markup',
        'monthly_installment',
        'repayment_schedule_monthly_installment',
        'insurance_treatment',
        'life_insurance_sgl',
        'recovery_mode_of_installment',
        'security_primary_amount',
        'security_primary',
        'security_secondary',
        'borrower_pgs_no_issued',
        'borrower_rp_status',
        'guarantor_pgs_no_issued',
        'guarantor_rp_status',
        'documents_required_before_disbursement',
        'general_terms_of_service',
        'other_special_terms_of_service',
        'note',
    ];
}