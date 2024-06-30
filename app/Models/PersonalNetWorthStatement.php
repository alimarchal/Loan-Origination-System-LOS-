<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalNetWorthStatement extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'pnws_real_state_owned_personal_capacity_id',
        'pnws_moveable_assets_owned_id',
        'pnws_liabilities_id',
        'pnws_assigned_guarantees_sureties_id',
    ];
}
