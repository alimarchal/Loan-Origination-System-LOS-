<x-app-layout>

    @push('header')

        <style>
            table, td, th {
                /*border: 1px solid;*/
                /*padding-left: 5px;*/
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }
        </style>


        <style>


            @media print {
                body {
                    /*margin: -20px!important;*/
                }
            }

            /*@media screen {*/
            /*    .table_header_print {*/
            /*        display: none;*/
            /*    }*/
            /*}*/

            /*@media print {*/
            /*    body {*/
            /*        margin: 0;*/
            /*        padding: 0;*/
            /*    }*/

            /*    .header-print {*/
            /*        width: 100%;*/
            /*        height: 100px; !* Adjust the height as needed *!*/
            /*        margin: 0;*/
            /*        padding: 0;*/
            /*        position: fixed;*/
            /*        top: 0;*/
            /*        left: 0;*/
            /*        background-color: white; !* Set the background color you want *!*/
            /*    }*/

            /*    .table_header_print {*/
            /*        width: 100%;*/
            /*    }*/

            /*    .table_header_print td {*/
            /*        width: 33.33%;*/
            /*        text-align: center; !* Center the content horizontally *!*/
            /*    }*/

            /*    .table_header_print img {*/
            /*        height: 100px;*/
            /*    }*/

            /*    table, td, th {*/
            /*        !*border: 1px solid;*!*/
            /*    }*/

            /*    .qrcode {*/
            /*        float: right;*/
            /*    }*/
            /*}*/

            /* Hide the header on the screen */
            /*.header-print {*/
            /*    display: none;*/
            /*}*/
        </style>

    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Print Profile
        </h2>


        <div class="flex justify-center items-center float-right">
            <a href="javascript:;" onclick="window.print()"
               class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z"/>
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg  print:shadow-none">

                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 print:border-none">
                    @include('tabs')
                    <div class="bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:via-transparent print:border-none print:text-black ">

                        <table>
                            <tr>
                                <td style="width: 20%">
                                    <div style="margin: auto;">
                                        <img src="{{ Storage::url('logo-and-icon/android-chrome-192x192.png') }}" alt="Internee Picture" style=" border: 1px solid #000; margin: auto">
                                    </div>
                                </td>
                                <td style="width: 60%">
                                    <p class="text-center font-bold uppercase " style=" font-size: 13px;">{{ $student->branch->name }} </p>
                                    <p class="text-center capitalize font-extrabold text-black" style="font-size: 12px;">{{ strtolower($student->branch->address) }} , {{ $student->branch->city }}</p>
                                    <p class="text-center capitalize font-extrabold text-black" style="font-size: 12px;">Phone Office: {{ $student->branch->telephone }} , Mobile: {{ $student->branch->cell_phone }}</p>
                                    <p class="text-center capitalize font-extrabold text-black" style="font-size: 12px;">Branch Code: {{ $student->branch->branch_custom_code }}<br></p>
                                    <p class="text-center font-bold underline uppercase" style="font-size: 12px;">digital admission profile</p>
                                    <p class="text-center font-bold uppercase" style="font-size: 12px;">Student ID: {{ $student->branch->short_name }}/{{ $student->id }}/{{ $sessionYear }}</p>
                                </td>
                                <td style="width: 20%; text-align: center;">

                                    <div style="float: right; margin-right: 10%;">
                                        @php
                                            $test_report_data = 'Branch Code: ' . $student->branch->branch_custom_code . "\n" .
                                                                $student->branch->short_name . "/" . $student->id . '/' . $sessionYear . "\n" .
                                                                $student->firstname . ' ' . $student->lastname . "\n" . $student->guardian_is . ' ' . $student->guardian_name . "\n" . "Software Developed By: SeeChange Innovative". "\n" . "03008169924";
                                        @endphp
                                        {!! DNS2D::getBarcodeSVG($test_report_data, 'QRCODE',3,3) !!}
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <hr>
                        <table class="mt-4">
                            <tr>
                                <td style="width: 80%">
                                    <p class="text-left font-bold px-2 uppercase">
                                        Full Name: {{ $student->gender == 'Male' ? 'Mr.' : 'Ms.' }} {{ $student->firstname . ' ' . $student->lastname }}
                                        <br>
                                        {{ $student->guardian_is }} {{ $student->guardian_name }}
                                    </p>

                                    <p class="text-left font-bold px-2 ">
                                        <span class="uppercase">Gender / Age: {{ $student->gender }}</span> - {{ \Carbon\Carbon::parse($student->dob)->format('d-M-Y')  }} ({{ \Carbon\Carbon::parse($student->dob)->diff(\Carbon\Carbon::now())->format('%yy') }})
                                    </p>


                                    <p class="text-left font-bold px-2 uppercase">
                                        Address: {{ $student->address }}
                                    </p>

                                </td>
                                <td style="width: 20%; text-align: center;">
                                    <div style="margin: auto;">

                                        @if ($student->profile_picture)
                                            <img src="{{ Storage::url($student->profile_picture) }}" alt="Internee Picture" class="rounded-lg" style="width: 1in; height: 1in; border: 1px solid #000; margin: auto">
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <hr>

                        <table class="mt-4 ">
                            <tr>
                                <td style="font-weight: bold;" class=" px-2">Education Qualification</td>
                                <td>{{ $student->qualification }}</td>
                                <td style="font-weight: bold;">CNIC</td>
                                <td>{{ $student->cnic }}</td>
                            </tr>


                            <tr>
                                <td style="font-weight: bold;" class=" px-2">Student Cell #</td>
                                <td>{{ $student->mobile_no }}</td>
                                <td style="font-weight: bold;">Guardian Cell #</td>
                                <td>{{ $student->guardian_emergency_contact }}</td>
                            </tr>


                            <tr>
                                <td style="font-weight: bold;" class=" px-2">Email ID:</td>
                                <td>{{ $student->email }}</td>
                                <td style="font-weight: bold;">Blood Group</td>
                                <td>{{ $student->blood_group->name }}</td>
                            </tr>
                        </table>

                        <hr>

                        <div class="text-center mt-2 text-xl">
                            <span class="uppercase underline" style="font-weight: bold;">Applied For</span>
                        </div>

                        @php
                            $certificateCategories = \App\Models\CertificateCategory::where('status', 1)->get();
                            $halfwayPoint = ceil($certificateCategories->count() / 2);
                        @endphp

                        <table class="mt-4 mb-4">
                            <tr>
                                <!-- First column for the first half of categories -->
                                <td style="font-weight: bold; vertical-align: top;" class="px-2">
                                    <ul>
                                        @foreach($certificateCategories->take($halfwayPoint) as $cert)
                                            <li>
                                                @if(in_array($cert->id, $student_applied_for_ids ?? []))
                                                    <img src="{{ url('icons-images/tick.png') }}" alt="Tick" style="height: 20px;" class="inline-block"> {{ $cert->name }}
                                                @else
                                                    <img src="{{ url('icons-images/untick.png') }}" alt="Untick" style="height: 20px;" class="inline-block"> {{ $cert->name }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>

                                <!-- Second column for the second half of categories -->
                                <td style="font-weight: bold; vertical-align: top;" class="px-2">
                                    <ul>
                                        @foreach($certificateCategories->slice($halfwayPoint) as $cert)
                                            <li>
                                                @if(in_array($cert->id, $student_applied_for_ids ?? []))
                                                    <img src="{{ url('icons-images/tick.png') }}" alt="Tick" style="height: 20px;" class="inline-block"> {{ $cert->name }}
                                                @else
                                                    <img src="{{ url('icons-images/untick.png') }}" alt="Untick" style="height: 20px;" class="inline-block"> {{ $cert->name }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>


                            </tr>
                        </table>

                        <hr>

                        <table class="mt-2">
                            <tr>

                                <td style="font-weight: bold;" class="px-2">
                                    <span class="uppercase underline">Admission Type</span>
                                    <span>
                                        <ul>
                                            @foreach(\App\Models\Category::where('category_type','Admission Type')->get() as $cert)
                                                <li>
                                                    @if($cert->id == $student->admission_type)
                                                        <img src="{{ url('icons-images/tick.png') }}" alt="Tick" style="height: 20px;" class="inline-block">
                                                    @else
                                                        <img src="{{ url('icons-images/untick.png') }}" alt="Tick" style="height: 20px;" class="inline-block">
                                                    @endif

                                                    {{ $cert->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </span>
                                </td>

                                <td style="font-weight: bold;">
                                    <span class="uppercase underline">Certification Required</span>
                                    <span>
                                        <ul>
                                            @foreach(\App\Models\Category::where('category_type','Certification Required')->get() as $cert)
                                                <li>
                                                    @if($cert->id == $student->certification_required)
                                                        <img src="{{ url('icons-images/tick.png') }}" alt="Tick" style="height: 20px;" class="inline-block">
                                                    @else
                                                        <img src="{{ url('icons-images/untick.png') }}" alt="Tick" style="height: 20px;" class="inline-block">
                                                    @endif

                                                    {{ $cert->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </span>
                                </td>


                                <td style="font-weight: bold;">
                                    <span class="uppercase underline">computer knowledge?</span>
                                    <span>
                                        <ul>
                                            @foreach(\App\Models\Category::where('category_type','Computer Knowledge')->get() as $cert)
                                                <li>
                                                    @if($cert->id == $student->computer_knowledge)
                                                        <img src="{{ url('icons-images/tick.png') }}" alt="Tick" style="height: 20px;" class="inline-block">
                                                    @else
                                                        <img src="{{ url('icons-images/untick.png') }}" alt="Tick" style="height: 20px;" class="inline-block">
                                                    @endif

                                                    {{ $cert->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </span>
                                </td>
                            </tr>

                        </table>


                        <table class="hidden print:table mt-16">
                            <tr>
                                <td style="font-weight: bold;" class="px-2 print:px-2 print:font-bold">
                                    Admission Date: {{ $student->created_at }}
                                </td>

                                <td class="print:font-bold">
                                    Student Signature: _____________________
                                </td>
                            </tr>
                        </table>

                        <div class="text-xs text-gray-600 mt-4 hidden print:block">
                            <p>Software Developed By: <span class="font-semibold">SeeChange Innovative</span></p>
                            <p>Contact: <a href="tel:+03008169924" class="text-blue-600 hover:text-blue-700" style="text-decoration: none;">0300-8169924</a></p>
                        </div>


                        @if($student->fee_schedules->isNotEmpty())
                            <!-- This div will start on a new page when printing -->
                            <div class="break-before-page mb-2">
                                <!-- Content -->
                                <div class="text-center mt-2 text-xl">
                                    <span class="uppercase underline" style="font-weight: bold;">Student Fee Schedule</span>
                                </div>
                            </div>
                            <div class="relative overflow-x-auto">
                                <table class="table-auto w-full border-collapse border border-black">
                                    <thead class="border-black">
                                    <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                        <th class="border-black border py-1 px-2 text-center">Time</th>
                                        <th class="border-black border py-1 px-2 text-center">Course</th>
                                        <th class="border-black border py-1 px-2 text-center">Fee Date</th>
                                        <th class="border-black border py-1 px-2 text-center">Amount</th>
                                        <th class="border-black border py-1 px-2 text-center">Due</th>
                                        <th class="border-black border py-1 px-2 text-center">Late fine</th>
                                        <th class="border-black border py-1 px-2 text-center">Paid</th>
                                        <th class="border-black border py-1 px-2 text-center">Date</th>
                                        <th class="border-black border py-1 px-2 text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($student->fee_schedules as $fee_schedule)
                                        <tr class="border-b border-black border-gray-200 hover:bg-yellow-100" style="font-size: 12px!important;">

                                            <td class="border-black border py-1 px-1 text-center">
                                                @if($fee_schedule->course->name == "Registration Fee")
                                                @else
                                                    {{ \Carbon\Carbon::parse($fee_schedule->institute_class_time->start_time)->format('H') . ':' . \Carbon\Carbon::parse($fee_schedule->institute_class_time->end_time)->format('ia') }}
                                                @endif
                                            </td>

                                            <td class="border-black border py-1 px-1 text-left">
                                                {{ $fee_schedule->course->name }}
                                            </td>

                                            <td class="border-black border py-1 px-1 text-center">
                                                {{ \Carbon\Carbon::parse($fee_schedule->issue_date)->format('d/m/y') }}
                                            </td>

                                            <td class="border-black border py-1 px-1 text-center">

                                                @if($fee_schedule->is_discounted)
                                                    <span class="text-red-600 font-extrabold">{{ number_format($fee_schedule->fee_amount,2) }}<sup>*<br>@if($fee_schedule->discount_type == "FLAT")
                                                                F-{{ $fee_schedule->discounted_number }} <br><span class="line-through">{{ \App\Models\Course::find($fee_schedule->course_id)->amount }}</span>
                                                            @elseif($fee_schedule->discount_type == "PERCENTAGE")
                                                                <span class="print:hidden">
                                                                    {{ $fee_schedule->discounted_number }}%  <br><span class="line-through">{{ \App\Models\Course::find($fee_schedule->course_id)->amount }}
                                                                </span>

                                                            @endif
                                                        </sup>
                                                    </span>
                                                @else
                                                    {{ number_format($fee_schedule->fee_amount,2) }}
                                                @endif
                                            </td>

                                            <td class="border-black border py-1 px-1 text-center">
                                                {{ \Carbon\Carbon::parse($fee_schedule->due_date)->format('d/m/y') }}
                                            </td>


                                            <td class="border-black border py-1 px-1 text-center">
                                                {{ number_format($fee_schedule->fee_amount_after_due_date,2) }}
                                            </td>


                                            <td class="border-black border py-1 px-1 text-center">
                                                {{ number_format($fee_schedule->payment_amount,2) }}
                                            </td>


                                            <td class="border-black border py-1 px-1 text-center">
                                                @if(!empty($fee_schedule->payment_date))
                                                    {{ \Carbon\Carbon::parse($fee_schedule->payment_date)->format('d/m/y') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>


                                            <td class="border-black border py-1 px-1 text-center @if($fee_schedule->status == "Un-Paid") bg-red-300 @elseif($fee_schedule->status == "Canceled") bg-yellow-400 @else bg-green-400 @endif">
                                                {{ $fee_schedule->status }}
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>

                                    <tfoot>
                                    <tr class="text-black text-sm font-bold">
                                        <th scope="row" class="border-black border py-1 px-1 text-right" colspan="3">Total</th>
                                        <td class="border-black border py-1 px-1 text-center">{{ number_format($student->fee_schedules->sum('fee_amount'),2) }}</td>
                                        <th scope="row" class="border-black border py-1 px-1 text-center"></th>
                                        <td class="border-black border py-1 px-1 text-center"></td>
                                        <td class="border-black border py-1 px-1 text-center">{{ number_format($student->fee_schedules->sum('payment_amount'),2) }}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif




                        @if($student->exam_marks->isNotEmpty())

                            <div class="text-center mt-2  mb-2 text-xl">
                                <span class="uppercase underline" style="font-weight: bold;">Student Assessment </span>
                            </div>
                            <table class="table-auto w-full border-collapse border border-black" style="font-size: 10px!important;">
                                <thead class="border-black" style="font-size: 12px!important;">
                                <tr class="bg-gray-200 text-black  text-sm font-bold">
                                    <th class="border-black border py-1 px-2 text-center">#</th>
                                    {{--                                    <th class="border-black border py-1 px-2 text-center">CLS Time</th>--}}
                                    <th class="border-black border py-1 px-2 text-center">Date</th>
                                    <th class="border-black border py-1 px-2 text-center">Course</th>
                                    <th class="border-black border py-1 px-2 text-center">Tutor</th>
                                    <th class="border-black border py-1 px-2 text-center">Examiner</th>
                                    <th class="border-black border py-1 px-2 text-center">Obtain</th>

                                    <th class="border-black border py-1 px-2 text-center">% Score</th>
                                </tr>
                                </thead>
                                <tbody class="text-black text-sm font-bold">
                                @foreach ($student->exam_marks as $stmrks)


                                    <tr class="border-b border-black border-gray-200 hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="border-black border py-1 px-1 text-centerr">
                                            {{ \Carbon\Carbon::parse($stmrks->created_at)->format('d-m-y') }}
                                        </td>

                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ $stmrks->fee_schedule?->course->name }}
                                        </td>


                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ $stmrks->teacher->name }}
                                        </td>


                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ $stmrks->test_taken_teacher_name->name }}
                                        </td>


                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ round($stmrks->obtain_marks,2) }}
                                        </td>


                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ round($stmrks->obtain_marks / 100 * 100,2) }}%
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        @endif




                        @if($student->notes->isNotEmpty())

                            <div class="text-center mt-2 mb-2 text-xl">
                                <span class="uppercase underline" style="font-weight: bold;">Official Remarks / Notes</span>
                            </div>
                            <table class="table-auto w-full border-collapse border border-black" style="font-size: 10px!important;">
                                <thead class="border-black" style="font-size: 12px!important;">
                                <tr class="bg-gray-200 text-black  text-sm font-bold">
                                    <th class="border-black border py-1 px-2 text-center">#</th>
                                    <th class="border-black border py-1 px-2 text-center">Date</th>
                                    <th class="border-black border py-1 px-2 text-center">User</th>
                                    <th class="border-black border py-1 px-2 text-center">Details</th>
                                </tr>
                                </thead>
                                <tbody class="text-black text-sm font-bold">
                                @foreach ($student->notes as $note)


                                    <tr class="border-b border-black border-gray-200 hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ \Carbon\Carbon::parse($note->created_at)->format('F jS, Y h:i:sa') }}
                                        </td>

                                        <td class="border-black border py-1 px-1 text-centerr">
                                            {{ $note->user->name }}
                                        </td>

                                        <td class="border-black border py-1 px-1 text-center">
                                            {!! $note->remarks !!}
                                        </td>

                                    </tr>
                                @endforeach

                                <tfoot>
                                </tfoot>
                            </table>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
