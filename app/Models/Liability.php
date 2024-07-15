<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'net_worth_id',
        'description',
        'value',
    ];

    public function netWorth()
    {
        return $this->belongsTo(NetWorth::class);
    }
}
