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
            'tenure' => 'required|string|max:255',
            'take_home_salary' => 'required|numeric|min:0',
            'dsr_required' => 'required|string|max:255',
            'dsr_actual' => 'required|string|max:255',
            'requested_amount_status' => 'required|string|max:255',
            'amount_of_finance_limit' => 'required|numeric|min:0',
            'previous_outstanding' => 'nullable|string|max:255',
            'enhancement_amount' => 'nullable|numeric|min:0',
            'total_amount' => 'nullable|numeric|min:0',
            'repayment_history' => 'nullable|string',
            'rate_of_markup' => 'nullable|string|max:255',
            'monthly_installment' => 'nullable|numeric|min:0',
            'repayment_schedule_monthly_installment' => 'nullable|string',
            'life_insurance_sgl' => 'nullable|string|max:255',
            'borrower_pgs_no_issued' => 'nullable|string|max:255',
            'borrower_rp_status' => 'nullable|string|max:255',
            'guarantor_pgs_no_issued' => 'nullable|string|max:255',
            'guarantor_rp_status' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'type_of_finance.required' => 'Type of finance is required',
            'sgl_code.required' => 'SGL code is required',
            'nature_of_finance.required' => 'Nature of finance is required',
            'purpose_of_finance.required' => 'Purpose of finance is required',
            'tenure.required' => 'Tenure is required',
            'take_home_salary.required' => 'Take home salary is required',
            'take_home_salary.numeric' => 'Take home salary must be a number',
            'dsr_required.required' => 'DSR required is required',
            'dsr_actual.required' => 'DSR actual is required',
            'requested_amount_status.required' => 'Requested amount status is required',
            'amount_of_finance_limit.required' => 'Amount of finance limit is required',
            'amount_of_finance_limit.numeric' => 'Amount of finance limit must be a number',
            'enhancement_amount.numeric' => 'Enhancement amount must be a number',
            'total_amount.numeric' => 'Total amount must be a number',
            'monthly_installment.numeric' => 'Monthly installment must be a number',
        ];
    }
}