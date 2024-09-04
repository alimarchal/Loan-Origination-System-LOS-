<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetWorth extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'is_authorize',
        'authorizer_id',
        'total_liabilities',
        'total_assets',
        'personal_net_worth',
        'date_calculated',
    ];

    public function borrower()
    {
        return $this->belongsTo(User::class, 'borrower_id');
    }

    public function liabilities()
    {
        return $this->hasMany(Liability::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
