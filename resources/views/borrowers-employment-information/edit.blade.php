<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Employment Information
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
                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-red-700">Employment Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        @if(empty($borrower->employment_information))
                            <form method="POST" action="{{ route('applicant.employment-information.store', $borrower->id) }}" enctype="multipart/form-data">
                                @csrf
                        @else
                            <form method="POST" action="{{ route('applicant.employment-information.update',  [$borrower->id, $borrower->employment_information?->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

                                <div>
                                    <x-label for="legal_status" value="Employer Legal Status"/>
                                    <select name="legal_status" id="legal_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Employer Legal Status')->get() as $item)
                                            <option value="{{ $item->name }}" {{ old('employment_status', $borrower->employment_information?->legal_status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div>
                                    <x-label for="employment_status" value="Employment Status"/>
                                    <select name="employment_status" id="employment_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>

                                        @if($borrower->loan_sub_category->name == "Advance Salary" &&  $borrower->occupation_title == "Government")
                                            @foreach(\App\Models\Status::where('status', 'Employment Status')->get() as $item)
                                                @if($item->name == "Permanent")
                                                    <option value="{{ $item->name }}" {{ old('employment_status', $borrower->employment_information?->employment_status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach(\App\Models\Status::where('status', 'Employment Status')->get() as $item)
                                                <option value="{{ $item->name }}" {{ old('employment_status', $borrower->employment_information?->employment_status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        @endif


                                    </select>

                                </div>

                                <div>
                                    <x-label for="employer_name" value="Employer Name"/>
                                    <x-input id="employer_name" class="block mt-1 w-full" type="text" name="employer_name" :value="old('employer_name', $borrower->employment_information?->employer_name)"/>
                                </div>


                                <div>
                                    <x-label for="department" value="Department Name"/>
                                    <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department', $borrower->employment_information?->department)"/>
                                </div>


                                <div>
                                    <x-label for="job_title_designation" value="Job Title / Designation"/>
                                    <x-input id="job_title_designation" class="block mt-1 w-full" type="text" name="job_title_designation" :value="old('job_title_designation', $borrower->employment_information?->job_title_designation)"/>
                                </div>

                                <div>
                                    <x-label for="personal_number" value="Personal Number (PP No)"/>
                                    <x-input id="personal_number" class="block mt-1 w-full" type="text" name="personal_number" :value="old('personal_number', $borrower->employment_information?->personal_number)"/>
                                </div>



                                @if($borrower->loan_sub_category->name == "Advance Salary")
                                    <div>
                                        <x-label for="grade" value="Grade"/>
                                        <select name="grade" id="grade" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                            <option value="">Select an option</option>
                                            @for($i = 1; $i <= 22; $i++)
                                                <option value="{{$i}}" {{ old('grade', $borrower->employment_information?->grade) == $i ? 'selected' : '' }}>BPS-{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                @else
                                    <div>
                                        <x-label for="grade" value="Grade"/>
                                        <x-input id="grade" class="block mt-1 w-full" type="text" name="grade" :value="old('grade', $borrower->employment_information?->grade)"/>
                                    </div>
                                @endif




                                <div>
                                    <x-label for="official_address" value="Official Address"/>
                                    <x-input id="official_address" class="block mt-1 w-full" type="text" name="official_address" :value="old('official_address', $borrower->employment_information?->official_address)"/>
                                </div>

                                <div>
                                    <x-label for="monthly_gross_salary" value="Monthly Gross Salary"/>
                                    <x-input id="monthly_gross_salary" class="block mt-1 w-full" type="number" step="0.01" name="monthly_gross_salary" :value="old('monthly_gross_salary', $borrower->employment_information?->monthly_gross_salary)"/>
                                </div>

                                <div>
                                    <x-label for="monthly_net_salary" value="Monthly Net / Take Home Salary"/>
                                    <x-input id="monthly_net_salary" class="block mt-1 w-full" type="number" step="0.01" name="monthly_net_salary" :value="old('monthly_net_salary', $borrower->employment_information?->monthly_net_salary)"/>
                                </div>

                                <div>
                                    <x-label for="service_length" value="Service Length"/>
                                    <x-input id="service_length" class="block mt-1 w-full" type="text" name="service_length" :value="old('service_length', $borrower->employment_information?->service_length)"/>
                                </div>



                                <div>
                                    <x-label for="remaining_service_years" value="Remaining Service Years"/>
                                    <x-input id="remaining_service_years" class="block mt-1 w-full" type="number" step="0.01" name="remaining_service_years" :value="old('remaining_service_years', $borrower->employment_information?->remaining_service_years)"/>
                                </div>


                                <div>
                                    <x-label for="office_mobile_number" value="Office Mobile Number"/>
                                    <x-input id="office_mobile_number" class="block mt-1 w-full" type="text" name="office_mobile_number" :value="old('office_mobile_number', $borrower->employment_information?->office_mobile_number)"/>
                                </div>

                                <div>
                                    <x-label for="office_phone_number" value="Office Phone Number"/>
                                    <x-input id="office_phone_number" class="block mt-1 w-full" type="text" name="office_phone_number" :value="old('office_phone_number', $borrower->employment_information?->office_phone_number)"/>
                                </div>



                                <div>
                                    <x-label for="service_status" value="Service Status"/>
                                    <select name="service_status" id="service_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Service Status')->get() as $item)
                                            <option value="{{ $item->name }}" {{ old('service_status', $borrower->employment_information?->service_status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="mode_of_salary_receipt" value="Mode Of Salary Receipt"/>
                                    <select name="mode_of_salary_receipt" id="mode_of_salary_receipt" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Salary Mode')->get() as $item)
                                            <option value="{{ $item->name }}" {{ old('mode_of_salary_receipt', $borrower->employment_information?->mode_of_salary_receipt) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div>
                                    <x-label for="salary_disbursement_office_name" value="Salary Disbursement Office Name"/>
                                    <x-input id="salary_disbursement_office_name" class="block mt-1 w-full" type="text" name="salary_disbursement_office_name" :value="old('salary_disbursement_office_name', $borrower->employment_information?->salary_disbursement_office_name)"/>
                                </div>

                                <div>
                                    <x-label for="contact_person_for_disbursement" value="Name Contact Person / DDO"/>
                                    <x-input id="contact_person_for_disbursement" class="block mt-1 w-full" type="text" name="contact_person_for_disbursement" :value="old('contact_person_for_disbursement', $borrower->employment_information?->contact_person_for_disbursement)"/>
                                </div>

                                <div>
                                    <x-label for="other_sources_of_income" value="Other Sources Of Income"/>
                                    <x-input id="other_sources_of_income" class="block mt-1 w-full" type="text" name="other_sources_of_income" :value="old('other_sources_of_income', $borrower->employment_information?->other_sources_of_income)"/>
                                </div>

                            </div>
                            <div class="flex items-center justify-end mt-4">
                                @if(empty($borrower->employment_information))
                                    <x-button class="ml-4" id="submit-btn">Save Employment Information</x-button>
                                @else
                                    <x-button class="ml-4" id="submit-btn">Update Employment Information</x-button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>