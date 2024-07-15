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

                        <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">Applicant Business Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                            <form method="POST" action="{{ route('applicant.applicant-business.store',  $borrower->id) }}" enctype="multipart/form-data">
                                @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

                                <div>
                                    <x-label for="name" value="Business Name" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                                </div>

                                <div>
                                    <x-label for="type" value="Business Type" />
                                    <select name="type" id="type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Business Type')->get() as $item)
                                            <option value="{{ $item->name }}" {{ old('type') == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="address" value="Business Address" />
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                                </div>

                                <div>
                                    <x-label for="landline" value="Landline Number" />
                                    <x-input id="landline" class="block mt-1 w-full" type="text" name="landline" :value="old('landline')" />
                                </div>

                                <div>
                                    <x-label for="mobile" value="Mobile Number" />
                                    <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" />
                                </div>


                                <div>
                                    <x-label for="designation" value="Designation" />
                                    <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" />
                                </div>

                                <div>
                                    <x-label for="monthly_revenue" value="Monthly Revenue / Income" />
                                    <x-input id="monthly_revenue" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_revenue" :value="old('monthly_revenue')" />
                                </div>

                                <div>
                                    <x-label for="monthly_expenses" value="Monthly Expenses" />
                                    <x-input id="monthly_expenses" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_expenses" :value="old('monthly_expenses')" />
                                </div>

                                <div>
                                    <x-label for="net_monthly_income" value="Net Monthly Income" />
                                    <x-input id="net_monthly_income" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_monthly_income" :value="old('net_monthly_income')" />
                                </div>


                                <div>
                                    <x-label for="start_date" value="Commencement Date" />
                                    <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" />
                                </div>

                                <div>
                                    <x-label for="acquisition_date" value="Takeover Date" />
                                    <x-input id="acquisition_date" class="block mt-1 w-full" type="date" name="acquisition_date" :value="old('acquisition_date')" />
                                </div>

                                <div>
                                    <x-label for="experience_years" value="Years of Experience" />
                                    <x-input id="experience_years" class="block mt-1 w-full" type="number" min="0" name="experience_years" :value="old('experience_years')" />
                                </div>


                                <div>
                                    <x-label for="number_of_employees" value="Number of Employees" />
                                    <x-input id="number_of_employees" class="block mt-1 w-full" type="number" min="0" name="number_of_employees" :value="old('number_of_employees')" />
                                </div>

                                <div>
                                    <x-label for="tax_number" value="National Tax Number (NTN)" />
                                    <x-input id="tax_number" class="block mt-1 w-full" type="text" name="tax_number" :value="old('tax_number')" />
                                </div>



                                <div>
                                    <x-label for="initial_investment" value="Initial Investment" />
                                    <x-input id="initial_investment" class="block mt-1 w-full" type="number" step="0.01" min="0" name="initial_investment" :value="old('initial_investment')" />
                                </div>

                                <div>
                                    <x-label for="investment_source" value="Investment Source" />
                                    <x-input id="investment_source" class="block mt-1 w-full" type="text" name="investment_source" :value="old('investment_source')" />
                                </div>

                                <div>
                                    <x-label for="premises_status" value="Premises Status" />
                                    <select name="premises_status" id="premises_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="owned">Owned</option>
                                        <option value="rented">Rented</option>
                                        <option value="leased">Leased</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="monthly_rent" value="Monthly Rent" />
                                    <x-input id="monthly_rent" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_rent" :value="old('monthly_rent')" />
                                </div>

                                <div>
                                    <x-label for="average_monthly_balance" value="Average Monthly Balance" />
                                    <x-input id="average_monthly_balance" class="block mt-1 w-full" type="number" step="0.01" min="0" name="average_monthly_balance" :value="old('average_monthly_balance')" />
                                </div>

                                <div>
                                    <x-label for="account_opening_date" value="Account Opening Date" />
                                    <x-input id="account_opening_date" class="block mt-1 w-full" type="date" name="account_opening_date" :value="old('account_opening_date')" />
                                </div>

                                <div>
                                    <x-label for="average_balance_six_months" value="Average Balance Last Six Months" />
                                    <x-input id="average_balance_six_months" class="block mt-1 w-full" type="number" step="0.01" min="0" name="average_balance_six_months" :value="old('average_balance_six_months')" />
                                </div>

                                <div>
                                    <x-label for="account_no" value="Bank Account Number" />
                                    <x-input id="account_no" class="block mt-1 w-full" type="text" name="account_no" :value="old('account_no')" />
                                </div>

                                <div>
                                    <x-label for="bank_name" value="Bank Name" />
                                    <x-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')" />
                                </div>

                                <div>
                                    <x-label for="net_worth" value="Business Net Worth" />
                                    <x-input id="net_worth" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_worth" :value="old('net_worth')" />
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-4" id="submit-btn">Save</x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>