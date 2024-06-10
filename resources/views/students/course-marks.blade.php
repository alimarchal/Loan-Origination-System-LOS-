<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Assessments
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

                        @if($student->exam_marks->isNotEmpty())
                            <div class="relative overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal" style="background-color: #0f0161;color: #fff;">
                                        <th class="py-1 px-2 text-center">#</th>
                                        <th class="py-1 px-2 text-center">Date</th>
                                        <th class="py-1 px-2 text-center">Course</th>
                                        <th class="py-1 px-2 text-center">CLS Time</th>
                                        <th class="py-1 px-2 text-center">Tutor</th>
                                        <th class="py-1 px-2 text-center">Examiner</th>
                                        <th class="py-1 px-2 text-center">Theory</th>
                                        <th class="py-1 px-2 text-center">Prac/Viva</th>
                                        <th class="py-1 px-2 text-center">Ass/Att/Misc</th>
                                        <th class="py-1 px-2 text-center">Obtain</th>

                                        <th class="py-1 px-2 text-center">% Score</th>
                                        <th class="py-1 px-2 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                            </svg>

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($student->exam_marks as $stmrks)
                                        <tr class="border-b border-gray-200 hover:bg-yellow-100">

                                            <td class="py-1 px-2 text-center">
                                                {{ $loop->iteration }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ \Carbon\Carbon::parse($stmrks->created_at)->format('d-m-y') }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ $stmrks->fee_schedule?->course->name }}
                                            </td>

                                            @php
                                                // Parse the time using PHP's DateTime class
                                                $time_start = new DateTime($stmrks->student_class_start_time);
                                                $time_end = new DateTime($stmrks->student_class_end_time);
                                            @endphp

                                            <td class="py-1 px-2 text-center">
                                                {{ $time_start->format('ga') . '-' .$time_end->format('ga') }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ $stmrks->teacher->name }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ $stmrks->test_taken_teacher_name->name }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ $stmrks->theory }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ $stmrks->practical }} + {{ $stmrks->viva }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ $stmrks->assignment }} + {{ + $stmrks->attendance }} @if(!empty($stmrks->others)) + {{ $stmrks->others }} @endif
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ round($stmrks->obtain_marks,2) }}
                                            </td>



                                            <td class="py-1 px-2 text-center">
                                                {{ round($stmrks->obtain_marks / 100 * 100,2) }}%
                                            </td>

                                            <td class="py-1 px-2 text-left">
                                                @if(!empty($stmrks->attachment_path))
                                                    <a href="{{ \Illuminate\Support\Facades\Storage::url($stmrks->attachment_path) }}" download="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                                        </svg>
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>

                                    <tfoot>
{{--                                    <tr class="font-extrabold text-white">--}}
{{--                                        --}}{{--                                        <th scope="row" class="px-6 py-3 text-base text-right"></th>--}}
{{--                                        <th scope="row" class="px-6 py-3 text-base text-center" colspan="3">--}}

{{--                                            <form action="{{ route('admission.submit-schedule', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to submit this schedule?');" class="ml-2">--}}
{{--                                                @csrf--}}
{{--                                                <x-button class="ms-4 bg-green-700 hover:bg-green-800 mx-auto">--}}
{{--                                                    Submit Schedule--}}
{{--                                                </x-button>--}}
{{--                                            </form>--}}
{{--                                        </th>--}}
{{--                                        --}}{{--                                        <th scope="row" class="px-6 py-3 text-base text-right"></th>--}}
{{--                                        <th scope="row" class="px-6 py-3 bg-red-900  text-base text-right">Total</th>--}}
{{--                                        <td class="px-6 py-3 text-center bg-red-900 ">{{ number_format($stmrks->where('student_id',$student->id)->sum('fee_amount'),2) }}</td>--}}
{{--                                        <th scope="row" class="px-6 py-3  bg-red-900 text-base"></th>--}}
{{--                                        <td class="px-6 py-3 text-center bg-red-900 ">{{ number_format($stmrks->where('student_id',$student->id)->sum('fee_amount_after_due_date'),2) }}</td>--}}
{{--                                        <th scope="row" class="px-6 py-3  bg-red-900 text-base"></th>--}}
{{--                                    </tr>--}}
                                    </tfoot>
                                </table>
                            </div>
                        @endif


                        <x-validation-errors class="mb-4 mt-4"/>
                        <form method="POST" action="{{ route('admission.course-marks-store', $student->id) }}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to save this student assessment?');" class="px-6 mb-4 lg:px-8">
                            @csrf

                            <h1 class="text-xl text-center pt-3 font-bold text-red-600">*** Mark Assessment Carefully ***</h1>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-2 mt-4">

                                <div>
                                    <x-label for="fee_schedule_id" value="{{ __('Course Name') }}" class="pb-0.5" :required="true"/>
                                    <select name="fee_schedule_id" id="fee_schedule_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select student course</option>
                                        @foreach($student->fee_schedules->whereNotIn('course_id',[1,14,15])->where('status','Paid') as $st)
                                            <option value="{{ $st->id }}">{{ $st->course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="teacher_id" value="{{ __('Student Teacher Name') }}" class="pb-0.5" :required="true"/>
                                    <select name="teacher_id" id="teacher_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select teacher name</option>
                                        @foreach(\App\Models\User::all() as $st)
                                            <option value="{{ $st->id }}">{{ $st->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="student_class_start_time" value="{{ __('Student Class Start Time') }}" class="pb-0.5" :required="true"/>
                                    <select name="student_class_start_time" id="student_class_start_time" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select Class Start TIme</option>
                                        @foreach(\App\Models\InstituteClassTime::select('start_time')->distinct()->get() as $time)
                                            <option value="{{ \Carbon\Carbon::parse($time->start_time)->format('h:i:sa') }}">{{ \Carbon\Carbon::parse($time->start_time)->format('h:i:sa') }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="student_class_end_time" value="{{ __('Student Class End Time') }}" class="pb-0.5" :required="true"/>
                                    <select name="student_class_end_time" id="student_class_end_time" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select Class End TIme</option>
                                        @foreach(\App\Models\InstituteClassTime::select('start_time')->distinct()->get() as $time)
                                            <option value="{{ \Carbon\Carbon::parse($time->start_time)->format('h:i:sa') }}">{{ \Carbon\Carbon::parse($time->start_time)->format('h:i:sa') }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="theory" value="{{ __('Theory Marks') }}" class="pb-0.5" :required="true"/>
                                    <select name="theory" id="theory" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">None</option>
                                        @for($i = 0; $i <= 50; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>


                                <div>
                                    <x-label for="practical" value="{{ __('Practical') }}" class="pb-0.5" :required="true"/>
                                    <select name="practical" id="practical" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">None</option>
                                        @for($i = 0; $i <= 50; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>


                                <div>
                                    <x-label for="viva" value="{{ __('Viva') }}" class="pb-0.5" :required="true"/>
                                    <select name="viva" id="viva" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">None</option>
                                        @for($i = 0; $i <= 50; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>


                                <div>
                                    <x-label for="assignment" value="{{ __('Assignment') }}" class="pb-0.5" :required="true"/>
                                    <select name="assignment" id="assignment" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">None</option>
                                        @for($i = 0; $i <= 50; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>


                                <div>
                                    <x-label for="attendance" value="{{ __('Attendance') }}" class="pb-0.5" :required="true"/>
                                    <select name="attendance" id="attendance" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">None</option>
                                        @for($i = 0; $i <= 50; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>



                                <div>
                                    <x-label for="others" value="{{ __('Others') }}" class="pb-0.5" :required="true"/>
                                    <select name="others" id="others" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">None</option>
                                        @for($i = 1; $i <= 50; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>


                                <div>
                                    <x-label for="attachment" value="Attachment" />
                                    <x-input id="attachment" name="attachment" class="block mt-1 w-full" type="file"/>
                                </div>



                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150 ml-4">
                                    <span class="ml-1">Save Assessment</span>
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
            document.addEventListener('DOMContentLoaded', function () {
                const classSelect = document.getElementById('institute_class_id');
                const timeSelect = document.getElementById('institute_class_time_id');

                // Generate the base URL with a placeholder for the class ID
                const baseUrl = "{{ route('institute-class-time.get-class-time', ['instituteClassTime' => 'PLACEHOLDER']) }}";

            classSelect.onchange = function() {
            const classId = this.value;

            // Clear existing options except the first one
            timeSelect.length = 1;

            // Replace 'PLACEHOLDER' in the URL with the actual class ID
            const fetchUrl = baseUrl.replace('PLACEHOLDER', classId);

            // Fetch new class times if a class is selected
            if (classId) {
                fetch(fetchUrl)
                .then(response => response.json())
                .then(data => {
                    // Populate class timing select
                    data.forEach(function(item) {
                        let option = new Option(item.formatted_time, item.id);
                        timeSelect.add(option);
                    });
                })
                .catch(error => console.error('Error fetching class times:', error));
            }
            };
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
            $('#institute_class_id').change(function() {
                var instituteClassId = $(this).val();

                // Clear the institute_class_time_id select and initialize with the default option
                $('#institute_class_time_id').empty().append('<option value="">Select Class Time</option>');

                if (instituteClassId) {
                    // Make an AJAX request
                    $.ajax({
                        url: '/institute-class-time/' + instituteClassId, // Adjust the URL as needed
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                       //console.log("AJAX success, data received:", data); // Log the received data

                       $('#institute_class_time_id').empty().append('<option value="">Select Class Time</option>');
                       if (data && data.length > 0) {
                           $.each(data, function() {
                             // Extract hours and minutes
                           var startHour = parseInt(this.start_time.substring(11, 13));
                           var startMinute = this.start_time.substring(14, 16);
                           var endHour = parseInt(this.end_time.substring(11, 13));
                           var endMinute = this.end_time.substring(14, 16);

                           // Convert to 12-hour format and determine AM/PM
                           var startAmPm = startHour >= 12 ? 'PM' : 'AM';
                           var endAmPm = endHour >= 12 ? 'PM' : 'AM';
                           startHour = startHour % 12;
                           startHour = startHour ? startHour : 12; // Convert hour '0' to '12'
                           endHour = endHour % 12;
                           endHour = endHour ? endHour : 12; // Convert hour '0' to '12'

                           var startTime = (startHour < 10 ? '0' : '') + startHour + ':' + startMinute + startAmPm.toLowerCase();
                           var endTime = (endHour < 10 ? '0' : '') + endHour + ':' + endMinute + endAmPm.toLowerCase();

                           // Append each class time as an option
                           $('#institute_class_time_id').append('<option value="' + this.id + '">' + startTime + ' to ' + endTime + '</option>');
                       });
                       } else {
                           console.log("No class times available"); // Log if no data is available
                       }

                        $('#institute_class_time_id').select2();
                   },

                        error: function() {
                            console.log('Error fetching class times');
                        }
                    });
                }
            });
        });

        </script>

    @endpush
</x-app-layout>
