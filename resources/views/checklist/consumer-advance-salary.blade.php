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
{{--                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-black">The Bank of Azad Jammu & Kashmir</h2>--}}
                        <h2 class="text-2xl text-center my-2 uppercase  font-bold text-black">Check list for {{ $borrower->loan_sub_category->name }}</h2>


                        <table>
                            <thead>
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Details of documents</th>
                                <th class="text-center">Authorized</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (\App\Models\Checklist::where('loan_sub_category_id',$borrower->loan_sub_category->id)->get() as $item)
                                <tr>
                                    <td class="font-bold text-center w-10">
                                        {{ $item->sequence_no }}
                                    </td>

                                    <td class="w-75 font-bold pl-2">
                                        @if($item->route)
                                            <a href="{{ route($item->route,[$borrower->id]) }}" class="text-blue-500 hover:underline">{{ $item->name }}</a>
                                        @else
                                            {{ $item->name }}
                                        @endif
                                    </td>

                                    <td class=" w-10">


                                        @if($item->sequence_no == 1)
                                            @if(!empty($borrower))
                                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            @endif
                                        @elseif($item->sequence_no == 2)

                                            @if(!empty($borrower->employment_information) && $borrower->employment_information->count() == 1)
                                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mx-auto">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
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
</x-app-layout>