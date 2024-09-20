
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
                                    <x-label for="dob" value="Date of Birth" />
                                    <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" />
                                </div>

                                <div>
                                    <x-label for="ntn" value="NTN" />
                                    <x-input id="ntn" class="block mt-1 w-full" type="text" name="ntn" :value="old('ntn')" />
                                </div>

                                <div>
                                    <x-label for="nature_of_business" value="Nature of Business" />
                                    <x-input id="nature_of_business" class="block mt-1 w-full" type="text" name="nature_of_business" :value="old('nature_of_business')" />
                                </div>

                                <div>
                                    <x-label for="title_of_business" value="Title of Business" />
                                    <x-input id="title_of_business" class="block mt-1 w-full" type="text" name="title_of_business" :value="old('title_of_business')" />
                                </div>

                                <div>
                                    <x-label for="major_business_activities" value="Major Business Activities" />
                                    <x-input id="major_business_activities" class="block mt-1 w-full" type="text" name="major_business_activities" :value="old('major_business_activities')" />
                                </div>

                                <div>
                                    <x-label for="exact_location_of_business_place" value="Exact Location of Business Place" />
                                    <x-input id="exact_location_of_business_place" class="block mt-1 w-full" type="text" name="exact_location_of_business_place" :value="old('exact_location_of_business_place')" />
                                </div>

                                <div>
                                    <x-label for="business_bank_account_maintained" value="Business Bank Account Maintained" />
                                    <x-input id="business_bank_account_maintained" class="block mt-1 w-full" type="text" name="business_bank_account_maintained" :value="old('business_bank_account_maintained')" />
                                </div>

                                <div>
                                    <x-label for="annual_turnover" value="Annual Turnover" />
                                    <x-input id="annual_turnover" class="block mt-1 w-full" type="number" step="0.01" min="0" name="annual_turnover" :value="old('annual_turnover')" />
                                </div>

                                <!-- Additional Fields -->
                                <div>
                                    <x-label for="bps_sps_no" value="BPS or SPS No." />
                                    <x-input id="bps_sps_no" class="block mt-1 w-full" type="text" name="bps_sps_no" :value="old('bps_sps_no')" />
                                </div>

                                <div>
                                    <x-label for="date_of_joining" value="Date of Joining" />
                                    <x-input id="date_of_joining" class="block mt-1 w-full" type="date" name="date_of_joining" :value="old('date_of_joining')" />
                                </div>

                                <div>

                                    <x-label for="remaining_service_25_years" value="Remaining Service (25 years)" />
                                    <x-input id="remaining_service_25_years" class="block mt-1 w-full" type="number" step="0.01" min="0" name="remaining_service_25_years" :value="old('remaining_service_25_years')" />

                                </div>

                                <div>
                                    <x-label for="remaining_service_60_years" value="Remaining Service ( years)" />

                                    <x-input id="remaining_service_60_years" class="block mt-1 w-full" type="number" step="0.01" min="0" name="remaining_service_60_years" :value="old('remaining_service_60_years')" />
                                </div>

                                <div>
                                    <x-label for="ddo_title" value="Title of the DDO" />
                                    <x-input id="ddo_title" class="block mt-1 w-full" type="text" name="ddo_title" :value="old('ddo_title')" />
                                </div>

                                <div>
                                    <x-label for="monthly_salary" value="Monthly Take Home Salary" />
                                    <x-input id="monthly_salary" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_salary" :value="old('monthly_salary')" />
                                </div>

                                <div>
                                    <x-label for="other_monthly_income" value="Other Monthly Income" />
                                    <x-input id="other_monthly_income" class="block mt-1 w-full" type="number" step="0.01" min="0" name="other_monthly_income" :value="old('other_monthly_income')" />
                                </div>

                                <div>
                                    <x-label for="no_of_dependents" value="No. of Dependents" />
                                    <x-input id="no_of_dependents" class="block mt-1 w-full" type="number" min="0" name="no_of_dependents" :value="old('no_of_dependents')" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Save') }}
                                </x-button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cnicInput = document.getElementById('national_id');
            const mobileInput = document.getElementById('phone_number_two');

            const formatCNIC = (value) => {
                return value.replace(/\D/g, '')
                    .replace(/(\d{5})(\d{7})(\d{1})/, '$1-$2-$3')
                    .substr(0, 15); // CNIC format: 00000-0000000-0
            };

            const formatPhoneNumber = (value) => {
                return value.replace(/\D/g, '')
                    .replace(/(\d{4})(\d{7})/, '$1-$2')
                    .substr(0, 12); // Phone format: 0000-0000000
            };

            cnicInput.addEventListener('input', function(e) {
                e.target.value = formatCNIC(e.target.value);
            });

            mobileInput.addEventListener('input', function(e) {
                e.target.value = formatPhoneNumber(e.target.value);
            });

        });
    </script>
</x-app-layout>

