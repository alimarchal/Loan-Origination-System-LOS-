<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PnwsLiabilities extends Model
{
    use HasFactory;
    // PnwsLiability Model
    protected $fillable = [
        'personal_net_worth_statement_id',
        'particulars',
        'description',
        'amount',
    ];
}
