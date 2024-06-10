<x-app-layout>
{{--    @push('header')--}}
{{--        <style>--}}
{{--            @media print {--}}
{{--                body * {--}}
{{--                    visibility: hidden; /* Hide everything in the body by default */--}}
{{--                }--}}

{{--                .receipt-modal-content, .receipt-modal-content * {--}}
{{--                    visibility: visible; /* Ensure the receipt content is visible */--}}
{{--                }--}}

{{--                .receipt-modal-content {--}}
{{--                    position: absolute;--}}
{{--                    left: 0;--}}
{{--                    top: 0;--}}
{{--                    width: 100%; /* Adjust as needed */--}}
{{--                    margin: 0;--}}
{{--                    padding: 20px; /* Adjust padding as needed for the print */--}}
{{--                    font-size: 12pt; /* Larger font for better readability */--}}
{{--                }--}}

{{--                /* Optional: Adjust the print size and margin */--}}
{{--                @page {--}}
{{--                    size: auto; /* auto is the initial value */--}}
{{--                    margin: 0mm; /* this affects the margin in the printer settings */--}}
{{--                }--}}
{{--            }--}}
{{--        </style>--}}

{{--    @endpush--}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Invoicing
        </h2>


        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-0 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <x-validation-errors class="mb-4 mt-4"/>
                        {{--                        <h1 class="text-xl text-center pt-3 font-bold text-red-600">Overview of Current and Future Student Fee Schedules</h1>--}}
                        @if($student->fee_schedules->isNotEmpty())
                            <div class="relative overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-black  text-sm font-bold" style="background-color: #0f0161;color: #fff;">
                                        <th class="py-1 px-2 text-center">Info</th>
                                        <th class="py-1 px-2 text-center">Course</th>
                                        <th class="py-1 px-2 text-center">Fee Date</th>
                                        <th class="py-1 px-2 text-center">Amount</th>
                                        <th class="py-1 px-2 text-center">Due Date</th>
                                        <th class="py-1 px-2 text-center">Late Fee</th>
                                        <th class="py-1 px-2 text-center">Paid Amount</th>
                                        <th class="py-1 px-2 text-center">Date</th>
                                        <th class="py-1 px-2 text-center">DPD</th>
                                        <th class="py-1 px-2 text-center">Status</th>
                                        <th class="py-1 px-2 text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($student->fee_schedules as $fee_schedule)
                                        <tr class="border-b border-gray-200 hover:bg-yellow-100">

                                            <td class="py-1 px-2 text-center">

                                                @if(in_array($fee_schedule->course_id, [1, 14, 15]))
                                                    {{-- Your code here to execute if the condition is true --}}
                                                @else
                                                    {{ $fee_schedule->branch->id }}/{{ \Carbon\Carbon::parse($fee_schedule->institute_class_time->start_time)->format('H') . '-' . \Carbon\Carbon::parse($fee_schedule->institute_class_time->end_time)->format('Ha') }}
                                                @endif


                                                {{--                                                {{ \Carbon\Carbon::parse($fee_schedule->session_year->start_year)->format('Y') . '-' . \Carbon\Carbon::parse($fee_schedule->session_year->end_year)->format('Y')  }}--}}
                                            </td>

                                            <td class="py-1 px-2 text-left">
                                                {{ $fee_schedule->course->name }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ \Carbon\Carbon::parse($fee_schedule->issue_date)->format('d-m-y') }}
                                            </td>


                                            <td class="py-1 px-2 text-center">

                                                @if($fee_schedule->is_discounted)
                                                    <span class="text-red-600 font-extrabold">{{ number_format($fee_schedule->fee_amount,2) }}<sup>*<br>@if($fee_schedule->discount_type == "FLAT")
                                                                F-{{ $fee_schedule->discounted_number }} <br><span class="line-through">{{ \App\Models\Course::find($fee_schedule->course_id)->amount }}</span>
                                                            @elseif($fee_schedule->discount_type == "PERCENTAGE")
                                                                {{ $fee_schedule->discounted_number }}%  <br><span class="line-through">{{ \App\Models\Course::find($fee_schedule->course_id)->amount }}
                                                            @endif</sup></span>
                                                @else
                                                    {{ number_format($fee_schedule->fee_amount,2) }}
                                                @endif
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \Carbon\Carbon::parse($fee_schedule->due_date)->format('d-m-y') }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ number_format($fee_schedule->fee_amount_after_due_date,2) }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ number_format($fee_schedule->payment_amount,2) }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                @if(!empty($fee_schedule->payment_date))
                                                    {{ \Carbon\Carbon::parse($fee_schedule->payment_date)->format('d-M-Y') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>


                                            <td class="py-1 px-2 text-center @if($fee_schedule->day_pass_overdue > 0) bg-red-800 text-white font-extrabold @endif">
                                                {{ number_format($fee_schedule->day_pass_overdue,0) }}
                                            </td>

                                            <td class="py-1 px-2 text-center @if($fee_schedule->status == "Un-Paid") bg-red-300 @elseif($fee_schedule->status == "Canceled") bg-yellow-400 @else bg-green-400 @endif">
                                                {{ $fee_schedule->status }}




                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                <div class="flex item-center justify-center">
                                                    <!-- Delete Button -->



                                                    <a href="javascript:;" class="inline-block mr-1 viewReceiptBtn" data-receipt-id="receiptModal-{{ $fee_schedule->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z"></path>
                                                        </svg>
                                                    </a>

                                                    @if($fee_schedule->status == "Paid")
                                                        @if(!empty($fee_schedule->payment_scanned_path))
                                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($fee_schedule->payment_scanned_path) }}" download="" class="inline-block mr-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                                            </svg>
                                                        </a>
                                                        @endif
                                                    @endif



                                                    <!-- Receipt Modal -->
                                                    <div id="receiptModal-{{ $fee_schedule->id }}" class="fixed inset-0 hidden z-10 overflow-y-auto">
                                                        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                                            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

                                                            <!-- Modal content -->
                                                            <div class="receipt-modal-content inline-block overflow-hidden print:shadow-none text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                                                                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                                                    <h3 class="text-sm font-extrabold leading-6 text-black text-center" style="border: 2px dashed black!important;">


{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">--}}
{{--                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />--}}
{{--                                                                        </svg>--}}

                                                                        {{ $student->branch->name }}

                                                                        {{ $student->branch->address }}, {{ $student->branch->city }}, {{ $student->branch->country }} - {{ \App\Models\Branch::find($fee_schedule->branch_id)->branch_custom_code }}<br>
                                                                        Telephone Office: {{ $student->branch->telephone }}
                                                                    </h3>
{{--                                                                    <span class="uppercase text-center"> Challan / Receipt #: {{ $fee_schedule->id }}</span>--}}
                                                                        <h3 class="text-sm font-extrabold leading-6 text-black text-center">
                                                                            <span class="uppercase text-center"> Challan / Receipt #: {{ $fee_schedule->id }}</span><br>
                                                                        </h3>

                                                                        <h3 class="text-sm font-extrabold leading-6 text-black text-center">
                                                                            <span class="uppercase text-center"> Issue Date #: {{ \Carbon\Carbon::parse($fee_schedule->issue_date)->format('d-M-Y H:i:s') }}</span>
                                                                        </h3>
                                                                    <hr style="border: 1px solid black!important;">
                                                                        <p class="mt-2 text-lg text-black">
                                                                            Student Name: <strong>{{ $student->gender == 'Male' ? 'Mr.' : 'Ms.' }} {{ $student->firstname . ' ' . $student->lastname }}</strong><br>
                                                                            Course: <strong>{{ $fee_schedule->course->name }}</strong><br>
                                                                            Fee Amount: <strong>Rs.{{ number_format($fee_schedule->fee_amount, 2) }}</strong><br>
                                                                            Due Date: <strong>{{ \Carbon\Carbon::parse($fee_schedule->due_date)->format('d-m-Y') }}</strong><br>
                                                                            Fee After Due Date: <strong>Rs.{{ number_format($fee_schedule->fee_amount_after_due_date, 2) }}</strong><br>
                                                                        </p>

                                                                    <h3 class="text-lg mt-1 font-extrabold leading-6 text-black text-center" style="border: 1px solid black!important;">
                                                                        Payment Status: {{ $fee_schedule->status }}

                                                                    </h3>


                                                                    @if($fee_schedule->status == "Paid")
                                                                        <p class="text-lg font-extrabold leading-6 text-black text-left p-2" style="border: 1px dashed black!important;">
                                                                            <span class="text-left"> Payment Date: {{ \Carbon\Carbon::parse($fee_schedule->payment_date)->format('d-M-Y H:i:s') }}</span><br>
                                                                            <span class="text-left"> Amount: Rs.{{ number_format($fee_schedule->payment_amount,2) }}</span><br>
                                                                            <span class="text-left capitalize"> In Words: {{ Number::spell($fee_schedule->payment_amount) }} only</span><br>
                                                                            <span class="text-left capitalize"> Fee Received By: {{ \App\Models\User::find($fee_schedule->fee_collected_by_id)->name }}</span><br>
                                                                            <span class="text-left capitalize"> Comments: {{ $fee_schedule->comments }}</span><br>
{{--                                                                            <span class="text-left capitalize"> <img src="{{ url('icons-images/paidstamp.png') }}" class="w-32" alt=""></span>--}}
                                                                        </p>

                                                                        <p class="text-sm font-extrabold leading-6 text-black text-center p-2">
                                                                            This is computer generated receipt and does not need signature or stamp.
                                                                        </p>
                                                                    <p style="margin-left: 37%; margin-top: 5px;">
                                                                        @php $qrcode_data = "Payment Date: " . \Carbon\Carbon::parse($fee_schedule->payment_date)->format('d-M-Y H:i:s') . "\n" . "Amount: Rs." . number_format($fee_schedule->payment_amount,2) . "\nReceipt No: " . $fee_schedule->id ; @endphp
                                                                            {!! DNS2D::getBarcodeSVG($qrcode_data, 'QRCODE',3,3) !!}
                                                                        @endif
                                                                    </p>
{{--                                                                    <h3 class="text-lg font-extrabold leading-6 text-black text-center" style="border: 2px solid black!important;">--}}
{{--                                                                        Status: {{ $fee_schedule->status }}--}}
{{--                                                                    </h3>--}}


                                                                    <div class="sm:flex sm:items-start">
                                                                        <div class="mt-0 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                            <p class="mt-0 text-lg text-black">
{{--                                                                                Student Name: <strong>{{ $student->gender == 'Male' ? 'Mr.' : 'Ms.' }} {{ $student->firstname . ' ' . $student->lastname }}</strong><br>--}}
{{--                                                                                Course: <strong>{{ $fee_schedule->course->name }}</strong><br>--}}
{{--                                                                                Fee Amount: <strong>Rs.{{ number_format($fee_schedule->fee_amount, 2) }}</strong><br>--}}
{{--                                                                                Due Date: <strong>{{ \Carbon\Carbon::parse($fee_schedule->due_date)->format('d-m-Y') }}</strong><br>--}}
{{--                                                                                Fee After Due Date: <strong>Rs.{{ number_format($fee_schedule->fee_amount_after_due_date, 2) }}</strong><br>--}}
                                                                            </p>
                                                                            <div class="mt-1">
                                                                                <p class="mt-1 text-lg text-black">

                                                                                </p>
                                                                                <!-- Additional details -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse print:hidden">
                                                                    <button onclick="window.print();" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                        Print
                                                                    </button>
                                                                    <button type="button" class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                        Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    @if($fee_schedule->status == "Un-Paid" )

                                                        <div id="modal-{{$fee_schedule->id }}" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
                                                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                                    <form method="POST" action="{{ route('admission.pay-fee', [$student->id, $fee_schedule->id]) }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                                                Payment Information
                                                                            </h3>
{{--                                                                            <div class="mt-2">--}}
{{--                                                                                <input type="date" required name="date" id="payment-date" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Payment Date">--}}
{{--                                                                            </div>--}}


                                                                            <div class="pt-2">
                                                                                <select name="teacher_id" id="teacher_id_{{ $fee_schedule->id }}" required class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                                                    <option value="">Select a teacher</option>
                                                                                    @foreach(\App\Models\User::where('branch_id',$fee_schedule->branch_id)->get() as $user)
                                                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                            </div>


                                                                            <div class="mt-2">
                                                                                <input type="number" required id="paid-amount" name="payment_amount" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Amount">
                                                                            </div>

                                                                            <div class="mt-2">
                                                                                <input type="text" id="comments" name="comments" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Any comments">
                                                                            </div>

                                                                            <div class="mt-2">
                                                                                <input type="file" id="scanned-copy" name="scanned_receipts">
                                                                            </div>
                                                                        </div>
                                                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                            <button id="submit-payment" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                                Submit
                                                                            </button>
                                                                            <button id="cancel-payment-{{$fee_schedule->id }}"
                                                                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                                Cancel
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button  id="open-modal-{{$fee_schedule->id }}" class="inline-flex items-center px-1 py-1 bg-blue-800 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                                            </svg>
                                                        </button>
                                                        <form action="{{ route('admission.fee-destroy', [ 'feeSchedule' => $fee_schedule->id, 'student' => $student->id,]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="inline-flex items-center px-1 py-1 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                                                <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                    <tfoot>
                                    <tr class="font-extrabold text-white bg-black">
                                        <th scope="row" class="px-2 py-1 text-base text-center" colspan="3">Total</th>
                                        <td class="px-2 py-1 text-center">{{ number_format($student->fee_schedules->sum('fee_amount'),2) }}</td>
                                        <th scope="row" class="px-2 py-1 text-base"></th>
                                        <td class="px-2 py-1 text-center">{{ number_format($student->fee_schedules->sum('fee_amount_after_due_date'),2) }}</td>
                                        <td class="px-2 py-1 text-center">{{ number_format($student->fee_schedules->sum('payment_amount'),2) }}</td>
                                        <th scope="row" class="px-2 py-1 text-right bg-yellow-700" colspan="2">Student Balance: </th>
                                        <td class="px-2 py-1 text-center bg-yellow-700" colspan="2">{{ $student->student_balance->sum('balance') }}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
        <script>
            // Handle opening and closing modals
            const openModalButtons = document.querySelectorAll('button[id^="open-modal-"]');
            const cancelPaymentButtons = document.querySelectorAll('button[id^="cancel-payment-"]');

            openModalButtons.forEach(button => {
                const id = button.id.replace('open-modal-', '');
                button.addEventListener('click', () => {
                    document.getElementById(`modal-${id}`).style.display = 'block';
                });
            });

            cancelPaymentButtons.forEach(button => {
                const id = button.id.replace('cancel-payment-', '');
                button.addEventListener('click', event => {
                    event.preventDefault();
                    document.getElementById(`modal-${id}`).style.display = 'none';
                });
            });

            document.querySelectorAll('div[id^="modal-"]').forEach(modal => {
                modal.addEventListener('click', event => {
                    if (event.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            });

            // Submission logic with confirmation and form validation
            document.querySelectorAll('button[id^="submit-payment"]').forEach(button => {
                button.addEventListener('click', event => {
                    event.preventDefault();

                    const form = button.closest('form');
                    if (form && form.checkValidity()) {
                        const confirmed = confirm("Are you sure you want to submit the fee?");
                        if (confirmed) {
                            form.submit();
                        }
                    } else {
                        // If the form is not valid, let the browser show the validation messages
                        // Trigger the form's validation
                        form.reportValidity();
                    }
                });
            });

            // Close modals with Escape key
            document.addEventListener('keydown', event => {
                if (event.key === 'Escape') {
                    document.querySelectorAll('div[id^="modal-"]').forEach(modal => {
                        modal.style.display = 'none';
                    });
                }
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Open modal
                document.querySelectorAll('.viewReceiptBtn').forEach(button => {
                    button.addEventListener('click', () => {
                        const receiptId = button.getAttribute('data-receipt-id');
                        document.getElementById(receiptId).classList.remove('hidden');
                    });
                });

                // Close modal
                document.querySelectorAll('.closeModal').forEach(button => {
                    button.addEventListener('click', () => {
                        button.closest('.fixed').classList.add('hidden');
                    });
                });

                document.querySelectorAll('.printReceiptBtn').forEach(button => {
                    button.addEventListener('click', () => {
                        const receiptContent = button.closest('.receipt-modal-content');
                        const printWindow = window.open('', '_blank');
                        printWindow.document.write('<html><head><title>Print Receipt</title>');
                        printWindow.document.write('<link rel="stylesheet" href="path_to_your_stylesheet.css" type="text/css">'); // Optional: Include your stylesheet for the print version
                        printWindow.document.write('</head><body>');
                        printWindow.document.write(receiptContent.innerHTML);
                        printWindow.document.write('</body></html>');
                        printWindow.document.close();
                        printWindow.print();
                    });
                });


            });
        </script>

    @endpush
</x-app-layout>
