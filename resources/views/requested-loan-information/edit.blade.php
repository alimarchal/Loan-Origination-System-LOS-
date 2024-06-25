<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            {{--            {{ $student->gender === 'Male' ? 'Mr.' : ($student->gender === 'Female' ? 'Miss' : '') }}--}}
            {{--            {{ $student->firstname . ' ' . $student->lastename }} - {{ $student->id }}--}}
            {{--            ::--}}
            {{--            <span class="text-red-700 font-extrabold">Contact: {{ $student->mobile_number_for_sms_alert }} / {{ $student->guardian_emergency_contact }}</span>--}}
        </h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-red-700">Requested Loan Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        @if(empty($borrower->applicant_requested_loan_information))
                            <form method="POST" action="{{ route('applicant.requested-loan-information.store', $borrower->id) }}" enctype="multipart/form-data">
                                @csrf
                        @else
                            <form method="POST" action="{{ route('applicant.requested-loan-information.update',  [$borrower->id, $borrower->applicant_requested_loan_information?->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">



                                <div>
                                    <x-label for="request_date" value="Request Date" :required="true" />
                                    <x-input id="request_date" class="block mt-1 w-full" type="date" max="{{ date('Y-m-d') }}" name="request_date" :value="old('request_date', $borrower->applicant_requested_loan_information?->request_date)" required/>
                                </div>

                                <div>
                                    <x-label for="requested_amount" value="Requested Amount" />
                                    <x-input id="requested_amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="requested_amount" :value="old('requested_amount', $borrower->applicant_requested_loan_information?->requested_amount)" />
                                </div>

                                <div>
                                    <x-label for="margin_on_gold_limit" value="Margin on Gold Limit" />
                                    <x-input id="margin_on_gold_limit" class="block mt-1 w-full" type="number" step="0.01" min="0" name="margin_on_gold_limit" :value="old('margin_on_gold_limit', $borrower->applicant_requested_loan_information?->margin_on_gold_limit)" />
                                </div>

                                <div>
                                    <x-label for="loan_purpose" value="Loan Purpose" />
                                    <x-input id="loan_purpose" class="block mt-1 w-full" type="text" name="loan_purpose" :value="old('loan_purpose', $borrower->applicant_requested_loan_information?->loan_purpose)" />
                                </div>

                                <div>
                                    <x-label for="status" value="Status" />
                                    <select name="status" id="status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="Fresh" {{ old('status', $borrower->applicant_requested_loan_information?->status) == 'Fresh' ? 'selected' : '' }}>Fresh</option>
                                        <option value="Enhancement" {{ old('status', $borrower->applicant_requested_loan_information?->status) == 'Enhancement' ? 'selected' : '' }}>Enhancement</option>
                                        <option value="Renewal" {{ old('status', $borrower->applicant_requested_loan_information?->status) == 'Renewal' ? 'selected' : '' }}>Renewal</option>
                                        <option value="Reduction" {{ old('status', $borrower->applicant_requested_loan_information?->status) == 'Reduction' ? 'selected' : '' }}>Reduction</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="tenure_in_years" value="Tenure in Years" />
                                    <select name="tenure_in_years" id="tenure_in_years" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @for($i = 0; $i <= 20; $i++)
                                            <option value="{{$i}}" {{ old('grade', $borrower->applicant_requested_loan_information?->tenure_in_years) == $i ? 'selected' : '' }}>{{$i}} Years</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <x-label for="tenure_in_months" value="Tenure in Months" />
                                    <select name="tenure_in_months" id="tenure_in_months" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @for($i = 0; $i <= 11; $i++)
                                            <option value="{{$i}}" {{ old('grade', $borrower->applicant_requested_loan_information?->tenure_in_months) == $i ? 'selected' : '' }}>{{$i}} Months</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <x-label for="repayment_frequency" value="Repayment Frequency" />
                                        <select name="repayment_frequency" id="repayment_frequency" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                            <option value="">Select an option</option>
                                            @foreach(\App\Models\Status::where('status', 'Repayment Frequency')->get() as $item)
                                                <option value="{{ $item->name }}" {{ old('service_status', $borrower->applicant_requested_loan_information?->repayment_frequency) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div>
                                    <x-label for="salary_account_no" value="Salary Account No" />
                                    <x-input id="salary_account_no" class="block mt-1 w-full" type="text" name="salary_account_no" :value="old('salary_account_no', $borrower->applicant_requested_loan_information?->salary_account_no)" />
                                </div>

                                <div>
                                    <x-label for="salary_account_branch_name" value="Salary Account Branch Name" />
                                    <x-input id="salary_account_branch_name" class="block mt-1 w-full" type="text" name="salary_account_branch_name" :value="old('salary_account_branch_name', $borrower->applicant_requested_loan_information?->salary_account_branch_name)" />
                                </div>

                                <div>
                                    <x-label for="salary_account_bank_name" value="Salary Account Bank Name" />
                                    <x-input id="salary_account_bank_name" class="block mt-1 w-full" type="text" name="salary_account_bank_name" :value="old('salary_account_bank_name', $borrower->applicant_requested_loan_information?->salary_account_bank_name)" />
                                </div>

                                <div>
                                    <x-label for="account_with_bajk" value="Account with BAJK" />
                                    <x-input id="account_with_bajk" class="block mt-1 w-full" type="text" name="account_with_bajk" :value="old('account_with_bajk', $borrower->applicant_requested_loan_information?->account_with_bajk)" />
                                </div>

                                <div>
                                    <x-label for="account_with_other_banks" value="Account with Other Banks" />
                                    <x-input id="account_with_other_banks" class="block mt-1 w-full" type="text" name="account_with_other_banks" :value="old('account_with_other_banks', $borrower->applicant_requested_loan_information?->account_with_other_banks)" />
                                </div>

                                <div>
                                    <x-label for="markup_rate_type" value="Markup Rate Type" />
                                    <select name="markup_rate_type" id="markup_rate_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="FIXED"  {{ old('markup_rate_type', $borrower->applicant_requested_loan_information?->markup_rate_type) == 'FIXED' ? 'selected' : '' }}>FIXED</option>
                                        <option value="KIBOR"  {{ old('markup_rate_type', $borrower->applicant_requested_loan_information?->markup_rate_type) == 'KIBOR' ? 'selected' : '' }}>KIBOR</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="is_insured" value="Is Insured" />
                                    <select name="is_insured" id="is_insured" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="Yes"  {{ old('is_insured', $borrower->applicant_requested_loan_information?->is_insured) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No"  {{ old('is_insured', $borrower->applicant_requested_loan_information?->is_insured) == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>


                            </div>
                            <div class="flex items-center justify-end mt-4">
                                @if(empty($borrower->applicant_requested_loan_information))
                                    <x-button class="ml-4" id="submit-btn">Save</x-button>
                                @else
                                    <x-button class="ml-4" id="submit-btn">Update</x-button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>