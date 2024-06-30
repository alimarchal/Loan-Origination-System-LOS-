<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PnwsMoveableAssetsOwned extends Model
{
    use HasFactory;

    // PnwsMoveableAssetsOwned Model
    protected $fillable = [
        'personal_net_worth_statement_id',
        'particulars',
        'description',
        'current_value',
    ];
}
