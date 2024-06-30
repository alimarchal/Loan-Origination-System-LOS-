<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PnwsAssignedGuaranteesSureties extends Model
{
    use HasFactory;
    // PnwsAssignedGuaranteeSurety Model
    protected $fillable = [
        'personal_net_worth_statement_id',
        'bank_institution',
        'amount',
        'expiry_date',
        'nature_of_guarantee_surety',
    ];
}
