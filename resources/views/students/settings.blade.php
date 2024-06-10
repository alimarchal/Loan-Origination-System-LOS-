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


                        @if($student->teachers->isNotEmpty())
                            <div class="relative overflow-x-auto">
                                <table class="w-full table-auto" >
                                    <thead>
                                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal" style="background-color: #0f0161;color: #fff;">
                                        <th class="px-2 py-2 text-center">Teacher</th>
                                        <th class="px-2 py-2 text-center">Branch</th>
                                        <th class="px-2 py-2 text-center">Category</th>
                                        <th class="px-2 py-2 text-center">Class Start Time</th>
                                        <th class="px-2 py-2 text-center">Class End Time</th>
                                        <th class="px-2 py-2 text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($get_teachers_students as $ts)
                                        <tr class="border-b border-gray-200 hover:bg-yellow-100">
                                            <!-- Your existing table row content -->
                                            <td class="py-2 px-2 text-center">
                                                {{ \App\Models\User::find($ts->teacher_id)->name}}
{{--                                                {{ $teacher->name }} (ID: {{ $teacher->id }})--}}
                                            </td>
                                            <td class="py-2 px-2 text-center">
                                                {{ \App\Models\Branch::find($ts->branch_id)->branch_custom_code }}
{{--                                                {{ $teacher->branch->branch_custom_code ?? 'N/A' }}--}}
                                            </td>
                                            <td class="py-2 px-2 text-center">
                                                {{ $ts->course_selection }}
{{--                                                {{ $teacher->pivot->course_selection ?? 'N/A' }}--}}
                                            </td>
                                            <td class="py-2 px-2 text-center">
                                                {{ $ts->class_start_time }}
{{--                                                {{ $teacher->pivot->class_start_time ?? 'N/A' }}--}}
                                            </td>
                                            <td class="py-2 px-2 text-center">
                                                {{ $ts->class_end_time }}
{{--                                                {{ $teacher->pivot->class_end_time ?? 'N/A' }}--}}
                                            </td>
                                            <td class="py-0.5 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('student.settings_destroy', ['student' => $student->id, 'teacherStudent' => $ts->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="inline-flex items-center px-2 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        @endif


                        <x-validation-errors class="mb-4 mt-4"/>
                        <form method="POST" action="{{ route('student.settings_store', $student->id) }}" class="px-6 mb-4 lg:px-8">
                            @csrf

                            <h1 class="text-xl text-center pt-3 font-bold text-red-600">***Settings***</h1>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-2 mt-4">


                                <div>
                                    <x-label for="teacher_id" value="{{ __('Select teacher name') }}" :required="true"/>
                                    <select name="teacher_id" id="teacher_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select teacher name</option>
                                        @foreach(\App\Models\User::all() as $st)
                                            <option value="{{ $st->id }}">{{ $st->name }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <div>
                                    <x-label for="branch_id" value="{{ __('Branch') }}" :required="true"/>
                                    <select name="branch_id" id="branch_id"
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
                                    <x-label for="institute_class_id" value="{{ __('Lab / Class') }}" class="pb-0.5" :required="true"/>
                                    <select name="institute_class_id" id="institute_class_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select Lab/Class</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="institute_class_time_id" value="{{ __('Class Time Starts') }}" class="pb-0.5" :required="true"/>
                                    <select name="institute_class_time_id" id="institute_class_time_id"
                                            class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select Class Time</option>
                                    </select>
                                </div>


                                <div>
                                    <x-label for="course_selection" value="{{ __('Select a Course Category') }}" :required="true"/>
                                    <select name="course_selection" id="course_selection" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select a course category</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Fast Track">Fast Track</option>
                                        <option value="Crash Program">Crash Program</option>
                                    </select>
                                </div>


                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                                    Add
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
