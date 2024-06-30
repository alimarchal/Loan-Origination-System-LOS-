<x-app-layout>
    @push('header')
        <style>
            table, td, th {
                border: 1px solid;
                padding-left: 5px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }
        </style>
    @endpush
    {{--        <x-slot name="header">--}}
    {{--            <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block print:hidden"></h2>--}}
    {{--            @include('back-navigation')--}}
    {{--        </x-slot>--}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden ">

                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent ">
                    <div class="mb-4 px-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <h2 class="text-sm text-center my-2 uppercase underline font-bold text-black">BASIC BORROWER'S FACT SHEET – FOR INDIVIDUALS / CONSUMERS</h2>
                        <h2 class="text-sm text-center my-2 uppercase  font-bold text-black">(TO BE COMPLETED IN CAPITAL LETTERS OR TYPEWRITTEN)</h2>
                        <h2 class="text-sm text-center my-2 font-bold text-black">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>
                        <div class="relative overflow-x-auto">

                            <table class="table-auto w-full border-collapse border-none" style="border: none!important;">
                                <thead class=" border-none border-black uppercase" style="border: none!important;;">
                                <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">
                                    <th class="border-none py-1 px-2 text-left" colspan="2" style="border: none">
                                        1. BORROWER'S PROFILE:
                                    </th>
                                </tr>
                                </thead>
                            </table>

                            <table style="font-size: 12px!important;">
                                @php
                                    $address = $borrower->permanent_address; // Example address
                                    $limit = 40; // Character limit for the first line

                                    // Check if the address is longer than the limit
                                    if (strlen($address) > $limit) {
                                        $breakpoint = strrpos(substr($address, 0, $limit), ' '); // Find last space before limit
                                        $firstLine = substr($address, 0, $breakpoint); // Text before the breakpoint
                                        $secondLine = substr($address, $breakpoint + 1); // Text after the breakpoint
                                    } else {
                                        $firstLine = $address;
                                        $secondLine = '';
                                    }
                                @endphp
                                <tbody>
                                <tr>
                                    <td colspan="16" width="301">
                                        <p>NAME: {{ strtoupper($borrower->name) }}</p>
                                    </td>
                                    <td colspan="16" width="301">
                                        <p>ADDRESS: {{ strtoupper($firstLine) }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="16" width="301">{{ strtoupper($secondLine) }}</td>
                                    <td colspan="16" width="301">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="16" width="301">
                                        <p>PHONE #: {{ $borrower->mobile_number }} </p>
                                    </td>
                                    <td colspan="8" width="150">
                                        <p>FAX #</p>
                                    </td>
                                    <td colspan="8" width="150">
                                        <p>EMAIL ADDRESS </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" width="150">
                                        <p>OFFICE: {{$borrower->office_phone_number}}</p>
                                    </td>
                                    <td colspan="8" width="150">
                                        <p>RES. {{$borrower->residence_phone_number}}</p>
                                    </td>
                                    <td colspan="8" width="150">
                                        <p>{{ $borrower->fax }}</p>
                                    </td>
                                    <td colspan="8" width="150">{{ strtoupper($borrower->email) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="16" width="301">
                                        <p>NATIONAL IDENTITY CARD #</p>
                                    </td>
                                    <td colspan="16" width="301">
                                        <p>NATIONAL TAX #</p>
                                    </td>
                                </tr>
                                <tr>
                                    {{-- Split the national_id into individual characters and display each in a separate <td> --}}
                                    @foreach (str_split($borrower->national_id_cnic, 1) as $char)
                                        <td class="text-center">{{ $char }}</td>
                                    @endforeach

                                    {{-- If the ID is shorter than expected, fill the remaining cells with non-breaking spaces --}}
                                    @for ($i = strlen($borrower->national_id_cnic); $i < 15; $i++)
                                        <td class="text-center">&nbsp;</td>
                                    @endfor

                                    <td colspan="16">{{ $borrower->ntn }}</td>
                                </tr>
                                <tr>
                                    <td colspan="16" width="301">
                                        <p>FATHER&rsquo;S NAME</p>
                                    </td>
                                    <td colspan="16" width="301">
                                        <p>FATHER&rsquo;S NATIONAL IDENTITY CARD #</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="16" width="301">{{ $borrower->parent_spouse_name }}</td>

                                    {{-- Split the national_id into individual characters and display each in a separate <td> --}}
                                    @foreach (str_split($borrower->parent_spouse_national_id_cnic, 1) as $char)
                                        <td class="text-center">{{ $char }}</td>
                                    @endforeach

                                    {{-- If the ID is shorter than expected, fill the remaining cells with non-breaking spaces --}}
                                    @for ($i = strlen($borrower->parent_spouse_national_id_cnic); $i < 15; $i++)
                                        <td class="text-center">&nbsp;</td>
                                    @endfor


                                </tr>
                                </tbody>
                            </table>

                            @if($borrower->reference->isNotEmpty())
                                @if($borrower->reference->count() == 2)

                                    <table class="table-auto w-full border-collapse border-none" style="border: none!important;">
                                        <thead class=" border-none border-black uppercase" style="border: none!important;;">
                                        <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">
                                            <th class="border-none py-1 px-2 text-left" colspan="2" style="border: none">
                                                2. REFERENCES (AT LEAST TWO):
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <table style="font-size: 12px!important;">
                                        <tbody>
                                        @foreach($borrower->reference as $rf)

                                            @php
                                                $address = $rf->permanent_address; // Example address
                                                $limit = 40; // Character limit for the first line

                                                // Check if the address is longer than the limit
                                                if (strlen($address) > $limit) {
                                                    $breakpoint = strrpos(substr($address, 0, $limit), ' '); // Find last space before limit
                                                    $firstLine = substr($address, 0, $breakpoint); // Text before the breakpoint
                                                    $secondLine = substr($address, $breakpoint + 1); // Text after the breakpoint
                                                } else {
                                                    $firstLine = $address;
                                                    $secondLine = '';
                                                }
                                            @endphp

                                            <tr>
                                                <td colspan="16" width="301">
                                                    <p>NAME</p>
                                                </td>
                                                <td colspan="16" width="301">
                                                    <p>ADDRESS: {{ strtoupper($firstLine) }}  </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="16" width="301"> {{ strtoupper($rf->name) }}</td>
                                                <td colspan="16" width="301">{{ strtoupper($secondLine) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="16" width="301">
                                                    <p>PHONE #: {{ $rf->phone_number }} </p>
                                                </td>
                                                <td colspan="8" width="150">
                                                    <p>FAX #: </p>
                                                </td>
                                                <td colspan="8" width="150">
                                                    <p>EMAIL ADDRESS </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" width="150">
                                                    <p>OFFICE: {{$rf->phone_number_two}}</p>
                                                </td>
                                                <td colspan="8" width="150">
                                                    <p>RES. {{$rf->phone_number_three}}</p>
                                                </td>
                                                <td colspan="8" width="150">
                                                    <p>{{ $rf->fax }}</p>
                                                </td>
                                                <td colspan="8" width="150">{{ strtoupper($rf->email) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="16" width="301">
                                                    <p>NATIONAL IDENTITY CARD #</p>
                                                </td>
                                                <td colspan="16" width="301">
                                                    <p>NATIONAL TAX #</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- Split the national_id into individual characters and display each in a separate <td> --}}
                                                @foreach (str_split($rf->national_id, 1) as $char)
                                                    <td class="text-center">{{ $char }}</td>
                                                @endforeach

                                                {{-- If the ID is shorter than expected, fill the remaining cells with non-breaking spaces --}}
                                                @for ($i = strlen($rf->national_id); $i < 15; $i++)
                                                    <td class="text-center">&nbsp;</td>
                                                @endfor

                                                <td colspan="16">{{ $rf->ntn }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="16" width="301">
                                                    <p>FATHER&rsquo;S NAME</p>
                                                </td>
                                                <td colspan="16" width="301">
                                                    <p>FATHER&rsquo;S NATIONAL IDENTITY CARD #</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="16" width="301">{{ $rf->father_husband }}</td>

                                                {{-- Split the national_id into individual characters and display each in a separate <td> --}}
                                                @foreach (str_split($rf->national_id, 1) as $char)
                                                    <td class="text-center">{{ $char }}</td>
                                                @endforeach

                                                {{-- If the ID is shorter than expected, fill the remaining cells with non-breaking spaces --}}
                                                @for ($i = strlen($rf->national_id); $i < 15; $i++)
                                                    <td class="text-center">&nbsp;</td>
                                                @endfor


                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                @else
                                    <h1 class="text-2xl text-red-500">You must add at least two reference not more then two</h1>
                                @endif
                            @else
                                <h1 class="text-2xl text-red-500">Please add at least two reference</h1>
                            @endif

                            <form method="POST" action="{{ route('fact-sheet.store', $borrower->id) }}" >
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

                                    <div>
                                        <x-label for="nature_of_business" value="3. NATURE OF BUSINESS / PROFESSION" />
                                        <select name="nature_of_business" required id="nature_of_business" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                            <option value="">Select an option</option>
                                            @foreach(\App\Models\Status::where('status', 'Business Nature')->get() as $item)
                                                <option value="{{ $item->name }}" {{ old('type') == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <x-label for="nature_of_business_other" value="If Selected Any other (Otherwise leave empty) " />
                                        <x-input id="nature_of_business_other" class="block mt-1 w-full" type="text" name="nature_of_business_other" :value="old('nature_of_business_other')" />
                                    </div>
                                </div>

                                <table class="table-auto w-full border-collapse border-none" style="border: none!important;font-size: 14px; text-align: center; font-weight: bold;">
                                    <thead class=" border-none border-black uppercase" style="border: none!important;;">
                                    <tr class="border-none text-black font-bold" style="font-size: 16px!important;border: none">
                                        <th class="border-none py-1 px-2 text-left" colspan="5" style="border: none">
                                            4. EXISTING LIMITS AND STATUS:
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Amount</td>
                                        <td>Expiry Date</td>
                                        <td colspan="3">Status</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>(Rs.)</td>
                                        <td>&nbsp;</td>
                                        <td>Regular</td>
                                        <td>Amount Overdue (If any)</td>
                                        <td>Amount Rescheduled / Restructured (if Any)</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 15%" class="uppercase text-center">Fund Based</td>
                                        <td><x-input id="fund_based_amount" class="block mt-1 w-full" type="number" name="fund_based_amount" :value="old('fund_based_amount')" /></td>
                                        <td><x-input id="fund_based_expiry_date" class="block mt-1 w-full" type="date" name="fund_based_expiry_date" :value="old('fund_based_expiry_date')" /></td>
                                        <td><x-input id="fund_based_status_regular" class="block mt-1 w-full" type="text" name="fund_based_status_regular" :value="old('fund_based_status_regular')" /></td>
                                        <td><x-input id="fund_based_status_amount_overdue_if_any" class="block mt-1 w-full" type="text" name="fund_based_status_amount_overdue_if_any" :value="old('fund_based_status_amount_overdue_if_any')" /></td>
                                        <td><x-input id="fund_based_status_amount_rescheduled_or_restructured_if_any" class="block mt-1 w-full" type="text" name="fund_based_status_amount_rescheduled_or_restructured_if_any" :value="old('fund_based_status_amount_rescheduled_or_restructured_if_any')" /></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%" class="uppercase text-center">Non Fund Based</td>
                                        <td><x-input id="non_fund_based_amount" class="block mt-1 w-full" type="number" name="non_fund_based_amount" :value="old('non_fund_based_amount')" /></td>
                                        <td><x-input id="non_fund_based_expiry_date" class="block mt-1 w-full" type="date" name="non_fund_based_expiry_date" :value="old('non_fund_based_expiry_date')" /></td>
                                        <td><x-input id="non_fund_based_status_regular" class="block mt-1 w-full" type="text" name="non_fund_based_status_regular" :value="old('non_fund_based_status_regular')" /></td>
                                        <td><x-input id="non_fund_based_status_amount_overdue_if_any" class="block mt-1 w-full" type="text" name="non_fund_based_status_amount_overdue_if_any" :value="old('non_fund_based_status_amount_overdue_if_any')" /></td>
                                        <td><x-input id="non_fund_based_status_amount_rescheduled_or_restructured_if_any" class="block mt-1 w-full" type="text" name="non_fund_based_status_amount_rescheduled_or_restructured_if_any" :value="old('non_fund_based_status_amount_rescheduled_or_restructured_if_any')" /></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table-auto w-full border-collapse border-none" style="border: none!important;font-size: 14px; text-align: center; font-weight: bold;">
                                    <thead class=" border-none border-black uppercase" style="border: none!important;;">
                                    <tr class="border-none text-black font-bold" style="font-size: 16px!important;border: none">
                                        <th class="border-none py-1 px-2 text-left" colspan="5" style="border: none">
                                            5. REQUESTED LIMITS:
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Amount</td>
                                        <td>TENURE</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 15%" class="uppercase">Fund Based</td>
                                        <td><x-input id="requested_limit_fund_based_amount" class="block mt-1 w-full" type="number" name="requested_limit_fund_based_amount" :value="old('requested_limit_fund_based_amount')" /></td>
                                        <td><x-input id="requested_limit_fund_based_tenure" class="block mt-1 w-full" type="text" name="requested_limit_fund_based_tenure" :value="old('requested_limit_fund_based_tenure')" /></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%" class="uppercase">NonFund Based</td>
                                        <td><x-input id="requested_limit_non_fund_based_amount" class="block mt-1 w-full" type="number" name="requested_limit_non_fund_based_amount" :value="old('requested_limit_non_fund_based_amount')" /></td>
                                        <td><x-input id="requested_limit_non_fund_based_tenure" class="block mt-1 w-full" type="text" name="requested_limit_non_fund_based_tenure" :value="old('requested_limit_non_fund_based_tenure')" /></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 mt-4">
                                    <div>
                                        <x-label for="detail_of_term_loan_sougnt" value="Details of Payment schedule if term loan sought" />
                                        <x-input id="detail_of_term_loan_sougnt" class="block mt-1 w-full" type="text" name="detail_of_term_loan_sougnt" :value="old('detail_of_term_loan_sougnt')" />
                                    </div>

                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-4" id="submit-btn">Save</x-button>
                                </div>
                            </form>

                            <x-validation-errors class="mb-4 mt-4"/>
                            <button id="btnPrint" class="hidden-print  inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150" onclick="window.close()">Close</button>
                            <div class="break-after"></div>
                        </div>
                        <x-validation-errors class="mb-4 mt-4"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>