<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_category_id',
        'name',
        'status',
    ];
}
