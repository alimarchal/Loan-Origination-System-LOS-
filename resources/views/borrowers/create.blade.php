<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl uppercase underline font-bold text-red-700 text-center leading-tight block">
            Basic Applicant Information
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                            <li class="me-2">
                                <a href="javascript:;" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <!-- resources/views/users/create.blade.php -->
                        <x-validation-errors class="mb-4 mt-4" />
                        <x-status-message class="mb-4" />
                        <form method="POST" action="{{ route('applicant.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="loan_category_id">
                                        Loan Category
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="loan_category_id" id="loan_category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\LoanCategory::orderBy('name')->where('status','active')->get() as $item)
                                            <option value="{{ $item->id }}" {{ old('loan_category_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="loan_sub_category_id">
                                        Loan Sub Category
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="loan_sub_category_id" id="loan_sub_category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="occupation_title">
                                        Occupation
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="occupation_title" id="occupation_title" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="borrower_type">
                                        Applicant Type
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="borrower_type" id="borrower_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">
                                        Name
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="name" type="text" name="name" value="{{ old('name') }}" required="required">
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="relationship_status">
                                        Relation
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="relationship_status" id="relationship_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="parent_spouse_name">
                                        Parent/Spouse
{{--                                        /CEO/Director/Partner/MP--}}
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="parent_spouse_name" type="text" name="parent_spouse_name" value="{{ old('parent_spouse_name') }}" required="required">
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="date_of_birth">
                                        Date of Birth
{{--                                        / Company Formation Date--}}
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="date_of_birth" type="date" max="{{ date('Y-m-d') }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required="required">
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="national_id_cnic">

                                        NTN/CNIC
                                        {{--                                        CEO/Director/--}}
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="national_id_cnic" type="text" name="national_id_cnic" value="{{ old('national_id_cnic') }}" required="required">
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="parent_spouse_national_id_cnic">
                                        Parent/Spouse/CNIC
                                        {{--                                        CEO/Director/--}}
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="parent_spouse_national_id_cnic" type="text" name="parent_spouse_national_id_cnic" value="{{ old('parent_spouse_national_id_cnic') }}" required="required">
                                </div>





                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                                        Email
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" value="{{ old('email') }}" >
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="gender">
                                        Gender
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="gender" id="gender" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>




                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="marital_status">
                                        Marital Status
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="marital_status" id="marital_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="education_qualification">
                                        Education Qualification
                                        <span class="text-red-700">*</span>
                                    </label>

                                    <select name="education_qualification" id="education_qualification" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <!-- Options will be dynamically populated -->
                                    </select>
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="number_of_dependents">
                                        Number of Dependents
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="number_of_dependents" type="number" min="0" name="number_of_dependents" value="{{ old('number_of_dependents',0) }}">
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="phone_number">
                                        Phone Number
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="residence_phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" required="required">
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="mobile_number">
                                        Mobile Number
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="mobile_number" type="text" name="mobile_number" value="{{ old('mobile_number') }}" required="required">
                                </div>




                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="present_address">
                                        Present Address
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="present_address" type="text" name="present_address" value="{{ old('present_address') }}" required="required">
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="permanent_address">
                                        Permanent Address
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="permanent_address" type="text" name="permanent_address" value="{{ old('permanent_address') }}" required="required">
                                </div>



{{--                                <div>--}}
{{--                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="job_title">--}}
{{--                                        Job Title--}}
{{--                                        <span class="text-red-700">*</span>--}}
{{--                                    </label>--}}
{{--                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="job_title" type="text" name="job_title" value="{{ old('job_title') }}" required="required">--}}
{{--                                </div>--}}



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="home_ownership_status">
                                        Current Home Status
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="home_ownership_status" id="home_ownership_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status','Home Status')->get() as $item)
                                            <option value="{{ $item->name }}"  {{ old('home_ownership_status') == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="next_of_kin_name">
                                        Next of Kin
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="next_of_kin_name" type="text" name="next_of_kin_name" value="{{ old('next_of_kin_name') }}" required="required">
                                </div>




                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="next_of_kin_mobile_number">
                                        Mobile # of Next of Kin
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="next_of_kin_mobile_number" type="text" name="next_of_kin_mobile_number" value="{{ old('next_of_kin_mobile_number') }}" required="required">
                                </div>


                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn"> Save Applicant & Next </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
        <script>
            $(document).ready(function() {
                var oldCategoryId = "{{ old('loan_category_id') }}";
                var oldSubCategoryId = "{{ old('loan_sub_category_id') }}";
                var oldOccupationTitleId = "{{ old('occupation_title') }}";
                var oldBorrowerTypeId = "{{ old('borrower_type') }}";
                var oldRelationshipStatus = "{{ old('relationship_status') }}";
                var oldGender = "{{ old('gender') }}";
                var oldMaritalStatus = "{{ old('marital_status') }}";
                var oldEducationQualification = "{{ old('education_qualification') }}";

                function populateSubCategories(categoryId, selectedSubCategoryId = null) {
                    var subCategorySelect = $('#loan_sub_category_id');
                    subCategorySelect.empty().append('<option value="">Select an option</option>');

                    if (categoryId) {
                        $.ajax({
                            url: '/loan-subcategories/' + categoryId,
                            type: 'GET',
                            success: function(response) {
                                $.each(response, function(index, subCategory) {
                                    var selected = selectedSubCategoryId == subCategory.id ? 'selected' : '';
                                    subCategorySelect.append('<option value="' + subCategory.id + '" ' + selected + '>' + subCategory.name + '</option>');
                                });
                                subCategorySelect.trigger('change');
                            }
                        });
                    }
                }

                function populateOccupationTitles(subCategoryId, selectedOccupationTitleId = null) {
                    var occupationTitleSelect = $('#occupation_title');
                    occupationTitleSelect.empty().append('<option value="">Select an option</option>');

                    if (subCategoryId) {
                        $.ajax({
                            url: '/custom-loan-subcategories/' + subCategoryId,
                            type: 'GET',
                            success: function(response) {
                                $.each(response, function(index, occupationTitle) {
                                    var selected = selectedOccupationTitleId == occupationTitle.name ? 'selected' : '';
                                    occupationTitleSelect.append('<option value="' + occupationTitle.name + '" ' + selected + '>' + occupationTitle.name + '</option>');
                                });
                                occupationTitleSelect.trigger('change');
                            }
                        });
                    }
                }

                function populateApplicantStatuses(subCategoryId) {
                    if (subCategoryId) {
                        $.ajax({
                            url: '/applicant-statuses/' + subCategoryId,
                            type: 'GET',
                            success: function(response) {
                                populateSelect('#relationship_status', response.relationship_statuses, oldRelationshipStatus);
                                populateSelect('#gender', response.genders, oldGender);
                                populateSelect('#marital_status', response.marital_statuses, oldMaritalStatus);
                                populateSelect('#education_qualification', response.education_qualification, oldEducationQualification);
                                populateSelect('#borrower_type', response.borrower_type, oldEducationQualification);
                            }
                        });
                    }
                }

                function populateSelect(selectId, options, selectedValue) {
                    var select = $(selectId);
                    select.empty().append('<option value="">Select an option</option>');
                    $.each(options, function(index, option) {
                        var selected = selectedValue == option.name ? 'selected' : '';
                        select.append('<option value="' + option.name + '" ' + selected + '>' + option.name + '</option>');
                    });
                }

                // Initial population of fields if old values exist
                if (oldCategoryId) {
                    $('#loan_category_id').val(oldCategoryId);
                    populateSubCategories(oldCategoryId, oldSubCategoryId);

                    if (oldSubCategoryId) {
                        populateOccupationTitles(oldSubCategoryId, oldOccupationTitleId);
                        populateApplicantStatuses(oldSubCategoryId);
                        if (oldOccupationTitleId) {
                            populateBorrowerTypes(oldOccupationTitleId, oldSubCategoryId, oldBorrowerTypeId);
                        }
                    }
                }

                // Event listeners for dropdown changes
                $('#loan_category_id').change(function() {
                    var categoryId = $(this).val();
                    populateSubCategories(categoryId);
                    $('#occupation_title').empty().append('<option value="">Select an option</option>');
                    $('#borrower_type').empty().append('<option value="">Select an option</option>');
                    $('#relationship_status, #gender, #marital_status').empty().append('<option value="">Select an option</option>');
                });

                $('#loan_sub_category_id').change(function() {
                    var subCategoryId = $(this).val();
                    populateOccupationTitles(subCategoryId);
                    populateApplicantStatuses(subCategoryId);
                    $('#borrower_type').empty().append('<option value="">Select an option</option>');
                });

                $('#occupation_title').change(function() {
                    var occupationTitle = $(this).val();
                    var subCategoryId = $('#loan_sub_category_id').val();
                    populateBorrowerTypes(occupationTitle, subCategoryId);
                });
            });
        </script>
    @endpush
</x-app-layout>
