<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_sub_category_id',
        'sequence_no',
        'name',
        'route',
        'status',
    ];
}
