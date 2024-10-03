<x-app-layout>
    @push('header')
        <link rel="stylesheet" href="{{ url('jsandcss/daterangepicker.min.css') }}">
        <script src="{{ url('jsandcss/moment.min.js') }}"></script>
        <script src="{{ url('jsandcss/knockout-3.5.1.js') }}" defer></script>
        <script src="{{ url('jsandcss/daterangepicker.min.js') }}" defer></script>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
        </h2>
        <div class="flex justify-center items-center float-right">
            <div class="flex justify-center items-center float-right print:hidden">


                <button id="toggle" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"
                        />
                    </svg>

                </button>

                <button onclick="window.print()" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2"
                        title="Members List">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                </button>



{{--                <a href="#" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />--}}
{{--                    </svg>--}}
{{--                </a>--}}
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4 mt-6 shadow-lg rounded-lg" style="display: none" id="filters">
        <form action="{{ route('applicant.index') }}" method="GET" class="mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label for="filter[name]" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="filter[name]" id="filter[name]" value="{{ request('filter.name') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="filter[national_id_cnic]" class="block text-sm font-medium text-gray-700">CNIC</label>
                    <input type="text" name="filter[national_id_cnic]" id="filter[national_id_cnic]" value="{{ request('filter.national_id_cnic') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="filter[email]" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="filter[email]" id="filter[email]" value="{{ request('filter.email') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="filter[mobile_number]" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                    <input type="text" name="filter[mobile_number]" id="filter[mobile_number]" value="{{ request('filter.mobile_number') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

{{--                <div>--}}
{{--                    <label for="filter[region_id]" class="block text-sm font-medium text-gray-700">Region</label>--}}
{{--                    <select name="filter[region_id]" id="filter[region_id]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">--}}
{{--                        <option value="">Select Region</option>--}}
{{--                        @foreach($regions as $region)--}}
{{--                            <option value="{{ $region->id }}" {{ request('filter.region_id') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div>--}}
{{--                    <label for="filter[branch_id]" class="block text-sm font-medium text-gray-700">Branch</label>--}}
{{--                    <select name="filter[branch_id]" id="filter[branch_id]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">--}}
{{--                        <option value="">Select Branch</option>--}}
{{--                        @foreach($branches as $branch)--}}
{{--                            <option value="{{ $branch->id }}" {{ request('filter.branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div>--}}
{{--                    <label for="filter[loan_category_id]" class="block text-sm font-medium text-gray-700">Loan Category</label>--}}
{{--                    <select name="filter[loan_category_id]" id="filter[loan_category_id]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">--}}
{{--                        <option value="">Select Loan Category</option>--}}
{{--                        @foreach($loanCategories as $category)--}}
{{--                            <option value="{{ $category->id }}" {{ request('filter.loan_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

                <div>
                    <label for="filter[date_registered_between]" class="block text-sm font-medium text-gray-700">Date Registered</label>
                    <input type="text" name="filter[date_registered_between]" id="filter[date_registered_between]" value="{{ request('filter.date_registered_between') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md datepicker">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Apply Filters
                </button>
                <a href="{{ route('applicant.index') }}" class="ml-2 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Clear Filters
                </a>
            </div>
        </form>
    </div>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl print:shadow-none sm:rounded-lg">
                <x-status-message class="ml-4 mt-4" />
                <x-validation-errors class="ml-4 mt-4" />

                @if($sanction_advices->isNotEmpty())
                    <div class="relative overflow-x-auto rounded-lg ">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-white bg-bank-green uppercase print:border-b print:border-black  text-sm print:text-black">
                                <th class="py-2 px-2 text-center">#</th>
                                <th class="py-2 px-2 text-left">BR Code</th>
                                <th class="py-2 px-2 text-left">Name</th>
                                <th class="py-2 px-2 text-center">CNIC/NTN</th>
                                <th class="py-2 px-2 text-center">Loan Category</th>
                                <th class="py-2 px-2 text-center">Amount</th>
                                <th class="py-2 px-2 text-center">Status</th>
                                <th class="py-2 px-2 text-center print:hidden">Action</th>
                            </tr>
                            </thead>
                            @foreach ($sanction_advices as $sa)
                                <tbody class="text-black text-md leading-normal font-extrabold">
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-1 px-2 text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="py-1 px-2 text-center">
                                        {{ $sa->borrower->branch->code }}
                                    </td>

                                    <td class="py-1 px-2 text-left">
                                        {{ $sa->borrower->gender == 'Male' ? 'Mr.' : ($sa->borrower->gender == 'Female' ? 'Ms.' : 'M/s.') }}{{ $sa->borrower->name }}
                                    </td>

                                    <td class="py-1 px-2 text-center">
                                        {{ $sa->borrower->national_id_cnic }}
                                    </td>

                                    <td class="py-1 px-2 text-center">
                                        {{ $sa->borrower->loan_sub_category->name }}
                                    </td>


                                    <td class="py-1 px-2 text-center">
                                        {{ $sa->borrower->applicant_requested_loan_information->requested_amount }}
                                    </td>


                                    <td class="py-1 px-2 text-center ">
                                        @if($sa->is_lock == "Yes")
                                            Draft
                                        @else
                                            Finalized
                                        @endif

                                    </td>

                                    <td class="py-1 px-2 text-center print:hidden">

                                        @if($sa->is_lock == "Yes")
                                            <a href="{{ route('sanction-advice.edit', [$sa->id, $sa->borrower_id ]) }}" class="inline-flex items-center ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                                                </svg>
                                            </a>
                                        @else

                                        @endif





{{--                                        <a href="{{ route('sanction-advice.edit', $sa->sanction_advice?->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 disabled:opacity-50 transition ease-in-out duration-150">--}}
{{--                                            Edit--}}
{{--                                        </a>--}}
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('modals')
        <script>
            $(document).ready(function () {

                $("#date_range").daterangepicker({
                    minDate: moment().subtract(10, 'years'),
                    orientation: 'left',
                    callback: function (startDate, endDate, period) {
                        $(this).val(startDate.format('L') + ' – ' + endDate.format('L'));
                    }
                });
            });


            const targetDiv = document.getElementById("filters");
            const btn = document.getElementById("toggle");
            btn.onclick = function () {
                if (targetDiv.style.display !== "none") {
                    targetDiv.style.display = "none";

                } else {
                    targetDiv.style.display = "block";
                    // btn.innerHTML = "Hide";
                }
            };

            function redirectToLink(url) {
                window.location.href = url;
            }

            document.addEventListener('DOMContentLoaded', function () {
                const cnicInput = document.getElementById('cnic');
                const mobileInput = document.getElementById('mobile_no');
                const guardianContactInput = document.getElementById('guardian_emergency_contact');
                const smsAlertInput = document.getElementById('mobile_number_for_sms_alert');

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

                cnicInput.addEventListener('input', function (e) {
                    e.target.value = formatCNIC(e.target.value);
                });

                mobileInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });

                guardianContactInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });

                smsAlertInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });
            });
        </script>
    @endpush
</x-app-layout>
