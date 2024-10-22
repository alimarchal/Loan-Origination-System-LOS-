<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="text-xl uppercase underline font-bold text-red-700 text-center leading-tight block">
            Basic Applicant Information
        </h2>
    </x-slot>




    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('applicant.update', $borrower->id) }}" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

                                <!-- Loan Category -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="loan_category_id">
                                        Loan Category
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="loan_category_id" id="loan_category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\LoanCategory::orderBy('name')->where('status','active')->get() as $item)
                                            <option value="{{ $item->id }}" {{ $borrower->loan_category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Loan Sub Category -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="loan_sub_category_id">
                                        Loan Sub Category
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="loan_sub_category_id" id="loan_sub_category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="occupation_title">
                                        Occupation
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="occupation_title" id="occupation_title" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                    </select>
                                </div>

                                <!-- Applicant Type -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="borrower_type">
                                        Applicant Type
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="borrower_type" id="borrower_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                    </select>
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">
                                        Name
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="name" type="text"
                                           name="name" value="{{ $borrower->name }}" required>
                                </div>

                                <!-- Relation -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="relationship_status">
                                        Relation
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="relationship_status" id="relationship_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="parent_spouse_name">
                                        Parent/Spouse/CEO/Director/Partner/MP
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="parent_spouse_name"
                                           type="text" name="parent_spouse_name" value="{{ $borrower->parent_spouse_name }}" required>
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="date_of_birth">
                                        Date of Birth / Company Formation Date
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="date_of_birth" type="date"
                                           max="{{ date('Y-m-d') }}" name="date_of_birth" value="{{ $borrower->date_of_birth }}" required>
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="national_id_cnic">
                                        CNIC
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="national_id_cnic"
                                           type="text" name="national_id_cnic" value="{{ $borrower->national_id_cnic }}" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="ntn">
                                        NTN
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="ntn"
                                           type="text" name="ntn" value="{{ $borrower->ntn }}">
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="parent_spouse_national_id_cnic">
                                        Parent/Spouse/CEO/Director/CNIC
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="parent_spouse_national_id_cnic"
                                           type="text" name="parent_spouse_national_id_cnic" value="{{ $borrower->parent_spouse_national_id_cnic }}" >
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                                        Email
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="email" type="email"
                                           name="email" value="{{ $borrower->email }}" >
                                </div>



                                <!-- Gender -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="gender">
                                        Gender
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="gender" id="gender" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                    </select>
                                </div>

                                <!-- Marital Status -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="marital_status">
                                        Marital Status
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="marital_status" id="marital_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                    </select>
                                </div>

                                <!-- Education Qualification -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="education_qualification">
                                        Education Qualification
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="education_qualification" id="education_qualification" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                    </select>
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="number_of_dependents">
                                        Number of Dependents
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="number_of_dependents"
                                           type="number" min="0" name="number_of_dependents" value="{{ $borrower->number_of_dependents }}">
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="phone_number">
                                        Phone Number
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="residence_phone_number"
                                           type="text" name="phone_number" value="{{ $borrower->phone_number }}" required>
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="mobile_number">
                                        Mobile Number
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="mobile_number" type="text"
                                           name="mobile_number" value="{{ $borrower->mobile_number }}" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="present_address">
                                        Present Address
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="present_address" type="text"
                                           name="present_address" value="{{ $borrower->present_address }}" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="permanent_address">
                                        Permanent Address
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="permanent_address"
                                           type="text" name="permanent_address" value="{{ $borrower->permanent_address }}" required>
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="home_ownership_status">
                                        Home Ownership Status
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="home_ownership_status" id="home_ownership_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Home Status')->get() as $item)
                                            <option value="{{ $item->name }}" {{ $borrower->home_ownership_status == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="nationality">
                                        Nationality
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="nationality" type="text"
                                           name="nationality" value="{{ $borrower->nationality }}" required>
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="next_of_kin_name">
                                        Next of Kin
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="next_of_kin_name" type="text" name="next_of_kin_name"  value="{{ $borrower->next_of_kin_name }}" required="required">
                                </div>




                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="next_of_kin_mobile_number">
                                        Mobile # of Next of Kin
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="next_of_kin_mobile_number" type="text" name="next_of_kin_mobile_number"  value="{{ $borrower->next_of_kin_mobile_number }}" required="required">
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="relation_with_next_of_kin">
                                        Relation With Next Of Kin
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="relation_with_next_of_kin" type="text" name="relation_with_next_of_kin"  value="{{ $borrower->relation_with_next_of_kin }}" required="required">
                                </div>


                            </div>


                                <div class="flex items-center justify-end mt-4">
                                    @if($borrower->is_authorize == "No")

                                        @can('inputter')
                                            <x-button class="ml-2" id="submit-btn">Update Borrower</x-button>


                                            @php
                                                $checklist = \App\Models\Checklist::where('loan_sub_category_id', $borrower->loan_sub_category->id)->orderBy('sequence_no')->get();
                                                $currentIndex = $checklist->search(fn($item) => request()->routeIs($item->route));
                                                $prevItem = $checklist[$currentIndex - 1] ?? null;
                                                $nextItem = $checklist[$currentIndex + 1] ?? null;
                                            @endphp
                                            @if($prevItem)
                                                <a href="{{ route($prevItem->route, $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">
                                                    Previous
                                                </a>
                                            @endif
                                            @if($nextItem)
                                                <a href="{{ route($nextItem->route, $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">
                                                    Next
                                                </a>
                                            @endif

                                        @endcan


                                    @endif
                                </div>



                        </form>



                        @can('authorizer')

                            <form method="POST" action="{{ route('applicant.authorized', $borrower->id) }}" onsubmit="return confirm('Do you really want to authorized this record?');" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                    <div class="flex mt-4">
                                        <input type="hidden" name="is_authorize" value="Yes">
                                        <button class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2" id="submit-btn">Authorized</button>
                                    </div>
                                </div>
                            </form>
                            <div class="flex items-center justify-end mt-4">

                                    @php
                                        $checklist = \App\Models\Checklist::where('loan_sub_category_id', $borrower->loan_sub_category->id)->orderBy('sequence_no')->get();
                                        $currentIndex = $checklist->search(fn($item) => request()->routeIs($item->route));
                                        $prevItem = $checklist[$currentIndex - 1] ?? null;
                                        $nextItem = $checklist[$currentIndex + 1] ?? null;
                                    @endphp
                                    @if($prevItem)
                                        <a href="{{ route($prevItem->route, $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">
                                            Previous
                                        </a>
                                    @endif
                                    @if($nextItem)
                                        <a href="{{ route($nextItem->route, $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">
                                            Next
                                        </a>
                                    @endif
                            </div>
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


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const cnicInput = document.getElementById('national_id_cnic');
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

        @endpush
</x-app-layout>
