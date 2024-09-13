<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreditReporting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'branch_id',
        'is_authorize',
        'authorizer_id',
        'name',
        'national_id_cnic',
        'comments',
        'path_attachment',
        'status',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
