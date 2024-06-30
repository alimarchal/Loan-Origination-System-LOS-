<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PnwsRealStateOwnedPersonalCapacity extends Model
{
    use HasFactory;

    // PnwsRealStateOwnedPersonalCapacity Model
    protected $fillable = [
        'personal_net_worth_statement_id',
        'particulars',
        'in_name_of',
        'self_acquired_family_property',
        'encumber_d_to_asterisk',
        'market_value',
    ];
}
