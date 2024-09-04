<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
//            'user_id' => 'required|integer',
//            'authorizer_id' => 'required|integer',
//            'region_id' => 'required|integer',
//            'branch_id' => 'required|integer',
            'credit_reporting_id' => 'required|exists:credit_reportings,id',
            'borrower_type' => 'required|string|max:255',
//            'date_registered' => 'required|date',
            'loan_category_id' => 'required|integer',
            'loan_sub_category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'relationship_status' => 'required|string|max:255',
            'parent_spouse_name' => 'nullable|string|max:255',
            'gender' => 'required',
            'national_id_cnic' => 'required|string|max:15',
            'parent_spouse_national_id_cnic' => 'nullable|string|max:15',
            'number_of_dependents' => 'nullable|integer',
            'education_qualification' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'fax' => 'nullable|string|max:20',
            'nature_of_business' => 'nullable|string|max:255',
            'details_of_payment_schedule_if_sought' => 'nullable|string|max:255',
            'residence_phone_number' => 'nullable|string|max:20',
            'office_phone_number' => 'nullable|string|max:20',
            'mobile_number' => 'required|string|max:20',
            'present_address' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'occupation_title' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
//            'age' => 'required|integer|min:18',
            'marital_status' => 'required|string|max:255',
            'home_ownership_status' => 'nullable|string|max:255',
//            'nationality' => 'required|string|max:255',
            'next_of_kin_name' => 'nullable|string|max:255',
            'next_of_kin_mobile_number' => 'nullable|string|max:20',
//            'business_name' => 'nullable|string|max:255',
//            'business_address' => 'nullable|string|max:255',
//            'business_contact_number' => 'nullable|string|max:20',
//            'business_email' => 'nullable|email|max:255',
//            'business_registration_number' => 'nullable|string|max:50',
            'nadra_verification_for_signature' => 'nullable|string|max:255',
            'signature_date' => 'nullable|date',
            'nadra_verification_scanned_attachment' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'digital_signature_scanned_attachment' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'authorizer_id.required' => 'The authorizer ID is required.',
            'authorizer_id.integer' => 'The authorizer ID must be an integer.',
            'region_id.required' => 'The region ID is required.',
            'region_id.integer' => 'The region ID must be an integer.',
            'branch_id.required' => 'The branch ID is required.',
            'branch_id.integer' => 'The branch ID must be an integer.',
            'borrower_type.required' => 'The borrower type is required.',
            'borrower_type.string' => 'The borrower type must be a string.',
            'borrower_type.max' => 'The borrower type may not be greater than 255 characters.',
//            'date_registered.required' => 'The date registered is required.',
//            'date_registered.date' => 'The date registered is not a valid date.',
            'loan_category_id.required' => 'The loan category ID is required.',
            'loan_category_id.integer' => 'The loan category ID must be an integer.',
            'loan_sub_category_id.integer' => 'The loan sub category ID must be an integer.',
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'relationship_status.required' => 'The relation status is required.',
            'relationship_status.string' => 'The relation status must be a string.',
            'relationship_status.max' => 'The relation status may not be greater than 255 characters.',
            'parent_spouse_name.string' => 'The parent/spouse name must be a string.',
            'parent_spouse_name.max' => 'The parent/spouse name may not be greater than 255 characters.',
            'gender.required' => 'The gender is required.',
            'gender.string' => 'The gender must be a string.',
            'gender.in' => 'The selected gender is invalid.',
            'national_id_cnic.required' => 'The national ID/CNIC is required.',
            'national_id_cnic.string' => 'The national ID/CNIC must be a string.',
            'national_id_cnic.max' => 'The national ID/CNIC may not be greater than 15 characters.',
            'parent_spouse_national_id_cnic.string' => 'The parent/spouse national ID/CNIC must be a string.',
            'parent_spouse_national_id_cnic.max' => 'The parent/spouse national ID/CNIC may not be greater than 15 characters.',
            'number_of_dependents.integer' => 'The number of dependents must be an integer.',
            'education_qualification.string' => 'The education qualification must be a string.',
            'education_qualification.max' => 'The education qualification may not be greater than 255 characters.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'fax.string' => 'The fax must be a string.',
            'fax.max' => 'The fax may not be greater than 20 characters.',
            'nature_of_business.string' => 'The nature of business must be a string.',
            'nature_of_business.max' => 'The nature of business may not be greater than 255 characters.',
            'details_of_payment_schedule_if_sought.string' => 'The details of payment schedule if sought must be a string.',
            'details_of_payment_schedule_if_sought.max' => 'The details of payment schedule if sought may not be greater than 255 characters.',
            'residence_phone_number.string' => 'The residence phone number must be a string.',
            'residence_phone_number.max' => 'The residence phone number may not be greater than 20 characters.',
            'office_phone_number.string' => 'The office phone number must be a string.',
            'office_phone_number.max' => 'The office phone number may not be greater than 20 characters.',
            'mobile_number.required' => 'The mobile number is required.',
            'mobile_number.string' => 'The mobile number must be a string.',
            'mobile_number.max' => 'The mobile number may not be greater than 20 characters.',
            'present_address.required' => 'The present address is required.',
            'present_address.string' => 'The present address must be a string.',
            'present_address.max' => 'The present address may not be greater than 255 characters.',
            'permanent_address.string' => 'The permanent address must be a string.',
            'permanent_address.max' => 'The permanent address may not be greater than 255 characters.',
            'occupation_title.string' => 'The occupation title must be a string.',
            'occupation_title.max' => 'The occupation title may not be greater than 255 characters.',
            'job_title.string' => 'The job title must be a string.',
            'job_title.max' => 'The job title may not be greater than 255 characters.',
            'date_of_birth.required' => 'The date of birth is required.',
            'date_of_birth.date' => 'The date of birth is not a valid date.',
            'age.required' => 'The age is required.',
            'age.integer' => 'The age must be an integer.',
            'age.min' => 'The age must be at least 18.',
            'marital_status.required' => 'The marital status is required.',
            'marital_status.string' => 'The marital status must be a string.',
            'marital_status.max' => 'The marital status may not be greater than 255 characters.',
            'home_ownership_status.string' => 'The home ownership status must be a string.',
            'home_ownership_status.max' => 'The home ownership status may not be greater than 255 characters.',
            'nationality.required' => 'The nationality is required.',
            'nationality.string' => 'The nationality must be a string.',
            'nationality.max' => 'The nationality may not be greater than 255 characters.',
            'next_of_kin_name.string' => 'The next of kin name must be a string.',
            'next_of_kin_name.max' => 'The next of kin name may not be greater than 255 characters.',
            'next_of_kin_mobile_number.string' => 'The next of kin mobile number must be a string.',
            'next_of_kin_mobile_number.max' => 'The next of kin mobile number may not be greater than 20 characters.',
            'business_name.string' => 'The business name must be a string.',
            'business_name.max' => 'The business name may not be greater than 255 characters.',
            'business_address.string' => 'The business address must be a string.',
            'business_address.max' => 'The business address may not be greater than 255 characters.',
            'business_contact_number.string' => 'The business contact number must be a string.',
            'business_contact_number.max' => 'The business contact number may not be greater than 20 characters.',
            'business_email.email' => 'The business email must be a valid email address.',
            'business_email.max' => 'The business email may not be greater than 255 characters.',
            'business_registration_number.string' => 'The business registration number must be a string.',
            'business_registration_number.max' => 'The business registration number may not be greater than 50 characters.',
            'nadra_verification_for_signature.string' => 'The NADRA verification for signature must be a string.',
            'nadra_verification_for_signature.max' => 'The NADRA verification for signature may not be greater than 255 characters.',
            'signature_date.date' => 'The signature date is not a valid date.',
            'nadra_verification_scanned_attachment.file' => 'The NADRA verification scanned attachment must be a file.',
            'nadra_verification_scanned_attachment.mimes' => 'The NADRA verification scanned attachment must be a file of type: jpeg, png, pdf.',
            'nadra_verification_scanned_attachment.max' => 'The NADRA verification scanned attachment may not be greater than 2048 kilobytes.',
            'digital_signature_scanned_attachment.file' => 'The digital signature scanned attachment must be a file.',
            'digital_signature_scanned_attachment.mimes' => 'The digital signature scanned attachment must be a file of type: jpeg, png, pdf.',
            'digital_signature_scanned_attachment.max' => 'The digital signature scanned attachment may not be greater than 2048 kilobytes.',
        ];
    }
}
