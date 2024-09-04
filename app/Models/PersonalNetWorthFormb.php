<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalNetWorthFormb extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_authorize',
        'authorizer_id',
        'personal_net_worth_stat_id',
        'particulars',
        'description',
        'current_value',
    ];
}
