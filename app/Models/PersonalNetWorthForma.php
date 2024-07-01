<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalNetWorthForma extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_net_worth_stat_id',
        'particulars',
        'in_name_of',
        'self_acquired_family_property',
        'encumber_d_to_asterisk',
        'market_value',
    ];
}
