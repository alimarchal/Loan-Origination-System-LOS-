<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
{{--        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">--}}
{{--            Employment Information--}}
{{--        </h2>--}}
{{--        @include('back-navigation')--}}


        <h2 class="text-xl uppercase underline font-bold text-red-700 text-center leading-tight block">
            Employment Information
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
{{--                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-red-700">Employment Information</h2>--}}
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
                                    <select name="legal_status" id="legal_status" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'employer_legal_status')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                            <option value="{{ $item->name }}" {{ old('employment_status', $borrower->employment_information?->legal_status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div>
                                    <x-label for="employment_status" value="Employment Status"/>
                                    <select name="employment_status" id="employment_status" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>

                                        @foreach(\App\Models\Status::where('status', 'employment_status')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                            <option value="{{ $item->name }}" {{ old('employment_status', $borrower->employment_information?->employment_status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach


                                    </select>

                                </div>

                                <div>
                                    <x-label for="service_status" value="Service Status"/>
                                    <select name="service_status" id="service_status" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Service Status')->get() as $item)
                                            <option value="{{ $item->name }}" {{ old('service_status', $borrower->employment_information?->service_status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if(!in_array($borrower->loan_sub_category->name, ["Advance Salary"]))
                                    <div>
                                        <x-label for="employer_name" value="Employer Name"/>
                                        <x-input id="employer_name" class="block mt-1 w-full" type="text" name="employer_name" :value="old('employer_name', $borrower->employment_information?->employer_name)"/>
                                    </div>
                                @endif


                                <div>
                                    <x-label for="department" value="Department Name"/>
                                    <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department', $borrower->employment_information?->department)"/>
                                </div>


                                <div>
                                    <x-label for="job_title_designation" value="Job Title / Designation"/>
                                    <x-input id="job_title_designation" class="block mt-1 w-full" type="text" name="job_title_designation" :value="old('job_title_designation', $borrower->employment_information?->job_title_designation)"/>
                                </div>

                                <div>
                                    <x-label for="personal_number" value="Personnel Number (PP No)"/>
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
                                    <x-label for="official_address" value="Office Address"/>
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
                                    <x-label for="service_length_in_years" value="Service Length in Years" />
                                    <select name="service_length_in_years" id="service_length_in_years" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @for($i = 0; $i <= 40; $i++)
                                            <option value="{{$i}}" {{ old('service_length_in_years', $borrower->employment_information?->service_length_in_years) == $i ? 'selected' : '' }}>{{$i}} Years</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <x-label for="service_length_in_months" value="Service Length in Months" />
                                    <select name="service_length_in_months" id="service_length_in_months" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @for($i = 0; $i <= 11; $i++)
                                            <option value="{{$i}}" {{ old('service_length_in_months', $borrower->employment_information?->service_length_in_months) == $i ? 'selected' : '' }}>{{$i}} Months</option>
                                        @endfor
                                    </select>
                                </div>


                                <div>
                                    <x-label for="remaining_service_years" value="Remaining Service in Years" />
                                    <select name="remaining_service_years" id="remaining_service_years" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @for($i = 0; $i <= 40; $i++)
                                            <option value="{{$i}}" {{ old('remaining_service_years', $borrower->employment_information?->remaining_service_years) == $i ? 'selected' : '' }}>{{$i}} Years</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <x-label for="remaining_service_months" value="Remaining Service in Months" />
                                    <select name="remaining_service_months" id="remaining_service_months" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @for($i = 0; $i <= 11; $i++)
                                            <option value="{{$i}}" {{ old('remaining_service_months', $borrower->employment_information?->remaining_service_months) == $i ? 'selected' : '' }}>{{$i}} Months</option>
                                        @endfor
                                    </select>
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
                                    <x-label for="mode_of_salary_receipt" value="Mode Of Salary Receipt"/>
                                    <select name="mode_of_salary_receipt" id="mode_of_salary_receipt" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'mode_of_salary_receipt')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
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

                            <form method="POST" action="{{ route('applicant.employment-information.authorized', [$borrower->id, $borrower->employment_information?->id] ) }}" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                    <div class="flex mt-4">
                                        <input type="hidden" name="is_authorize" value="Yes">
                                        <button class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2" id="submit-btn">Authorized</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>