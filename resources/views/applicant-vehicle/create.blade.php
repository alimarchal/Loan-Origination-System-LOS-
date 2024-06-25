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

                        <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">Applicant Vehicle Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                            <form method="POST" action="{{ route('applicant.vehicle.store',  [$borrower->id, $borrower->applicant_requested_loan_information?->id]) }}" enctype="multipart/form-data">
                                @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">


                                <div>
                                    <x-label for="vehicle_type" value="Vehicle Type" />
                                    <select name="vehicle_type" id="vehicle_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="New" {{ old('vehicle_type') == 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Used" {{ old('vehicle_type') == 'Used' ? 'selected' : '' }}>Used</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="model_year" value="Model Year" />
                                    <x-input id="model_year" class="block mt-1 w-full" type="text" name="model_year" :value="old('model_year')" />
                                </div>

                                <div>
                                    <x-label for="year_of_manufacturing" value="Year of Manufacturing" />
                                    <x-input id="year_of_manufacturing" class="block mt-1 w-full" type="text" name="year_of_manufacturing" :value="old('year_of_manufacturing')" />
                                </div>

                                <div>
                                    <x-label for="cost_of_vehicle" value="Cost of Vehicle" />
                                    <x-input id="cost_of_vehicle" class="block mt-1 w-full" type="number" step="0.01" name="cost_of_vehicle" :value="old('cost_of_vehicle')" />
                                </div>

                                <div>
                                    <x-label for="make" value="Make" />
                                    <x-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make')" />
                                </div>

                                <div>
                                    <x-label for="model" value="Model" />
                                    <x-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" />
                                </div>

                                <div>
                                    <x-label for="price_of_vehicle" value="Price of Vehicle" />
                                    <x-input id="price_of_vehicle" class="block mt-1 w-full" type="number" step="0.01" name="price_of_vehicle" :value="old('price_of_vehicle')" />
                                </div>

                                <div>
                                    <x-label for="equity_dawn_payment" value="Equity Down Payment" />
                                    <x-input id="equity_dawn_payment" class="block mt-1 w-full" type="number" step="0.01" name="equity_dawn_payment" :value="old('equity_dawn_payment')" />
                                </div>


                                <div>
                                    <x-label for="name_authorized_dealer_seller" value="Name of Authorized Dealer/Seller" />
                                    <x-input id="name_authorized_dealer_seller" class="block mt-1 w-full" type="text" name="name_authorized_dealer_seller" :value="old('name_authorized_dealer_seller')" />
                                </div>

                                <div>
                                    <x-label for="repayment_mode" value="Repayment Mode" />
                                    <x-input id="repayment_mode" class="block mt-1 w-full" type="text" name="repayment_mode" :value="old('repayment_mode')" />
                                </div>

                                <div>
                                    <x-label for="tenure_in_years" value="Tenure in Years" />
                                    <select name="tenure_in_years" id="tenure_in_years" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @for($i = 0; $i <= 20; $i++)
                                            <option value="{{$i}}" {{ old('tenure_in_years') == $i ? 'selected' : '' }}>{{$i}} Years</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <x-label for="tenure_in_month" value="Tenure in Months" />
                                    <select name="tenure_in_month" id="tenure_in_month" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @for($i = 0; $i <= 11; $i++)
                                            <option value="{{$i}}" {{ old('tenure_in_months') == $i ? 'selected' : '' }}>{{$i}} Months</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <x-label for="markup_rate_type" value="Markup Rate Type" />
                                    <x-input id="markup_rate_type" class="block mt-1 w-full" type="text" name="markup_rate_type" :value="old('markup_rate_type')" />
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