<x-app-layout>
    @push('header')
        <style>
            body {
                font-size: 12px;
                /*padding: 20px;*/
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 5px;
                page-break-inside: avoid;
            }

            th, td {
                border: 1px solid black;
                /*padding: 4px;*/
                padding-left: 5px;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-right: 5px;
                text-align: left;
                vertical-align: top;
                word-wrap: break-word;
            }

            th {
                /*background-color: #f2f2f2;*/
                background-color: lightgray;
                font-weight: bold;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            .font-bold {
                font-weight: bold;
            }

            .uppercase {
                text-transform: uppercase;
            }

            .mb-4 {
                margin-bottom: 5px;
            }


            .w-10 {
                width: 10%;
            }

            .w-16 {
                width: 16.6%;
            }

            .w-20 {
                width: 20%;
            }


            .w-25 {
                width: 25%;
            }

            .w-30 {
                width: 30%;
            }

            .w-50 {
                width: 50%;
            }

            .w-75 {
                width: 75%;
            }

            .w-100 {
                width: 100%;
            }

            .page-break {
                page-break-after: always;
            }
        </style>
    @endpush

    <x-slot name="header">
        <h2 class="text-xl uppercase underline font-bold text-red-700 text-center leading-tight block">
            BASIC BORROWER'S FACT SHEET
        </h2>
    </x-slot>

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
                            <div class="relative overflow-x-auto">
                                @php
                                    $address = $borrower->permanent_address; // Example address
                                    $limit = 20; // Character limit for the first line

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
                                <table class="table-auto w-full border-collapse border border-black">
                                    <thead class="border-black uppercase">
                                    <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                        <th class="border-black border py-1 px-2 text-center" colspan="4"> BORROWER'S PROFILE</th>
                                    </tr>
                                    </thead>

                                    <tbody class="text-black">
                                    <tr>
                                        <td class="font-bold w-25">NAME:</td>
                                        <td class="w-25">{{ strtoupper($borrower->name) }}</td>
                                        <td class="font-bold w-25">ADDRESS:</td>
                                        <td class="w-25">{{ strtoupper($firstLine) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">ADDRESS (LINE 2):</td>
                                        <td class="w-25">{{ strtoupper($secondLine) }}</td>
                                        <td class="font-bold w-25">PHONE #</td>
                                        <td class="w-25"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">FAX #:</td>
                                        <td class="w-25">{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">EMAIL ADDRESS:</td>
                                        <td class="w-25">{{ $borrower->ntn ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">CNIC:</td>
                                        <td class="w-25">{{ $borrower->parent_spouse_national_id_cnic ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">NTN:</td>
                                        <td class="w-25">{{ $borrower->number_of_dependents ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">FATHER’S NAME:</td>
                                        <td class="w-25">{{ $borrower->education_qualification ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">FATHER’S CNIC #:</td>
                                        <td class="w-25">{{ $borrower->email ?? 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>


                                @if($borrower->reference->isNotEmpty())
                                    @if($borrower->reference->count() == 2)
                                        @if(!$borrower->reference->isEmpty())
                                            @foreach($borrower->reference as $index => $reference)
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th colspan="4" class="text-center">References # {{ $index + 1 }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="font-bold w-25">Father/Husband:</td>
                                                        <td class="w-25">{{ $reference->father_husband }}</td>
                                                        <td class="font-bold w-25">National ID:</td>
                                                        <td class="w-25">{{ $reference->national_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">NTN:</td>
                                                        <td>{{ $reference->ntn }}</td>
                                                        <td class="font-bold">Date of Birth:</td>
                                                        <td>{{ $reference->date_of_birth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Present Address:</td>
                                                        <td>{{ $reference->present_address }}</td>
                                                        <td class="font-bold">Permanent Address:</td>
                                                        <td>{{ $reference->permanent_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Phone Number:</td>
                                                        <td>{{ $reference->phone_number }}</td>
                                                        <td class="font-bold">Email:</td>
                                                        <td>{{ $reference->email }}</td>
                                                    </tr>


                                                    <tr>
                                                        <td class="font-bold">Relationship to Borrower:</td>
                                                        <td colspan="6">{{ $reference->relationship_to_borrower }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                @if(!$loop->last)
                                                    <!-- <div class="page-break"></div> -->
                                                @endif
                                            @endforeach
                                        @endif

                                    @else
                                        <h1 class="text-2xl text-red-500">You must add at least two reference not more then two</h1>
                                    @endif
                                @else
                                    <h1 class="text-2xl text-red-500">Please add at least two reference</h1>
                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">NATURE OF BUSINESS / PROFESSION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-25">Nature of Business Profession</td>
                                            <td class="w-25">{{ $borrower->applicant_requested_loan_information->nature_of_business }}</td>
                                            <td class="font-bold w-25">Any Other</td>
                                            <td class="w-25">{{ $borrower->applicant_requested_loan_information->nature_of_business_other }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif






                                @if($borrower->finance_facility_many->isNotEmpty())

                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">EXISTING LIMITS AND STATUS</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" rowspan="2"></th>
                                            <th class="text-center align-middle" rowspan="2">Amount (Rs)</th>
                                            <th class="text-center align-middle" rowspan="2">Expiry Date</th>
                                            <th class="text-center align-middle" colspan="3">Status</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Regular</th>
                                            <th class="text-center">Amount Overdue</th>
                                            <th class="text-center">Amount Rescheduled</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($borrower->finance_facility_many as $item)
                                            <tr>
                                                <td class="font-bold w-16 text-center">{{ $item->facility_type }}</td>
                                                <td class="w-16 text-center">{{ $item->sanctioned_amount }}</td>
                                                <td class="w-16 text-center">{{ $item->end_date }} </td>
                                                <td class="w-16 text-center">{{ $item->repayment_status }}</td>
                                                <td class="font-bold w-16 text-center">{{ $item->outstanding_amount }}</td>
                                                <td class="w-16 text-center"> {{ $item->amount_rescheduled }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">REQUESTED LIMITS</th>
                                        </tr>

                                        <tr>
                                            <th class="text-center">Regular</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">TENURE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-16">{{ $borrower->applicant_requested_loan_information->fund_based_non_fund_based }}</td>
                                            <td class="w-16">{{ $borrower->applicant_requested_loan_information->requested_amount }}</td>
                                            <td class="w-16">{{ $borrower->applicant_requested_loan_information->tenure_in_years }} Years, and {{ $borrower->applicant_requested_loan_information->tenure_in_months }} Months</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">Details of Payment schedule if term loan sought</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-16">{{ $borrower->applicant_requested_loan_information->details_payment_schedule }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                @endif

                            </div>
                            <x-validation-errors class="mb-4 mt-4"/>
                        </div>
                                                    <div class="flex items-center justify-end mt-4">
                                @can('inputter')


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
                            </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
