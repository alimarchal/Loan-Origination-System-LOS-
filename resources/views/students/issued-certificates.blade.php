<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Issued Certificates
        </h2>


        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4"/>
                <div class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
{{--                    pb-4 lg:pb-4   --}}
                    @include('tabs')
                    <div class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        @if($student->issued_certificates->isNotEmpty())
                            <div class="relative overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal" >
                                        <th class="py-1 px-2 text-center">#</th>
                                        <th class="py-1 px-2 text-center">Br Code</th>
                                        <th class="py-1 px-2 text-center">Date</th>
                                        <th class="py-1 px-2 text-center">Certificate Name</th>
                                        <th class="py-1 px-2 text-center">Registration No</th>
                                        <th class="py-1 px-2 text-center">Issued By</th>
                                        <th class="py-1 px-2 text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($student->issued_certificates as $cert)
                                        <tr class="border-b border-gray-200 hover:bg-yellow-100">

                                            <td class="py-1 px-2 text-center">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \App\Models\Branch::find($cert->branch_id)->branch_custom_code }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \Carbon\Carbon::parse($cert->date_of_issue)->format('d-m-Y') }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ $cert->certificate_name }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ $cert->registration_no }}
                                            </td>


                                            <td class="py-1 px-2 text-center">
                                                {{ \App\Models\User::find($cert->user_id)->name }}
                                            </td>

                                            <td class="py-1 px-2 text-center">

                                                @if($cert->certificate_name === "03 Months Computer Applications")
                                                    <a href="javascript:;" onclick="openPopup('{{ route('student.certificate-show-3-months-cp', [$student->id, 'cid' => encrypt($cert->id)]) }}')" class="inline-flex items-center px-0.5 py-0.5 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                        </svg>
                                                    </a>

                                                @elseif($cert->certificate_name === "06 Months Computer Diploma Courses")
                                                        <a href="javascript:;" onclick="openPopup('{{ route('student.six_cp_diploma', [$student->id, 'cid' => encrypt($cert->id)]) }}')" class="inline-flex items-center px-0.5 py-0.5 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                            </svg>
                                                        </a>
                                                @elseif($cert->certificate_name === "01 Year Computer Diploma Courses")
                                                    <a href="javascript:;" onclick="openPopup('{{ route('student.certificate-show-one-year-cp-diploma', [$student->id, 'cid' => encrypt($cert->id)]) }}')" class="inline-flex items-center px-0.5 py-0.5 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                        </svg>
                                                    </a>
                                                @elseif($cert->certificate_name === "03 Months Spoken English Language Course")
                                                    <a href="javascript:;" onclick="openPopup('{{ route('student.three_month_english_certificate', [$student->id, 'cid' => encrypt($cert->id)]) }}')" class="inline-flex items-center px-0.5 py-0.5 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                        </svg>
                                                    </a>
                                                @endif

                                                <script>
                                                    function openPopup(url) {
                                                        const width = 1130;
                                                        const height = 1000;
                                                        const left = (screen.width - width) / 2;
                                                        const top = (screen.height - height) / 2;
                                                        const features = `width=${width},height=${height},left=${left},top=${top},scrollbars=yes,resizable=yes`;

                                                        const popup = window.open(url, 'Certificate', features);
                                                        popup.focus();
                                                    }
                                                </script>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
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
