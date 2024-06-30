<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BasicBorrowerFactSheetConsumer extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'reference_id_first',
        'reference_id_second',
        'nature_of_business',
        'fund_based_amount',
        'fund_based_expiry_date',
        'fund_based_status_regular',
        'fund_based_status_amount_overdue_if_any',
        'fund_based_status_amount_rescheduled_or_restructured_if_any',
        'non_fund_based_amount',
        'non_fund_based_expiry_date',
        'non_fund_based_status_regular',
        'non_fund_based_status_amount_overdue_if_any',
        'non_fund_based_status_amount_rescheduled_or_restructured_if_any',
        'requested_limit_fund_based_amount',
        'requested_limit_fund_based_tenure',
        'requested_limit_non_fund_based_amount',
        'requested_limit_non_fund_based_tenure',
        'detail_of_term_loan_sougnt',
    ];

}
