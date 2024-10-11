<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSanctionAdviceRequest extends FormRequest
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
            'type_of_finance' => 'required|string|max:255',
            'sgl_code' => 'required|string|max:255',
            'nature_of_finance' => 'required|string|max:255',
            'purpose_of_finance' => 'required|string|max:255',
            'tenure' => 'required|text',
            'take_home_salary' => 'required|numeric',
            'dsr_required' => 'required|string|max:255',
            'dsr_actual' => 'required|string|max:255',
            'requested_amount_status' => 'required|string|max:255',
            'amount_of_finance_limit' => 'required|numeric',
            'previous_outstanding' => 'nullable|string|max:255',
            'enhancement_amount' => 'nullable|numeric',
            'total_amount' => 'nullable|numeric',
            'repayment_history' => 'nullable|string',
            'rate_of_markup' => 'nullable|string',
            'monthly_installment' => 'nullable|numeric',
            'repayment_schedule_monthly_installment' => 'nullable',
            'life_insurance_sgl' => 'nullable|string',
            'borrower_pgs_no_issued' => 'nullable|string|max:255',
            'borrower_rp_status' => 'nullable|string|max:255',
            'guarantor_pgs_no_issued' => 'nullable|string|max:255',
            'guarantor_rp_status' => 'nullable|string|max:255',
        ];
    }
}
