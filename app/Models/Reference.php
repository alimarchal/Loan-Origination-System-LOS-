<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'user_id',
        'name',
        'father_husband',
        'national_id',
        'ntn',
        'date_of_birth',
        'present_address',
        'permanent_address',
        'phone_number',
        'phone_number_two',
        'phone_number_three',
        'email',
        'fax',
        'designation',
        'relationship_to_borrower',
    ];
}
