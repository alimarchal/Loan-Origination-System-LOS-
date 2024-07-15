<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObligorScoreCardFactor extends Model
{
    use HasFactory;

    public function obligor_score_factor_options(): HasMany
    {
        return $this->hasMany(OscfOpt::class);
    }
}
