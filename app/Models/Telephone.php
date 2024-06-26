<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'contact',
        'status',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
