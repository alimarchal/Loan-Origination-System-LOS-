<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">

        <h2 class="text-xl uppercase underline font-bold text-red-700 text-center leading-tight block">
            Reference Information
        </h2>
{{--        @include('back-navigation')--}}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')

                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('reference.update', [$borrower->id, $reference->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <!-- Form fields for Reference -->
                                <div>
                                    <x-label for="name" value="Name" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $reference->name)" />
                                </div>

                                <div>
                                    <x-label for="relationship_to_borrower" value="Relation" />
                                    <select name="relationship_to_borrower" id="relationship_to_borrower" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::orderBy('status')->where('status','relationship_to_borrower')->where('loan_sub_category_id',$borrower->loan_sub_category_id)->get() as $item)
                                            <option value="{{ $item->id }}" {{ old('relationship_to_borrower', $reference->relationship_to_borrower) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="father_husband" value="Father/Husband Name" />
                                    <x-input id="father_husband" class="block mt-1 w-full" type="text" name="father_husband" :value="old('father_husband', $reference->father_husband)" />
                                </div>

                                <div>
                                    <x-label for="national_id" value="National ID / CNIC" />
                                    <x-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" :value="old('national_id', $reference->national_id)" />
                                </div>

                                <div>
                                    <x-label for="ntn" value="NTN" />
                                    <x-input id="ntn" class="block mt-1 w-full" type="text" name="ntn" :value="old('ntn', $reference->ntn)" />
                                </div>

                                <div>
                                    <x-label for="date_of_birth" value="Date of Birth" />
                                    <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth', $reference->date_of_birth)" />
                                </div>

                                <div>
                                    <x-label for="present_address" value="Present Address" />
                                    <x-input id="present_address" class="block mt-1 w-full" type="text" name="present_address" :value="old('present_address', $reference->present_address)" />
                                </div>

                                <div>
                                    <x-label for="permanent_address" value="Permanent Address" />
                                    <x-input id="permanent_address" class="block mt-1 w-full" type="text" name="permanent_address" :value="old('permanent_address', $reference->permanent_address)" />
                                </div>

                                <div>
                                    <x-label for="phone_number" value="Phone Number" />
                                    <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number', $reference->phone_number)" />
                                </div>

                                <div>
                                    <x-label for="mobile_number" value="Mobile Number" />
                                    <x-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" :value="old('mobile_number', $reference->mobile_number)" />
                                </div>

                                <div>
                                    <x-label for="email" value="Email" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $reference->email)" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">Update</x-button>
                            </div>
                        </form>

                        <a href="{{ route('reference.index', $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</x-app-layout>
