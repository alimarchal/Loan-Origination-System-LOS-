<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListHouseHoldItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'is_authorize',
        'authorizer_id',
        'description_of_items',
        'quantity',
        'market_value',
        'amount',
    ];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

}