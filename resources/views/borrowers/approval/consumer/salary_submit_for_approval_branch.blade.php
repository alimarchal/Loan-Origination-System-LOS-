<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="text-xl uppercase  font-bold text-red-700 text-center leading-tight block">
            Loan Application Submission
        </h2>
    </x-slot>




    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <x-validation-errors class="mb-4 mt-2" />
                        <form method="POST" action="{{ route('borrower.submit_for_approval', $borrower->id) }}" onsubmit="return confirm('Do you really want to submit this application for approval as per bank policy?');">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">

                                <div class="mt-2">
                                    <x-label for="name" value="{{ __('Name') }}" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="auth()->user()->name" required readonly/>
                                </div>

                                <div class="mt-2">
                                    <x-label for="designation" value="{{ __('Designation') }}" />
                                    <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="auth()->user()->designation" required readonly/>
                                </div>


                                <div class="mt-2">
                                    <x-label for="placement" value="{{ __('Placement') }}" />
                                    <x-input id="placement" class="block mt-1 w-full" type="text" name="placement" :value="auth()->user()->placement" required/>
                                </div>



                                <div class="mt-2">
                                    <x-label for="employee_no" value="{{ __('Employee No') }}" />
                                    <x-input id="employee_no" class="block mt-1 w-full" type="text" name="employee_no" :value="auth()->user()->employee_no" required/>
                                </div>


                                <div class="mt-2">
                                    <x-label for="description" value="{{ __('Remarks') }}" />
                                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                                </div>

                                <div class="mt-2">
                                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>


                            </div>

                            <p class="py-4">
                                This application has been reviewed and meets all necessary criteria outlined in our bank's current policies, guidelines before submitting, and confirming my password for verification. It is recommended to proceed for approval, as per bank policy.
                            </p>
                                <div class="flex items-center justify-end mt-2">
                                    @if($borrower->is_authorize == "No" && $borrower->is_lock == "No")
                                        @can('inputter')
                                            <x-button class="ml-2" id="submit-btn">Submit and recommended to proceed for approval</x-button>
                                        @endcan
                                    @endif
                                </div>
                        </form>



                        @can('authorizer')
                            <form method="POST" action="{{ route('applicant.authorized', $borrower->id) }}" onsubmit="return confirm('Do you really want to authorized this record?');" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-2">
                                    <div class="flex mt-2">
                                        <input type="hidden" name="is_authorize" value="Yes">
                                        <button class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2" id="submit-btn">Authorized</button>
                                    </div>
                                </div>
                            </form>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>
        @push('modals')
            <script>
                $(document).ready(function() {
                    // Store old values for populating fields
                    var oldCategoryId = "{{ old('loan_category_id', $borrower->loan_category_id) }}";
                    var oldSubCategoryId = "{{ old('loan_sub_category_id', $borrower->loan_sub_category_id) }}";
                    var oldOccupationTitleId = "{{ old('occupation_title', $borrower->occupation_title) }}";
                    var oldRelationshipStatus = "{{ old('relationship_status', $borrower->relationship_status) }}";
                    var oldGender = "{{ old('gender', $borrower->gender) }}";
                    var oldMaritalStatus = "{{ old('marital_status', $borrower->marital_status) }}";
                    var oldEducationQualification = "{{ old('education_qualification', $borrower->education_qualification) }}";
                    var oldBorrowerType = "{{ old('borrower_type', $borrower->borrower_type) }}";

                    // Variables to prevent duplicate population
                    var lastPopulatedSubCategory = null;
                    var isPopulating = false;

                    // Debounce function to limit how often a function can fire
                    function debounce(func, wait) {
                        var timeout;
                        return function() {
                            var context = this, args = arguments;
                            clearTimeout(timeout);
                            timeout = setTimeout(function() {
                                func.apply(context, args);
                            }, wait);
                        };
                    }

                    // Populate loan sub-categories based on selected loan category
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

                    // Populate occupation titles based on selected loan sub-category
                    function populateOccupationTitles(subCategoryId, selectedOccupationTitleId = null) {
                        // Prevent duplicate population
                        if (isPopulating || lastPopulatedSubCategory === subCategoryId) return;

                        isPopulating = true;
                        var occupationTitleSelect = $('#occupation_title');
                        occupationTitleSelect.empty().append('<option value="">Select an option</option>');

                        if (subCategoryId) {
                            $.ajax({
                                url: '/custom-loan-subcategories/' + subCategoryId,
                                type: 'GET',
                                success: function(response) {
                                    var addedOptions = new Set();
                                    $.each(response, function(index, occupationTitle) {
                                        if (!addedOptions.has(occupationTitle.name)) {
                                            var selected = selectedOccupationTitleId == occupationTitle.name ? 'selected' : '';
                                            occupationTitleSelect.append('<option value="' + occupationTitle.name + '" ' + selected + '>' + occupationTitle.name + '</option>');
                                            addedOptions.add(occupationTitle.name);
                                        }
                                    });
                                    lastPopulatedSubCategory = subCategoryId;
                                    isPopulating = false;
                                },
                                error: function() {
                                    isPopulating = false;
                                }
                            });
                        } else {
                            isPopulating = false;
                        }
                    }

                    // Populate applicant statuses based on selected loan sub-category
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
                                    populateSelect('#borrower_type', response.borrower_type, oldBorrowerType);
                                }
                            });
                        }
                    }

                    // Helper function to populate select elements
                    function populateSelect(selectId, options, selectedValue) {
                        var select = $(selectId);
                        select.empty().append('<option value="">Select an option</option>');
                        $.each(options, function(index, option) {
                            var selected = selectedValue == option.name ? 'selected' : '';
                            select.append('<option value="' + option.name + '" ' + selected + '>' + option.name + '</option>');
                        });
                    }

                    // Initial population of fields
                    if (oldCategoryId) {
                        $('#loan_category_id').val(oldCategoryId);
                        populateSubCategories(oldCategoryId, oldSubCategoryId);

                        if (oldSubCategoryId) {
                            populateOccupationTitles(oldSubCategoryId, oldOccupationTitleId);
                            populateApplicantStatuses(oldSubCategoryId);
                        }
                    }

                    // Event listener for loan category change
                    $('#loan_category_id').change(function() {
                        var categoryId = $(this).val();
                        populateSubCategories(categoryId);
                        // Reset dependent fields
                        $('#occupation_title, #relationship_status, #gender, #marital_status, #education_qualification, #borrower_type').empty().append('<option value="">Select an option</option>');
                        lastPopulatedSubCategory = null;
                    });

                    // Event listener for loan sub-category change (debounced)
                    $('#loan_sub_category_id').change(debounce(function() {
                        var subCategoryId = $(this).val();
                        populateOccupationTitles(subCategoryId);
                        populateApplicantStatuses(subCategoryId);
                    }, 300));
                });
            </script>
        @endpush
</x-app-layout>