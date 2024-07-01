<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalNetWorthFormd extends Model
{
    use HasFactory;
    protected $fillable = [
        'personal_net_worth_stat_id',
        'bank_institution',
        'amount',
        'expiry_date',
        'nature_of_guarantee_surety',
    ];
}
