<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Create Guarantor
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

                        <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">Guarantor Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('guarantor.store', $borrower->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <!-- Form fields for Guarantor -->
                                <div>
                                    <x-label for="guarantor_type" value="Guarantor Type" />
                                    <select name="guarantor_type" id="guarantor_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="Individual" {{ old('guarantor_type') == 'Individual' ? 'selected' : '' }}>Individual</option>
                                        <option value="Business" {{ old('guarantor_type') == 'Business' ? 'selected' : '' }}>Business</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="title" value="Title" />
                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
                                </div>

                                <div>
                                    <x-label for="name" value="Name" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                                </div>

                                <div>
                                    <x-label for="father_husband" value="Father/Husband Name" />
                                    <x-input id="father_husband" class="block mt-1 w-full" type="text" name="father_husband" :value="old('father_husband')" />
                                </div>

                                <div>
                                    <x-label for="national_id" value="National ID" />
                                    <x-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" :value="old('national_id')" />
                                </div>

                                <div>
                                    <x-label for="phone_number" value="Phone Number" />
                                    <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" />
                                </div>

                                <div>
                                    <x-label for="phone_number_two" value="Phone Number Two" />
                                    <x-input id="phone_number_two" class="block mt-1 w-full" type="text" name="phone_number_two" :value="old('phone_number_two')" />
                                </div>

                                <div>
                                    <x-label for="email" value="Email" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                                </div>

                                <div>
                                    <x-label for="present_address" value="Present Address" />
                                    <x-input id="present_address" class="block mt-1 w-full" type="text" name="present_address" :value="old('present_address')" />
                                </div>

                                <div>
                                    <x-label for="permanent_address" value="Permanent Address" />
                                    <x-input id="permanent_address" class="block mt-1 w-full" type="text" name="permanent_address" :value="old('permanent_address')" />
                                </div>

                                <div>
                                    <x-label for="department" value="Department" />
                                    <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" />
                                </div>

                                <div>
                                    <x-label for="designation" value="Designation" />
                                    <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" />
                                </div>

                                <div>
                                    <x-label for="employer_name" value="Employer Name" />
                                    <x-input id="employer_name" class="block mt-1 w-full" type="text" name="employer_name" :value="old('employer_name')" />
                                </div>

                                <div>
                                    <x-label for="employee_personal_number" value="Employee Personal Number" />
                                    <x-input id="employee_personal_number" class="block mt-1 w-full" type="text" name="employee_personal_number" :value="old('employee_personal_number')" />
                                </div>

                                <div>
                                    <x-label for="employment_status" value="Employment Status" />
                                    <x-input id="employment_status" class="block mt-1 w-full" type="text" name="employment_status" :value="old('employment_status')" />
                                </div>

                                <div>
                                    <x-label for="monthly_gross_salary" value="Monthly Gross Salary" />
                                    <x-input id="monthly_gross_salary" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_gross_salary" :value="old('monthly_gross_salary')" />
                                </div>

                                <div>
                                    <x-label for="date_of_retirement" value="Date of Retirement" />
                                    <x-input id="date_of_retirement" class="block mt-1 w-full" type="date" name="date_of_retirement" :value="old('date_of_retirement')" />
                                </div>

                                <div>
                                    <x-label for="relationship_to_borrower" value="Relationship to Borrower" />
                                    <x-input id="relationship_to_borrower" class="block mt-1 w-full" type="text" name="relationship_to_borrower" :value="old('relationship_to_borrower')" />
                                </div>

                                <div>
                                    <x-label for="net_worth" value="Net Worth" />
                                    <x-input id="net_worth" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_worth" :value="old('net_worth')" />
                                </div>

                                <div>
                                    <x-label for="business_registration_number" value="Business Registration Number" />
                                    <x-input id="business_registration_number" class="block mt-1 w-full" type="text" name="business_registration_number" :value="old('business_registration_number')" />
                                </div>

                                <div>
                                    <x-label for="annual_revenue" value="Annual Revenue" />
                                    <x-input id="annual_revenue" class="block mt-1 w-full" type="number" step="0.01" min="0" name="annual_revenue" :value="old('annual_revenue')" />
                                </div>

                                <div>
                                    <x-label for="annual_expenses" value="Annual Expenses" />
                                    <x-input id="annual_expenses" class="block mt-1 w-full" type="number" step="0.01" min="0" name="annual_expenses" :value="old('annual_expenses')" />
                                </div>

                                <div>
                                    <x-label for="net_annual_income" value="Net Annual Income" />
                                    <x-input id="net_annual_income" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_annual_income" :value="old('net_annual_income')" />
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
