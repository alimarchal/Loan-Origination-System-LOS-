<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'security_type',
        'value_of_gold_ornaments_value',
        'gross_weight_of_gold',
        'gold_bag_seal_no',
        'market_value',
        'forced_sales_value_fsv',
        'ownership',
        'lien_ac_no',
        'lien_title',
        'lien_bank_branch',
        'lien_amount',
        'pledge_tdr_ssc_dsc_cert_no',
        'pledge_date_of_issuance',
        'pledge_issuing_office',
        'pledge_amount',
        'remarks',
    ];
}
