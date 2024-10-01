<x-app-layout>
    @push('header')
        <style>
            body {
                font-size: 14px;
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

            .w-40 {
                width: 40%;
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
        <h2 class="font-semibold text-lg uppercase text-black leading-tight inline-block">
            Check list for {{ $borrower->loan_sub_category->name }}
        </h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        {{--                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-black">The Bank of Azad Jammu & Kashmir</h2>--}}
                        <h2 class="text-2xl text-center my-2 uppercase  font-bold text-black">Check list for {{ $borrower->loan_sub_category->name }}</h2>


                        <table>
                            <thead>
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Details of documents</th>
                                <th class="text-center">Authorized</th>
                                <th class="text-center">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (\App\Models\Checklist::where('loan_sub_category_id',$borrower->loan_sub_category->id)->get() as $item)
                                <tr>
                                    <td class="font-bold text-center w-10">
                                        {{ $item->sequence_no }}
                                    </td>

                                    <td class="w-50 font-bold pl-2">
                                        @if($item->route)
                                            <a href="{{ route($item->route,[$borrower->id]) }}" class="text-blue-500 hover:underline">{{ $item->name }}</a>
                                        @else
                                            {{ $item->name }}
                                        @endif
                                    </td>

                                    <td class=" w-10">

                                        @if($item->sequence_no == 1)
                                            @if(!empty($borrower))
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif
                                        @elseif($item->sequence_no == 2)
                                            @if(!empty($borrower->employment_information))
                                                <!-- Display the checkmark icon if employment information is filled -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <!-- Display the cross icon if employment information is not filled -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>

                                            @endif

                                        @elseif($item->sequence_no == 3)
                                            @if(!empty($borrower->applicant_requested_loan_information))
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>

                                            @endif

                                        @elseif($item->sequence_no == 4)
                                            @if(!empty($borrower->guarantor) && $borrower->guarantor->count() == 2)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif

                                        @elseif($item->sequence_no == 5)
                                            @if(!empty($borrower->finance_facility_many) && $borrower->finance_facility_many->count() >= 1)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif

                                        @elseif($item->sequence_no == 6)
                                            @if($borrower->securities->isNotEmpty() && $borrower->securities->count() == 3)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif
                                        @elseif($item->sequence_no == 7)
                                            @if($borrower->reference->isNotEmpty() && $borrower->reference?->count() == 2)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>

                                            @endif
                                        @elseif($item->sequence_no == 8)
                                            @if($borrower->documents->isNotEmpty())
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif
                                        @elseif($item->sequence_no == 9)
                                            @if($borrower->listHouseHoldItems->isNotEmpty())
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif
                                        @elseif($item->sequence_no == 10)
                                            @if(!empty($borrower->obligor_score_card) && $borrower->obligor_score_card)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif

                                        @elseif($item->sequence_no == 11)
                                            @if(empty($borrower->fact_sheet))
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif
                                        @elseif($item->sequence_no == 12)

                                            @if(!empty($borrower->personalNetWorthStat))
                                                @php
                                                    $allFormsPresent = collect(['personal_form_a', 'personal_form_b', 'personal_form_c', 'personal_form_d'])
                                                        ->every(fn($form) => !$borrower->personalNetWorthStat->$form->isEmpty());
                                                @endphp

                                                @if($allFormsPresent)
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                    </svg>
                                                @endif
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif

                                        @elseif($item->sequence_no == 13)
                                            @if(!empty($borrower->net_worth))
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif
                                        @elseif($item->sequence_no == 14)
                                            @if(!empty($borrower->employment_information))
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                                </svg>
                                            @endif
                                        @endif

                                    </td>
                                    <td class="text-center fixed-height">
                                        @if($item->sequence_no == 1)

                                        @elseif($item->sequence_no == 2)
                                            @if(empty($borrower->employment_information) || $borrower->employment_information->count() == 0)
                                                <div >
                                                    <strong>Employment Information Missing</strong>
                                                </div>

                                            @endif
                                        @elseif($item->sequence_no == 3)
                                            @if(empty($borrower->applicant_requested_loan_information) || $borrower->applicant_requested_loan_information->count() == 0)
                                                <div >
                                                    <strong>Requested Loan Information Missing</strong>
                                                </div>
                                            @endif
                                        @elseif($item->sequence_no == 4)
                                            @if(empty($borrower->guarantor) || $borrower->guarantor->count() < 2)
                                                <div >
                                                    <strong> Guarantor Information Missing</strong>
                                                </div>
                                            @endif
                                        @elseif($item->sequence_no == 5)

                                            @if($borrower->finance_facility_many->isEmpty())
                                            <strong>  Finance Facility Skipped / Not Filled </strong>
                                            @endif

                                        @elseif($item->sequence_no == 6)
                                            @if(empty($borrower->security) || $borrower->security->count() < 3)
                                                <div >
                                                    <strong>Security Information Missing</strong>
                                                    @endif
                                                    @elseif($item->sequence_no == 7)
                                                        @if(empty($borrower->reference) || $borrower->reference->count() < 2)
                                                            <div >
                                                                <strong>References Missing</strong>
                                                                @endif
                                                                @elseif($item->sequence_no == 8)
                                                                    @if($borrower->documents->isEmpty())
                                                                        <div >
                                                                            <strong>Documents Missing</strong>
                                                                        </div>
                                                                    @endif
                                                                @elseif($item->sequence_no == 9)
                                                                    @if($borrower->listHouseHoldItems->isEmpty())
                                                                        <strong>Household Items Missing</strong>
                                                                    @endif
                                                                @elseif($item->sequence_no == 10)
                                                                    @if(empty($borrower->obligor_score_card) || ($borrower->obligor_score_card->count() == 1))
                                                                        <div >
                                                                            <strong> Obligor Score Card Missing</strong>
                                                                        </div>
                                                                    @endif

                                                                @elseif($item->sequence_no == 11)
                                                                    @if(empty($borrower->fact_sheet))

                                                                    @endif

                                                                @elseif($item->sequence_no == 12)
                                                                    @if(!empty($borrower->personalNetWorthStat))
                                                                        @php
                                                                            $missingForms = [];
                                                                            if ($borrower->personalNetWorthStat?->personal_form_a->isEmpty()) {
                                                                                $missingForms[] = 'Form A Missing';
                                                                            }
                                                                            if ($borrower->personalNetWorthStat?->personal_form_b->isEmpty()) {
                                                                                $missingForms[] = 'Form B  Missing';
                                                                            }
                                                                            if ($borrower->personalNetWorthStat?->personal_form_c->isEmpty()) {
                                                                                $missingForms[] = 'Form C  Missing';
                                                                            }
                                                                            if ($borrower->personalNetWorthStat?->personal_form_d->isEmpty()) {
                                                                                $missingForms[] = 'Form D Missing';
                                                                            }
                                                                        @endphp

                                                                        @if(!empty($missingForms))
                                                                            <strong>{{ implode(', ', $missingForms) }} </strong>
                                                                        @endif
                                                                    @else
                                                                        <strong>Personal Net Worth Statement</strong>
                                                                    @endif



                                                                @elseif($item->sequence_no == 13)
                                                                    @if(empty($borrower->net_worth))
                                                                        <strong> Guarantor Undertaking Missing</strong>
                                                                    @endif
                                                                @elseif($item->sequence_no == 14)
                                                                    @if(!empty($borrower->employment_information))

                                                                    @else
                                                                        <strong> Employer Undertaking Missing</strong>
                                                                     @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
