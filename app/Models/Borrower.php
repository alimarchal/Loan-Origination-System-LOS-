<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    use HasFactory;
    use HasUuids;
//    use softDeletes;


    protected $fillable = [
        'user_id',
        'authorizer_id',
        'region_id',
        'branch_id',
        'borrower_type',
        'date_registered',
        'loan_category_id',
        'loan_sub_category_id',
        'name',
        'relationship_status',
        'parent_spouse_name',
        'gender',
        'national_id_cnic',
        'ntn',
        'parent_spouse_national_id_cnic',
        'number_of_dependents',
        'education_qualification',
        'email',
        'fax',
        'nature_of_business',
        'details_of_payment_schedule_if_sought',
        'residence_phone_number',
        'office_phone_number',
        'mobile_number',
        'present_address',
        'permanent_address',
        'occupation_title',
        'job_title',
        'date_of_birth',
        'age',
        'marital_status',
        'home_ownership_status',
        'nationality',
        'next_of_kin_name',
        'next_of_kin_mobile_number',
        'business_name',
        'business_address',
        'business_contact_number',
        'business_email',
        'business_registration_number',
        'nadra_verification_for_signature',
        'signature_date',
        'nadra_verification_scanned_attachment',
        'digital_signature_scanned_attachment'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }

    public function loan_category(): BelongsTo
    {
        return $this->belongsTo(LoanSubCategory::class,'loan_category_id','id');
    }
    public function loan_sub_category(): BelongsTo
    {
        return $this->belongsTo(LoanSubCategory::class,'loan_sub_category_id','id');
    }

    public function employment_information(): HasOne
    {
        return $this->hasOne(BorrowerEmploymentInformation::class, 'borrower_id', 'id');
    }

    public function applicant_business(): HasOne
    {
        return $this->hasOne(BorrowerBusiness::class, 'borrower_id', 'id');
    }


    public function applicant_requested_loan_information(): HasOne
    {
        return $this->hasOne(RequestedLoanAmount::class, 'borrower_id', 'id');
    }

    public function reference(): HasMany
    {
        return $this->hasMany(Reference::class);
    }

    public function borrower_fact_sheet_consumer(): HasOne
    {
        return $this->hasOne(BasicBorrowerFactSheetConsumer::class);
    }

    public function personalNetWorthStat(): HasOne
    {
        return $this->hasOne(PersonalNetWorthStat::class);
    }
}
