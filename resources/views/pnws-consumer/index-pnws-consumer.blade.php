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
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block print:hidden"></h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg print:shadow-none print:px-none px-2">

                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent ">
                    @include('tabs')
                    <div class="mb-4  bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <h2 class="text-sm text-center my-2 uppercase underline font-bold text-black">Personal Net Worth Statement (PNWS)</h2>
                        <h2 class="text-sm text-center my-2 uppercase  font-bold text-black">ACCOUNT AT THE BANK OF AZAD JAMMU & KASHMIR {{ $borrower->branch?->name }}</h2>
                        <h2 class="text-sm text-center my-2 font-bold text-black">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>
                        <div class="relative overflow-x-auto px-2">

                            <table style="font-size: 12px!important;margin-bottom: 3px;">
                                <tr>
                                    <td>Name: {{ strtoupper($borrower->name) }} </td>
                                    <td>NIC No: {{ $borrower->national_id_cnic }}</td>
                                </tr>

                                <tr>
                                    <td>Father's Name: {{ $borrower->parent_spouse_name }} </td>
                                    <td>NTN No: {{ $borrower->ntn }}</td>
                                </tr>

                                <tr>
                                    <td>Business Address:
                                        @if(!empty($borrower->applicant_business))
                                            {{ $borrower->applicant_business?->address }}
                                        @elseif(!empty($borrower->employment_information))
                                            {{ $borrower->employment_information?->official_address }}
                                        @endif
                                    </td>
                                    <td>Tele: (Office):
                                        @if(!empty($borrower->applicant_business))
                                            {{ $borrower->applicant_business?->landline }}
                                        @elseif(!empty($borrower->employment_information))
                                            {{ $borrower->employment_information?->office_phone_number }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Residential address:
                                        {{ $borrower->permanent_address }}
                                    </td>
                                    <td style="width: 50%">
                                        Tele: (Residence):
                                        {{ $borrower->residence_phone_number }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>Qualification: Educational:</td>
                                    <td>Professional:</td>
                                </tr>
                            </table>

                            <span class="font-bold">A. Immovable Assets/ Real Estates, owned in Personal Capacity.</span>
                            <table style="font-size: 12px!important;margin-top: 3px;">
                                <thead>
                                <th>S.No</th>
                                <th>Particular of Property Location, Municipal/ Survey/ Khatoni etc No.</th>
                                <th>In the name of</th>
                                <th>Self acquired Or Family property</th>
                                <th>Encumbered <br> d to (*) </th>
                                <th>Market Value</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                </tfoot>
                            </table>
                            <table style="font-size: 12px!important;margin-top: 3px;">
                                <thead>
                                <th style="width: 35%">Particular</th>
                                <th>Description</th>
                                <th>Current Value</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Cash/ Prize Bonds/Deposits</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Securities <br>(Share scrips/National securities/NIT Units/ Investment Bonds/ mutual funds
                                        etc)
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Jewelleries/Ornaments</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                <tr>
                                    <td>Motor Vehicles</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Market Model/Regn. No.</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Agricultural equipments</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Tractors/ Trolleys/ Thrashers etc</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                <tr>
                                    <td>Livestock</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Bullocks/ Buffaloes/ Cows/ horses</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Furniture/Fixtures/Appliances</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Market Model/Regn. No.</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Tractors/ Trolleys/ Thrashers etc</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                <tr>
                                    <td>Bullocks/ Buffaloes/ Cows/ horses</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                <tr>
                                    <td>Others</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>Sum</td>
                                    <td>$180</td>
                                    <td>$180</td>
                                </tr>
                                </tfoot>
                            </table>
                            <table style="font-size: 12px!important;margin-top: 3px;">
                                <thead>
                                <th style="width: 35%">Particular</th>
                                <th>Description</th>
                                <th>Amount</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Undertakings/ Guarantees/ Sureties</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Personal Liabilities (Loans/ Credits)
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Mortgages on Property</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>Total Liabilities</td>
                                    <td>$180</td>
                                    <td>$180</td>
                                </tr>
                                </tfoot>
                            </table>
                            <table style="font-size: 12px!important;margin-top: 3px;">
                                <thead>
                                <th style="width: 35%">NET WORTH = (A+B+C)</th>
                                <th></th>
                                <th></th>
                                </thead>
                            </table>


                            <br>


                            <table style="font-size: 12px!important;margin-top: 3px;">
                                <thead>
                                <th style="width: 35%">Bank Institution	</th>
                                <th>Amount	</th>
                                <th>Expiry Date	</th>
                                <th>Nature of Guarantee/ Surety	</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </table>


                            <x-validation-errors class="mb-4 mt-4"/>


{{--                            @if(!empty($borrower->borrower_fact_sheet_consumer))--}}

{{--                                <table class="table-auto w-full border-collapse border-none" style="border: none!important;font-size: 12px;">--}}
{{--                                    <thead class=" border-none border-black uppercase" style="border: none!important;;">--}}
{{--                                    <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">--}}
{{--                                        <th class="border-none py-1 px-2 text-left underline" colspan="5" style="border: none">--}}
{{--                                            3. NATURE OF BUSINESS / PROFESSION:--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}

{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Industrial</td>--}}
{{--                                        <td>Commercial</td>--}}
{{--                                        <td>Agricultural</td>--}}
{{--                                        <td>Services</td>--}}
{{--                                        <td>Any Other</td>--}}
{{--                                    </tr>--}}

{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Industrial")--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-1 mx-auto">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>--}}
{{--                                                </svg>--}}

{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Commercial")--}}

{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mx-auto">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>--}}
{{--                                                </svg>--}}

{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Agricultural")--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mx-auto">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>--}}
{{--                                                </svg>--}}

{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Services")--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mx-auto">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>--}}
{{--                                                </svg>--}}

{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Any Other")--}}
{{--                                                {{ $borrower->borrower_fact_sheet_consumer->nature_of_business }}--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}


{{--                                <table class="table-auto w-full border-collapse border-none" style="border: none!important;font-size: 12px; text-align: center; ">--}}
{{--                                    <thead class=" border-none border-black uppercase" style="border: none!important;;">--}}
{{--                                    <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">--}}
{{--                                        <th class="border-none py-1 px-2 text-left" colspan="5" style="border: none">--}}
{{--                                            4. EXISTING LIMITS AND STATUS:--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}

{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>&nbsp;</td>--}}
{{--                                        <td>Amount</td>--}}
{{--                                        <td>Expiry Date</td>--}}
{{--                                        <td colspan="3">Status</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>&nbsp;</td>--}}
{{--                                        <td>(Rs.)</td>--}}
{{--                                        <td>&nbsp;</td>--}}
{{--                                        <td>Regular</td>--}}
{{--                                        <td>Amount Overdue <br>(If any)</td>--}}
{{--                                        <td>Amount Rescheduled / <br>Restructured (if Any)</td>--}}
{{--                                    </tr>--}}

{{--                                    <tr>--}}
{{--                                        <td style="width: 20%" class="uppercase text-center">Fund Based</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_amount }}</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_expiry_date }}</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_regular }}</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_amount_overdue_if_any }}</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_amount_rescheduled_or_restructured_if_any }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td style="width: 15%" class="uppercase text-center">Non Fund Based</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_amount }}</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_expiry_date }}</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_regular }}</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_amount_overdue_if_any }}</td>--}}
{{--                                        <td>{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_amount_rescheduled_or_restructured_if_any }}</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <table class="table-auto w-full border-collapse border-none" style="border: none!important;">--}}
{{--                                    <thead class=" border-none border-black uppercase" style="border: none!important;;">--}}
{{--                                    <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">--}}
{{--                                        <th class="border-none py-1 px-2 text-left " colspan="5" style="border: none">--}}
{{--                                            5. Details of Payment schedule if term loan sought {{ $borrower->borrower_fact_sheet_consumer->detail_of_term_loan_sougnt }}--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    <tr class="border-none text-black font-bold" style="font-size: 12px!important;border: none">--}}
{{--                                        <th class="border-none py-1 px-2 text-left " colspan="5" style="border: none">--}}
{{--                                            6. Details of Payment schedule if term loan sought____________________________________--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}

{{--                                    <tr class="border-none text-black uppercase " style="font-size: 12px!important;border: none">--}}
{{--                                        <th class="border-none py-1 px-2 text-left " colspan="5" style="border: none">--}}
{{--                                            I CERTIFY AND UNDERTAKE THAT THE INFORMATION FURNISHED ABOVE IS TRUE TO THE BEST OF MY KNOWLEDGE.--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                </table>--}}
{{--                            @else--}}
{{--                                <h1 class="text-center text-2xl font-bold my-2 text-red-500">{{ ucwords(strtolower("Please add NATURE OF BUSINESS / PROFESSION and EXISTING LIMITS AND STATUS and REQUESTED LIMITS")) }}</h1>--}}
{{--                                <span class="block text-center">--}}
{{--                                    <a href="javascript:;" onclick="openPopup('{{ route('fact-sheet.create',$borrower->id) }}')" class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">--}}
{{--                                        Add Now--}}
{{--                                    </a>--}}
{{--                               </span>--}}

{{--                                <!-- JavaScript to Handle Popup -->--}}
{{--                                <script>--}}
{{--                                    function openPopup(url) {--}}
{{--                                        // Window size and features--}}
{{--                                        const width = 1000;--}}
{{--                                        const height = 700;--}}

{{--                                        // Calculate the position for the window to be centered--}}
{{--                                        const left = (window.screen.width / 2) - (width / 2);--}}
{{--                                        const top = (window.screen.height / 2) - (height / 2);--}}

{{--                                        // Define the size and properties of the popup window--}}
{{--                                        const popupFeatures = `width=${width},height=${height},left=${left},top=${top},resizable=yes,scrollbars=yes,status=yes`;--}}

{{--                                        // Open the new window--}}
{{--                                        const win = window.open(url, "_blank", popupFeatures);--}}

{{--                                        // Focus on the popup window if it opens successfully--}}
{{--                                        if (win) {--}}
{{--                                            win.focus();--}}
{{--                                        } else {--}}
{{--                                            alert('Popup blocked by browser.');--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                </script>--}}
{{--                            @endif--}}


                        </div>
                        <x-validation-errors class="mb-4 mt-4"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>