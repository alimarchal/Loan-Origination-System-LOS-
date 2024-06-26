<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Edit Finance Facility
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

                        <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">Finance Facility Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('finance_facility.update', [$borrower->id, $financeFacility->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <!-- Form fields for Finance Facility -->
                                <div>
                                    <x-label for="institution_name" value="Institution Name" />
                                    <x-input id="institution_name" class="block mt-1 w-full" type="text" name="institution_name" :value="old('institution_name', $financeFacility->institution_name)" />
                                </div>

                                <div>
                                    <x-label for="repayment_status" value="Repayment Status" />
                                    <x-input id="repayment_status" class="block mt-1 w-full" type="text" name="repayment_status" :value="old('repayment_status', $financeFacility->repayment_status)" />
                                </div>

                                <div>
                                    <x-label for="facility_type" value="Facility Type" />
                                    <select name="facility_type" id="facility_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="Loan" {{ old('facility_type', $financeFacility->facility_type) == 'Loan' ? 'selected' : '' }}>Loan</option>
                                        <option value="Credit" {{ old('facility_type', $financeFacility->facility_type) == 'Credit' ? 'selected' : '' }}>Credit</option>
                                        <option value="Mortgage" {{ old('facility_type', $financeFacility->facility_type) == 'Mortgage' ? 'selected' : '' }}>Mortgage</option>
                                        <option value="Lease" {{ old('facility_type', $financeFacility->facility_type) == 'Lease' ? 'selected' : '' }}>Lease</option>
                                        <option value="Other" {{ old('facility_type', $financeFacility->facility_type) == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="amount" value="Amount" />
                                    <x-input id="amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="amount" :value="old('amount', $financeFacility->amount)" />
                                </div>

                                <div>
                                    <x-label for="loan_limit" value="Loan Limit" />
                                    <x-input id="loan_limit" class="block mt-1 w-full" type="number" step="0.01" min="0" name="loan_limit" :value="old('loan_limit', $financeFacility->loan_limit)" />
                                </div>

                                <div>
                                    <x-label for="outstanding_amount" value="Outstanding Amount" />
                                    <x-input id="outstanding_amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="outstanding_amount" :value="old('outstanding_amount', $financeFacility->outstanding_amount)" />
                                </div>

                                <div>
                                    <x-label for="monthly_installment" value="Monthly Installment" />
                                    <x-input id="monthly_installment" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_installment" :value="old('monthly_installment', $financeFacility->monthly_installment)" />
                                </div>

                                <div>
                                    <x-label for="interest_rate" value="Interest Rate (%)" />
                                    <x-input id="interest_rate" class="block mt-1 w-full" type="number" step="0.01" min="0" name="interest_rate" :value="old('interest_rate', $financeFacility->interest_rate)" />
                                </div>

                                <div>
                                    <x-label for="term_months" value="Term (Months)" />
                                    <x-input id="term_months" class="block mt-1 w-full" type="number" min="0" name="term_months" :value="old('term_months', $financeFacility->term_months)" />
                                </div>

                                <div>
                                    <x-label for="start_date" value="Start Date" />
                                    <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date', $financeFacility->start_date)" />
                                </div>

                                <div>
                                    <x-label for="end_date" value="End Date" />
                                    <x-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date', $financeFacility->end_date)" />
                                </div>

                                <div>
                                    <x-label for="purpose_of_loan" value="Purpose of Loan" />
                                    <x-input id="purpose_of_loan" class="block mt-1 w-full" type="text" name="purpose_of_loan" :value="old('purpose_of_loan', $financeFacility->purpose_of_loan)" />
                                </div>

                                <div>
                                    <x-label for="status" value="Status" />
                                    <select name="status" id="status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="Closed" {{ old('status', $financeFacility->status) == 'Closed' ? 'selected' : '' }}>Closed</option>
                                        <option value="Ir-Red" {{ old('status', $financeFacility->status) == 'Ir-Red' ? 'selected' : '' }}>Ir-Red</option>
                                        <option value="Regular" {{ old('status', $financeFacility->status) == 'Regular' ? 'selected' : '' }}>Regular</option>
                                        <option value="Over Due" {{ old('status', $financeFacility->status) == 'Over Due' ? 'selected' : '' }}>Over Due</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="remarks" value="Remarks" />
                                    <textarea id="remarks" class="block mt-1 w-full" name="remarks">{{ old('remarks', $financeFacility->remarks) }}</textarea>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">Update Finance Facility</x-button>
                            </div>
                        </form>

                        <a href="{{ route('finance_facility.index', $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
