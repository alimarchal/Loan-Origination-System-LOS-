<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ObligorScoreCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'is_authorize',
        'authorizer_id',
        'score_card_factor_id','score_card_factor_opt_id','score_available','score_gained'];

    public function obligor_score_card_factor(): HasMany
    {
        return $this->hasMany(ObligorScoreCardFactor::class);
    }
}
