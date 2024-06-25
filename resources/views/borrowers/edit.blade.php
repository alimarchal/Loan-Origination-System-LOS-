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
                        <x-validation-errors class="mb-4 mt-4" />
                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-red-700">APPLICANT INFORMATION</h2>
                        <form method="POST" action="{{ route('applicant.update', $borrower->id) }}" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="loan_category_id">
                                        Loan Category
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="loan_category_id" id="loan_category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\LoanCategory::orderBy('name')->get() as $item)
                                            <option value="{{ $item->id }}" {{ $borrower->loan_category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                        <!-- Populate with sub-categories based on selected category, this may need JavaScript to dynamically update -->
                                    </select>
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="occupation_title">
                                        Occupation
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="occupation_title" id="occupation_title" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status','Occupation Title')->get() as $item)
                                            <option value="{{ $item->name }}" {{ $borrower->occupation_title == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="borrower_type">
                                        Applicant Type
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="borrower_type" id="borrower_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Business Type')->get() as $item)
                                            <option value="{{ $item->name }}" {{ $borrower->borrower_type == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
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

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="relationship_status">
                                        Relation
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="relationship_status" id="relationship_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Relationship')->get() as $item)
                                            <option value="{{ $item->name }}" {{ $borrower->relationship_status == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
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
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="gender">
                                        Gender
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="gender" id="gender" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Gender')->get() as $item)
                                            <option value="{{ $item->name }}" {{ $borrower->gender == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="marital_status">
                                        Marital Status
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="marital_status" id="marital_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Marital Status')->get() as $item)
                                            <option value="{{ $item->name }}" {{ $borrower->marital_status == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="education_qualification">
                                        Education Qualification
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <select name="education_qualification" id="education_qualification" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Education Qualification')->get() as $item)
                                            <option value="{{ $item->name }}" {{ $borrower->education_qualification == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
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
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="national_id_cnic">
                                        NTN / CNIC
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="national_id_cnic"
                                           type="text" name="national_id_cnic" value="{{ $borrower->national_id_cnic }}" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="parent_spouse_national_id_cnic">
                                        Parent/Spouse/CEO/Director/CNIC
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="parent_spouse_national_id_cnic"
                                           type="text" name="parent_spouse_national_id_cnic" value="{{ $borrower->parent_spouse_national_id_cnic }}" required>
                                </div>



                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                                        Email
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="email" type="email"
                                           name="email" value="{{ $borrower->email }}" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="fax">
                                        Fax
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="fax" type="text" name="fax"
                                           value="{{ $borrower->fax }}" required>
                                </div>

{{--                                <div>--}}
{{--                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="nature_of_business">--}}
{{--                                        Nature of Business--}}
{{--                                        <span class="text-red-700">*</span>--}}
{{--                                    </label>--}}
{{--                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="nature_of_business"--}}
{{--                                           type="text" name="nature_of_business" value="{{ $borrower->nature_of_business }}" required>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="details_of_payment_schedule_if_sought">--}}
{{--                                        Details Of Payment Schedule If Sought--}}
{{--                                        <span class="text-red-700">*</span>--}}
{{--                                    </label>--}}
{{--                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="details_of_payment_schedule_if_sought"--}}
{{--                                           type="text" name="details_of_payment_schedule_if_sought" value="{{ $borrower->details_of_payment_schedule_if_sought }}" required>--}}
{{--                                </div>--}}

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="residence_phone_number">
                                        Residence Phone Number
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="residence_phone_number"
                                           type="text" name="residence_phone_number" value="{{ $borrower->residence_phone_number }}" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="office_phone_number">
                                        Office Phone Number
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="office_phone_number"
                                           type="text" name="office_phone_number" value="{{ $borrower->office_phone_number }}" required>
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


                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-2" id="submit-btn">Update Borrower</x-button>

                                @if($borrower->occupation_title == "Government" || $borrower->occupation_title == "Semi Government" || $borrower->occupation_title == "Autonomous Body")
                                    <a href="{{ route('applicant.employment-information.edit', $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">Next</a>
                                @elseif($borrower->occupation_title == "Business Men" || $borrower->occupation_title == "Self Employed" || $borrower->occupation_title == "Professional")
                                    <a href="{{ route('applicant.employment-information.edit', $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">Next</a>
                                @endif

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
                var oldCategoryId = "{{ old('loan_category_id', $borrower->loan_category_id) }}";
                var oldSubCategoryId = "{{ old('loan_sub_category_id', $borrower->loan_sub_category_id) }}";

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
                            }
                        });
                    }
                }

                if (oldCategoryId) {
                    $('#loan_category_id').val(oldCategoryId);
                    populateSubCategories(oldCategoryId, oldSubCategoryId);
                }

                $('#loan_category_id').change(function() {
                    var categoryId = $(this).val();
                    populateSubCategories(categoryId);
                });
            });
        </script>
    @endpush
</x-app-layout>