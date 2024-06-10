<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Issue Certificate
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

                        <x-validation-errors class="mb-4 mt-4 "/>
                        <form method="POST" action="{{ route('student.make-certificate', $student->id) }}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to make certificate?');" class="px-6 mb-4 lg:px-8">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 mt-4">

                                <div>
                                    <x-label for="branch_id" value="{{ __('Branch') }}"  :required="true" style="font-weight: bold;"/>
                                    <select name="branch_id" id="branch_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select branch</option>
                                        @foreach (\App\Models\Branch::where('status', 'active')->get() as $branch)
                                            <option value="{{ $branch->id }}" {{ old('branch_id', $student->branch_id) == $branch->id ? 'selected' : '' }}>{{ $branch->branch_custom_code }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="certificate_name" value="{{ __('Certificate Name') }}"  :required="true"/>
                                    <select name="certificate_name" id="certificate_name" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select certificate type</option>
                                        <option value="03 Months Computer Applications">03 Months Computer Applications</option>
                                        <option value="06 Months Computer Diploma Courses">06 Months Computer Diploma Courses</option>
                                        <option value="01 Year Computer Diploma Courses">01 Year Computer Diploma Courses</option>
                                        <option value="03 Months Spoken English Language Course">03 Months Spoken English Language Course</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="certificate_status" value="{{ __('Status') }}" :required="true"/>
                                    <select name="certificate_status" id="certificate_status" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select status</option>
                                        <option value="Only View">Only View (Your data will not be saved)</option>
                                        <option value="Issue Certificate">Issue Certificate</option>
                                    </select>
                                </div>


                                <div>
                                    <x-label for="comments" value="{{ __('Grade') }}" :required="true"/>
                                    <select name="comments" id="comments" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select grade</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="None">Does Not Need Computer Diploma</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="course_id" class="uppercase font-extrabold" value="{{ __('Course Taken By Student') }}" :required="true" />
                                    <select name="course_id[]" id="course_id" multiple="multiple" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        @foreach(\App\Models\FeeSchedule::where('student_id', $student->id)->whereNotIn('course_id',[1,14,15])->where('status','Paid')->get() as $cert)
                                            <option value="{{ $cert->course_id }}">{{ \App\Models\Course::find($cert->course_id)->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150 ml-4">
                                    <span class="ml-1">Save and Submit</span>
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
