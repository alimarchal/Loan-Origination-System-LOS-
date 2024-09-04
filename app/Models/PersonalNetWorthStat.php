<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalNetWorthStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_authorize',
        'authorizer_id',
        'name', 'nic_no', 'father_name', 'ntn_no', 'business_address', 'tel_office',
        'res_address', 'tel_res', 'qualification', 'education', 'profession'
    ];
}
