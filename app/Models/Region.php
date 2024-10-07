<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }


    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
