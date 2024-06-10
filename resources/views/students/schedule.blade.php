<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Planner
        </h2>


        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">


                        @if($student->schedules->isNotEmpty())
                            <div class="relative overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-center">Branch</th>
                                        <th class="py-3 px-6 text-center">Class Time / Session</th>
                                        <th class="py-3 px-6 text-center">Course</th>
                                        <th class="py-3 px-6 text-center">Fee Date</th>
                                        <th class="py-3 px-6 text-center">Amount</th>
                                        <th class="py-3 px-6 text-center">Due Date</th>
                                        <th class="py-3 px-6 text-center">Late Fee</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($student->schedules as $course)
                                        <tr class="border-b border-gray-200 hover:bg-yellow-100">

                                            <td class="py-3 px-6 text-center">
                                                {{ $course->branch->branch_custom_code }}
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                {{ \Carbon\Carbon::parse($course->institute_class_time->start_time)->format('H:ia ') . ' to ' . \Carbon\Carbon::parse($course->institute_class_time->end_time)->format('H:i') }}
                                                <br>{{ \Carbon\Carbon::parse($course->session_year->start_year)->format('Y') . '-' . \Carbon\Carbon::parse($course->session_year->end_year)->format('Y')  }}
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                {{ $course->course->name }}
                                            </td>


                                            <td class="py-3 px-6 text-center">
                                                {{ \Carbon\Carbon::parse($course->issue_date)->format('d-M-y') }}
                                            </td>


                                            <td class="py-3 px-6 text-center">

                                                @if($course->is_discounted)
                                                    <span class="text-red-600 font-extrabold">{{ number_format($course->fee_amount,2) }}<sup>*<br>@if($course->discount_type == "FLAT")
                                                                F-{{ $course->discounted_number }} <br><span class="line-through">{{ \App\Models\Course::find($course->course_id)->amount }}</span>
                                                            @elseif($course->discount_type == "PERCENTAGE")
                                                                {{ $course->discounted_number }}%  <br><span class="line-through">{{ \App\Models\Course::find($course->course_id)->amount }}
                                                            @endif</sup></span>
                                                @else
                                                    {{ number_format($course->fee_amount,2) }}
                                                @endif
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                {{ \Carbon\Carbon::parse($course->due_date)->format('d-M-y') }}
                                            </td>


                                            <td class="py-3 px-6 text-center">
                                                {{ number_format($course->fee_amount_after_due_date,2) }}
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('schedule-cart.destroy', ['student' => $student->id, 'scheduleCart' => $course->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');"
                                                          class="ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                                            <svg class="w-4 h-4 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                    <tfoot>
                                    <tr class="font-extrabold text-white">
                                        {{--                                        <th scope="row" class="px-6 py-3 text-base text-right"></th>--}}
                                        <th scope="row" class="px-6 py-3 text-base text-center" colspan="3">

                                            <form action="{{ route('admission.submit-schedule', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to submit this schedule?');" class="ml-2">
                                                @csrf
                                                <x-button class="ms-4 bg-green-700 hover:bg-green-800 mx-auto">
                                                    Submit Schedule
                                                </x-button>
                                            </form>
                                        </th>
                                        {{--                                        <th scope="row" class="px-6 py-3 text-base text-right"></th>--}}
                                        <th scope="row" class="px-6 py-3 bg-red-900  text-base text-right">Total</th>
                                        <td class="px-6 py-3 text-center bg-red-900 ">{{ number_format($course->where('student_id',$student->id)->sum('fee_amount'),2) }}</td>
                                        <th scope="row" class="px-6 py-3  bg-red-900 text-base"></th>
                                        <td class="px-6 py-3 text-center bg-red-900 ">{{ number_format($course->where('student_id',$student->id)->sum('fee_amount_after_due_date'),2) }}</td>
                                        <th scope="row" class="px-6 py-3  bg-red-900 text-base"></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif


                        <x-validation-errors class="mb-4 mt-4"/>
                        <form method="POST" action="{{ route('admission-student.generate-schedule-cart', $student->id) }}" class="px-6 mb-4 lg:px-8">
                            @csrf

                            <h1 class="text-xl text-center pt-3 font-bold text-red-600">*** Caution! Important Section Generate Carefully ***</h1>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 mt-4">


                                <div>
                                    <x-label for="session_year_id" value="{{ __('Session Year') }}" class="pb-0.5" :required="true"/>
                                    <select name="session_year_id" id="session_year_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select session year</option>
                                        @foreach(\App\Models\SessionYear::all() as $st)
                                            <option
                                                value="{{ $st->id }}" {{ old('status_id', $student->sessionYear->session_year_id ?? '') == $st->id ? 'selected' : '' }}>{{ \Carbon\Carbon::parse($st->start_year)->format('Y-') . \Carbon\Carbon::parse($st->end_year)->format('Y') }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="course_selection" value="{{ __('Schedule / Course') }}" class="pb-0.5" :required="true"/>
                                    <select name="course_selection" id="course_selection"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select Course/Certificate</option>

                                        @foreach (\App\Models\CertificateCategory::where('status', 1)->get() as $crs)
                                            <option value="{{ $crs->id }}" {{ old('course_selection') == $crs->id ? 'selected' : '' }}>{{ $crs->name }}</option>
                                        @endforeach

                                        @foreach (\App\Models\Course::where('status', 1)->get() as $crs)
                                            <option value="{{ $crs->name }}" {{ old('course_selection') == $crs->id ? 'selected' : '' }}>{{ $crs->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="fine_discount_category_id" value="{{ __('Discount Category') }}" class="pb-0.5" :required="true"/>
                                    <select name="fine_discount_category_id" id="fine_discount_category_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select discount category</option>
                                        @foreach (\App\Models\FineDiscountCategory::where('type','Discount')->orderBy('name','DESC')->get() as $df)
                                            <option value="{{ $df->id }}" @if($df->id == 5) selected @endif>{{ $df->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="discounted_number" value="{{ __('Discount') }}" :required="true"/>
                                    <x-input id="discounted_number" class="block mt-1 w-full" type="number" min="0" step="0.01" name="discounted_number" value="{{ old('discounted_number','0.00') }}" required/>
                                </div>

                                <div>
                                    <x-label for="teacher_id" value="{{ __('Select teacher name') }}" class="pb-0.5" :required="true"/>
                                    <select name="teacher_id" id="teacher_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select teacher name</option>
                                        @foreach(\App\Models\User::all() as $st)
                                            <option value="{{ $st->id }}">{{ $st->name }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <div>
                                    <x-label for="branch_id" value="{{ __('Branch') }}"/>
                                    <select name="filter[branch_id]" id="branch_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select a branch</option>
                                        @foreach (\App\Models\Branch::all() as $branch)
                                            <option value="{{ $branch->id }}" {{ request('filter.branch_id') == $branch->id ? 'selected' : '' }}>
                                                {{ $branch->branch_custom_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="institute_class_id" value="{{ __('Lab / Class') }}" class="pb-0.5" :required="false"/>
                                    <select name="institute_class_id" id="institute_class_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select Lab/Class</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="institute_class_time_id" value="{{ __('Class Time Starts') }}" class="pb-0.5" :required="false"/>
                                    <select name="institute_class_time_id" id="institute_class_time_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select Class Time</option>
                                    </select>
                                </div>


                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 mt-4">






                                <div>
                                    <x-label for="issue_date" value="{{ __('Registration Date') }}" :required="true"/>
                                    <x-input id="issue_date" class="block mt-1 w-full" type="date" name="issue_date" min="{{ date('Y-m-d') }}" value="{{ old('issue_date') }}" required/>
                                </div>


                                <div>
                                    <x-label for="class_joining_date" value="{{ __('Class Joining Date') }}" :required="true"/>
                                    <x-input id="class_joining_date" class="block mt-1 w-full" type="date" name="class_joining_date" min="{{ date('Y-m-d') }}" value="{{ old('issue_date') }}" required/>
                                </div>

                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150 ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path
                                            d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 0 1-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 0 1 6.126 3.537ZM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 0 1 0 .75l-1.732 3c-.229.397-.76.5-1.067.161A5.23 5.23 0 0 1 6.75 12a5.23 5.23 0 0 1 1.37-3.536ZM10.878 17.13c-.447-.098-.623-.608-.394-1.004l1.733-3.002a.75.75 0 0 1 .65-.375h3.465c.457 0 .81.407.672.842a5.252 5.252 0 0 1-6.126 3.539Z"/>
                                        <path fill-rule="evenodd"
                                              d="M21 12.75a.75.75 0 1 0 0-1.5h-.783a8.22 8.22 0 0 0-.237-1.357l.734-.267a.75.75 0 1 0-.513-1.41l-.735.268a8.24 8.24 0 0 0-.689-1.192l.6-.503a.75.75 0 1 0-.964-1.149l-.6.504a8.3 8.3 0 0 0-1.054-.885l.391-.678a.75.75 0 1 0-1.299-.75l-.39.676a8.188 8.188 0 0 0-1.295-.47l.136-.77a.75.75 0 0 0-1.477-.26l-.136.77a8.36 8.36 0 0 0-1.377 0l-.136-.77a.75.75 0 1 0-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 0 0-1.3.75l.392.678a8.29 8.29 0 0 0-1.054.885l-.6-.504a.75.75 0 1 0-.965 1.149l.6.503a8.243 8.243 0 0 0-.689 1.192L3.8 8.216a.75.75 0 1 0-.513 1.41l.735.267a8.222 8.222 0 0 0-.238 1.356h-.783a.75.75 0 0 0 0 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 0 0 .513 1.41l.735-.268c.197.417.428.816.69 1.191l-.6.504a.75.75 0 0 0 .963 1.15l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 0 0 1.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.77a.75.75 0 0 0 1.477.261l.137-.772a8.332 8.332 0 0 0 1.376 0l.136.772a.75.75 0 1 0 1.477-.26l-.136-.771a8.19 8.19 0 0 0 1.294-.47l.391.677a.75.75 0 0 0 1.3-.75l-.393-.679a8.29 8.29 0 0 0 1.054-.885l.601.504a.75.75 0 0 0 .964-1.15l-.6-.503c.261-.375.492-.774.69-1.191l.735.267a.75.75 0 1 0 .512-1.41l-.734-.267c.115-.439.195-.892.237-1.356h.784Zm-2.657-3.06a6.744 6.744 0 0 0-1.19-2.053 6.784 6.784 0 0 0-1.82-1.51A6.705 6.705 0 0 0 12 5.25a6.8 6.8 0 0 0-1.225.11 6.7 6.7 0 0 0-2.15.793 6.784 6.784 0 0 0-2.952 3.489.76.76 0 0 1-.036.098A6.74 6.74 0 0 0 5.251 12a6.74 6.74 0 0 0 3.366 5.842l.009.005a6.704 6.704 0 0 0 2.18.798l.022.003a6.792 6.792 0 0 0 2.368-.004 6.704 6.704 0 0 0 2.205-.811 6.785 6.785 0 0 0 1.762-1.484l.009-.01.009-.01a6.743 6.743 0 0 0 1.18-2.066c.253-.707.39-1.469.39-2.263a6.74 6.74 0 0 0-.408-2.309Z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <span class="ml-1">Generate</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        <script>
            // Ajax Code For Timing

            $(document).ready(function() {
                $('#branch_id').change(function() {
                    var branchId = $(this).val();
                    // Clear existing options
                    $('#institute_class_id').html('<option value="">Select Lab/Class</option>');
                    $('#institute_class_time_id').html('<option value="">Select Class Time</option>');


                    if (branchId) {
                        // AJAX request to get labs/classes based on branch
                        $.ajax({
                            url: '/get-labs/' + branchId,
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                response.forEach(function(lab) {
                                    $('#institute_class_id').append('<option value="' + lab.id + '">' + lab.name + '</option>');
                                });
                            },
                            error: function() {
                                alert('Error loading labs/classes.');
                            }
                        });

                        // Change handler for the lab/class dropdown to load times
                        $('#institute_class_id').change(function() {
                            var classId = $(this).val();
                            $('#institute_class_time_id').html('<option value="">Select Class Time</option>');

                            if (classId) {
                                $.ajax({
                                    url: '/get-class-times/' + classId,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(response) {
                                        response.forEach(function(time) {

                                            // Create Date objects from the start_time and end_time strings
                                            var startTime = new Date(time.start_time);
                                            var endTime = new Date(time.end_time);

                                            // Format start time
                                            var startHours = startTime.getHours();
                                            var startAmPm = startHours >= 12 ? 'PM' : 'AM';
                                            startHours = startHours % 12;
                                            startHours = startHours ? startHours : 12; // the hour '0' should be '12'
                                            var displayStartTime = startHours + startAmPm;

                                            // Format end time
                                            var endHours = endTime.getHours();
                                            var endAmPm = endHours >= 12 ? 'PM' : 'AM';
                                            endHours = endHours % 12;
                                            endHours = endHours ? endHours : 12; // the hour '0' should be '12'
                                            var displayEndTime = endHours + endAmPm;

                                            // Format the display string
                                            var displayTimeRange = displayStartTime + ' to ' + displayEndTime;

                                            // Append to the dropdown
                                            $('#institute_class_time_id').append('<option value="' + time.id + '">' + displayTimeRange + '</option>');

                                            //
                                            // $('#institute_class_time_id').append('<option value="' + time.id + '">' + time.start_time + time.end_time + '</option>');
                                        });
                                    },
                                    error: function() {
                                        alert('Error loading class times.');
                                    }
                                });
                            }
                        });
                    }
                });
            });

            // End Ajax Code For Timing


        </script>
    @endpush
</x-app-layout>
