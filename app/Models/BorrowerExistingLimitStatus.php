<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerExistingLimitStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'user_id',
        'is_authorize',
        'authorizer_id',
        'type',
        'amount',
        'expiry_date',
        'regular',
        'amount_overdue_if_any',
        'amount_rescheduled_restructured_if_any'
    ];

}
