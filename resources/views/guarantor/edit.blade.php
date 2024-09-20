<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Edit Guarantor
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
                        <form method="POST" action="{{ route('guarantor.update', [$borrower->id, $guarantor->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <!-- Form fields for Guarantor -->
                                <div>
                                    <x-label for="guarantor_type" value="Guarantor Type" />
                                    <select name="guarantor_type" id="guarantor_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="Individual" {{ old('guarantor_type', $guarantor->guarantor_type) == 'Individual' ? 'selected' : '' }}>Individual</option>
                                        <option value="Business" {{ old('guarantor_type', $guarantor->guarantor_type) == 'Business' ? 'selected' : '' }}>Business</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="title" value="Title" />
                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $guarantor->title)" />
                                </div>

                                <div>
                                    <x-label for="name" value="Name" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $guarantor->name)" />
                                </div>

                                <div>
                                    <x-label for="father_husband" value="Father/Husband Name" />
                                    <x-input id="father_husband" class="block mt-1 w-full" type="text" name="father_husband" :value="old('father_husband', $guarantor->father_husband)" />
                                </div>

                                <div>
                                    <x-label for="national_id" value="National ID" />
                                    <x-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" :value="old('national_id', $guarantor->national_id)" />
                                </div>

                                <div>
                                    <x-label for="phone_number" value="Phone Number" />
                                    <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number', $guarantor->phone_number)" />
                                </div>

                                <div>
                                    <x-label for="phone_number_two" value="Phone Number Two" />
                                    <x-input id="phone_number_two" class="block mt-1 w-full" type="text" name="phone_number_two" :value="old('phone_number_two', $guarantor->phone_number_two)" />
                                </div>

                                <div>
                                    <x-label for="email" value="Email" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $guarantor->email)" />
                                </div>

                                <div>
                                    <x-label for="present_address" value="Present Address" />
                                    <x-input id="present_address" class="block mt-1 w-full" type="text" name="present_address" :value="old('present_address', $guarantor->present_address)" />
                                </div>

                                <div>
                                    <x-label for="permanent_address" value="Permanent Address" />
                                    <x-input id="permanent_address" class="block mt-1 w-full" type="text" name="permanent_address" :value="old('permanent_address', $guarantor->permanent_address)" />
                                </div>

                                <div>
                                    <x-label for="department" value="Department" />
                                    <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department', $guarantor->department)" />
                                </div>

                                <div>
                                    <x-label for="designation" value="Designation" />
                                    <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation', $guarantor->designation)" />
                                </div>

                                <div>
                                    <x-label for="employer_name" value="Employer Name" />
                                    <x-input id="employer_name" class="block mt-1 w-full" type="text" name="employer_name" :value="old('employer_name', $guarantor->employer_name)" />
                                </div>

                                <div>
                                    <x-label for="employee_personal_number" value="Employee Personal Number" />
                                    <x-input id="employee_personal_number" class="block mt-1 w-full" type="text" name="employee_personal_number" :value="old('employee_personal_number', $guarantor->employee_personal_number)" />
                                </div>

                                <div>
                                    <x-label for="employment_status" value="Employment Status" />
                                    <x-input id="employment_status" class="block mt-1 w-full" type="text" name="employment_status" :value="old('employment_status', $guarantor->employment_status)" />
                                </div>

                                <div>
                                    <x-label for="monthly_gross_salary" value="Monthly Gross Salary" />
                                    <x-input id="monthly_gross_salary" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_gross_salary" :value="old('monthly_gross_salary', $guarantor->monthly_gross_salary)" />
                                </div>

                                <div>
                                    <x-label for="date_of_retirement" value="Date of Retirement" />
                                    <x-input id="date_of_retirement" class="block mt-1 w-full" type="date" name="date_of_retirement" :value="old('date_of_retirement', $guarantor->date_of_retirement)" />
                                </div>

                                <div>
                                    <x-label for="relationship_to_borrower" value="Relationship to Borrower" />
                                    <x-input id="relationship_to_borrower" class="block mt-1 w-full" type="text" name="relationship_to_borrower" :value="old('relationship_to_borrower', $guarantor->relationship_to_borrower)" />
                                </div>


                                <div>
                                    <x-label for="dob" value="Date of Birth" />
                                    <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob', $guarantor->dob)" />
                                </div>

                                <div>
                                    <x-label for="ntn" value="NTN" />
                                    <x-input id="ntn" class="block mt-1 w-full" type="text" name="ntn" :value="old('ntn', $guarantor->ntn)" />
                                </div>


                                <div>
                                    <x-label for="nature_of_business" value="Nature of Business" />
                                    <x-input id="nature_of_business" class="block mt-1 w-full" type="text" name="nature_of_business" :value="old('nature_of_business', $guarantor->nature_of_business)" />
                                </div>


                                <div>
                                    <x-label for="title_of_business" value="Title of Business" />
                                    <x-input id="title_of_business" class="block mt-1 w-full" type="text" name="title_of_business" :value="old('title_of_business', $guarantor->title_of_business)" />
                                </div>


                                <div>
                                    <x-label for="major_business_activities" value="Major Business Activities" />
                                    <x-input id="major_business_activities" class="block mt-1 w-full" type="text" name="major_business_activities" :value="old('major_business_activities', $guarantor->major_business_activities)" />
                                </div>


                                <div>
                                    <x-label for="exact_location_of_business_place" value="Exact Location of Business Place" />
                                    <x-input id="exact_location_of_business_place" class="block mt-1 w-full" type="text" name="exact_location_of_business_place" :value="old('exact_location_of_business_place', $guarantor->exact_location_of_business_place)" />
                                </div>


                                <div>
                                    <x-label for="business_bank_account_maintained" value="Business Bank Account Maintained" />
                                    <x-input id="business_bank_account_maintained" class="block mt-1 w-full" type="text" name="business_bank_account_maintained" :value="old('business_bank_account_maintained', $guarantor->business_bank_account_maintained)" />
                                </div>


                                <div>
                                    <x-label for="statement_of_account_attachment_one" value="Statement of Account Attachment" />
                                    <x-input id="statement_of_account_attachment_one" class="block mt-1 w-full" type="file" name="statement_of_account_attachment_one" :value="old('statement_of_account_attachment_one', $guarantor->statement_of_account_attachment)" />
                                </div>



                                <div>
                                    <x-label for="net_worth" value="Net Worth" />
                                    <x-input id="net_worth" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_worth" :value="old('net_worth', $guarantor->net_worth)" />
                                </div>

                                <div>
                                    <x-label for="business_registration_number" value="Business Registration Number" />
                                    <x-input id="business_registration_number" class="block mt-1 w-full" type="text" name="business_registration_number" :value="old('business_registration_number', $guarantor->business_registration_number)" />
                                </div>

                                <div>
                                    <x-label for="annual_revenue" value="Annual Revenue" />
                                    <x-input id="annual_revenue" class="block mt-1 w-full" type="number" step="0.01" min="0" name="annual_revenue" :value="old('annual_revenue', $guarantor->annual_revenue)" />
                                </div>

                                <div>
                                    <x-label for="annual_expenses" value="Annual Expenses" />
                                    <x-input id="annual_expenses" class="block mt-1 w-full" type="number" step="0.01" min="0" name="annual_expenses" :value="old('annual_expenses', $guarantor->annual_expenses)" />
                                </div>

                                <div>
                                    <x-label for="net_annual_income" value="Net Annual Income" />
                                    <x-input id="net_annual_income" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_annual_income" :value="old('net_annual_income', $guarantor->net_annual_income)" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">Update Guarantor Information</x-button>
                            </div>
                        </form>

                        <a href="{{ route('guarantor.index', $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                            Back
                        </a>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const cnicInput = document.getElementById('national_id');
                                const mobileInput = document.getElementById('mobile_number');

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
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
