<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanStatusHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'user_id',
        'status',
        'comments',
        'attachment',
    ];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
