<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'is_authorize',
        'authorizer_id',
        'user_id',
        'document_type',
        'description',
        'path_attachment',
    ];


    public function doc_type(): BelongsTo
    {
        return $this->belongsTo(Status::class,'document_type','id');
    }

}
