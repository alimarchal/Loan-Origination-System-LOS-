<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionAdvice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'borrower_id',
        'dor',
        'TypeOfFinance',
        'SglCode',
        'NatureOfFinance',
        'PurposeOfFinance',
        'TakeHomeSalary',
        'DSR_Required',
        'DSR_Actual',
        'RequestedAmountStatus',
        'AmountOfFinanceLimit',
        'PreviousOutstanding',
        'EnhancementAmount',
        'TotalAmount',
        'RepaymentHistory',
        'RateofMarkup',
        'RepaymentScheduleMonthlyInstallment',
        'LifeInsuranceSGL',
        'BorrowerPGsNoIssued',
        'BorrowerRPStatus',
        'GuarantorPGsNoIssued',
        'GuarantorRPStatus',
        'DocReqBefDis',
        'GeneralTos',
        'Note',
    ];
}