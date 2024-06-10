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
        'market_value',
        'fsv',
        'ownership',
        'lien_ac_no',
        'lien_title',
        'lien_bank_branch',
        'lien_amount',
        'pledge_tdr_ssc_dsc_cert_no',
        'pledge_date_of_issuance',
        'pledge_issuing_office',
        'pledge_amount',
        'lease_reg_book_veh_obtained',
        'lease_duplicate_keys_veh_obrained',
        'lease_date_obtained',
        'lease_reg_book_veh_received',
        'lease_duplicate_keys_veh_received',
        'lease_date_receipt',
        'remarks'
    ];

}
