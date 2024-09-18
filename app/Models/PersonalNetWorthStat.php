<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonalNetWorthStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_authorize',
        'authorizer_id',
        'name', 'nic_no', 'father_name', 'ntn_no', 'business_address', 'tel_office',
        'res_address', 'tel_res', 'qualification', 'education', 'profession'
    ];

    public function personal_form_a(): HasMany
    {
        return $this->hasMany(PersonalNetWorthForma::class);
    }


    public function personal_form_b(): HasMany
    {
        return $this->hasMany(PersonalNetWorthFormb::class);
    }



    public function personal_form_c(): HasMany
    {
        return $this->hasMany(PersonalNetWorthFormc::class);
    }


    public function personal_form_d(): HasMany
    {
        return $this->hasMany(PersonalNetWorthFormd::class);
    }
}
