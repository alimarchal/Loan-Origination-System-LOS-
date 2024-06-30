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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg print:shadow-none print:px-none px-2">

                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent ">
                    @include('tabs')
                    <div class="mb-4  bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
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

                            <x-validation-errors class="mb-4 mt-4"/>


                            @if(!empty($borrower->borrower_fact_sheet_consumer))

                                <table class="table-auto w-full border-collapse border-none" style="border: none!important;font-size: 12px;">
                                    <thead class=" border-none border-black uppercase" style="border: none!important;;">
                                    <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">
                                        <th class="border-none py-1 px-2 text-left underline" colspan="5" style="border: none">
                                            3. NATURE OF BUSINESS / PROFESSION:
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Industrial</td>
                                        <td>Commercial</td>
                                        <td>Agricultural</td>
                                        <td>Services</td>
                                        <td>Any Other</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Industrial")
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-1 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>



                                            @endif
                                        </td>
                                        <td>
                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Commercial")


                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>


                                            @endif
                                        </td>
                                        <td>
                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Agricultural")
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>

                                            @endif
                                        </td>
                                        <td>
                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Services")
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>

                                            @endif
                                        </td>
                                        <td>
                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Any Other")
                                                {{ $borrower->borrower_fact_sheet_consumer->nature_of_business }}
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>


                                <table class="table-auto w-full border-collapse border-none" style="border: none!important;font-size: 12px; text-align: center; ">
                                    <thead class=" border-none border-black uppercase" style="border: none!important;;">
                                    <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">
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
                                        <td>Amount Overdue <br>(If any)</td>
                                        <td>Amount Rescheduled / <br>Restructured (if Any)</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 20%" class="uppercase text-center">Fund Based</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_amount }}</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_expiry_date }}</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_regular }}</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_amount_overdue_if_any }}</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_amount_rescheduled_or_restructured_if_any }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%" class="uppercase text-center">Non Fund Based</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_amount }}</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_expiry_date }}</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_regular }}</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_amount_overdue_if_any }}</td>
                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_amount_rescheduled_or_restructured_if_any }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table-auto w-full border-collapse border-none" style="border: none!important;">
                                    <thead class=" border-none border-black uppercase" style="border: none!important;;">
                                    <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">
                                        <th class="border-none py-1 px-2 text-left " colspan="5" style="border: none">
                                            5. Details of Payment schedule if term loan sought {{ $borrower->borrower_fact_sheet_consumer->detail_of_term_loan_sougnt }}
                                        </th>
                                    </tr>
                                    <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">
                                        <th class="border-none py-1 px-2 text-left " colspan="5" style="border: none">
                                            6. Details of Payment schedule if term loan sought____________________________________
                                        </th>
                                    </tr>

                                    <tr class="border-none text-black uppercase " style="font-size: 12px!important;border: none">
                                        <th class="border-none py-1 px-2 text-left " colspan="5" style="border: none">
                                            I CERTIFY AND UNDERTAKE THAT THE INFORMATION FURNISHED ABOVE IS TRUE TO THE BEST OF MY KNOWLEDGE.
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            @else
                                <h1 class="text-center text-2xl font-bold my-2 text-red-500">{{ ucwords(strtolower("Please add NATURE OF BUSINESS / PROFESSION and EXISTING LIMITS AND STATUS and REQUESTED LIMITS")) }}</h1>
                                <span class="block text-center">
                                    <a href="javascript:;" onclick="openPopup('{{ route('fact-sheet.create',$borrower->id) }}')"  class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                                        Add Now
                                    </a>
                               </span>

                                <!-- JavaScript to Handle Popup -->
                                <script>
                                    function openPopup(url) {
                                        // Window size and features
                                        const width = 1000;
                                        const height = 700;

                                        // Calculate the position for the window to be centered
                                        const left = (window.screen.width / 2) - (width / 2);
                                        const top = (window.screen.height / 2) - (height / 2);

                                        // Define the size and properties of the popup window
                                        const popupFeatures = `width=${width},height=${height},left=${left},top=${top},resizable=yes,scrollbars=yes,status=yes`;

                                        // Open the new window
                                        const win = window.open(url, "_blank", popupFeatures);

                                        // Focus on the popup window if it opens successfully
                                        if (win) {
                                            win.focus();
                                        } else {
                                            alert('Popup blocked by browser.');
                                        }
                                    }
                                </script>
                            @endif


                        </div>
                        <x-validation-errors class="mb-4 mt-4"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>