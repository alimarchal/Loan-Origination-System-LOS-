<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Create Reference
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

                        <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">Reference Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('reference.store', $borrower->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <!-- Form fields for Reference -->
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
                                    <x-label for="ntn" value="NTN" />
                                    <x-input id="ntn" class="block mt-1 w-full" type="text" name="ntn" :value="old('ntn')" />
                                </div>

                                <div>
                                    <x-label for="date_of_birth" value="Date of Birth" />
                                    <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" />
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
                                    <x-label for="phone_number" value="Phone Number" />
                                    <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" />
                                </div>

                                <div>
                                    <x-label for="phone_number_two" value="Phone Number Two" />
                                    <x-input id="phone_number_two" class="block mt-1 w-full" type="text" name="phone_number_two" :value="old('phone_number_two')" />
                                </div>


                                <div>
                                    <x-label for="phone_number_three" value="Phone Number Res." />
                                    <x-input id="phone_number_three" class="block mt-1 w-full" type="text" name="phone_number_three" :value="old('phone_number_three')" />
                                </div>

                                <div>
                                    <x-label for="email" value="Email" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                                </div>

                                <div>
                                    <x-label for="fax" value="Fax" />
                                    <x-input id="fax" class="block mt-1 w-full" type="text" name="fax" :value="old('fax')" />
                                </div>

                                <div>
                                    <x-label for="designation" value="Designation" />
                                    <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" />
                                </div>

                                <div>
                                    <x-label for="relationship_to_borrower" value="Relationship to Borrower" />
                                    <x-input id="relationship_to_borrower" class="block mt-1 w-full" type="text" name="relationship_to_borrower" :value="old('relationship_to_borrower')" />
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
