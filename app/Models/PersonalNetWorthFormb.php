<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalNetWorthFormb extends Model
{
    use HasFactory;
    protected $fillable = [
        'personal_net_worth_stat_id',
        'particulars',
        'description',
        'current_value',
    ];
}
