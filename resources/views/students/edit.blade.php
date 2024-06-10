<x-app-layout>
    @push('header')
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            {{ $student->gender === 'Male' ? 'Mr.' : ($student->gender === 'Female' ? 'Miss' : '') }}
            {{ $student->firstname . ' ' . $student->lastename }} - {{ $student->id }}
            ::
            <span class="text-red-700 font-extrabold">Contact: {{ $student->mobile_number_for_sms_alert }} / {{ $student->guardian_emergency_contact }}</span>
        </h2>

        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-validation-errors class="mb-4 mt-4" />
                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

                        <form method="POST" action="{{ route('admission.update', $student->id) }}" enctype="multipart/form-data">
{{--                        <form method="POST" action="#" enctype="multipart/form-data">--}}
                            @csrf
                            @method('PUT') {{-- Use PUT or PATCH for update operations --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <div>
                                    <x-label for="branch_id" value="{{ __('Branch') }}" :required="true" />
                                    <select name="branch_id" id="branch_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select branch</option>
                                        @foreach (\App\Models\Branch::where('status', 'active')->get() as $branch)
                                            <option value="{{ $branch->id }}" {{ old('branch_id', $student->branch_id) == $branch->id ? 'selected' : '' }}>{{ $branch->branch_custom_code }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Repeat for other fields --}}
                                <div>
                                    <x-label for="firstname" value="{{ __('First Name') }}" :required="true" />
                                    <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" value="{{ old('firstname', $student->firstname) }}" required autofocus />
                                </div>

                                <div>
                                    <x-label for="lastname" value="{{ __('Last Name') }}" :required="true" />
                                    <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{ old('lastname', $student->lastname) }}" required />
                                </div>

                                <div>
                                    <x-label for="gender" value="{{ __('Gender') }}" :required="true" />
                                    <select name="gender" id="gender" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                        <option value="">Select gender</option>
                                        <option value="Male" {{ old('gender', $student->gender) === 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender', $student->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender', $student->gender) === 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="guardian_is" value="{{ __('Guardian Relationship') }}" :required="true" />
                                    <select name="guardian_is" id="guardian_is" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                        <option value="">Select guardian relationship</option>
                                        <option value="S/O" {{ old('guardian_is', $student->guardian_is) === 'S/O' ? 'selected' : '' }}>Son of</option>
                                        <option value="D/O" {{ old('guardian_is', $student->guardian_is) === 'D/O' ? 'selected' : '' }}>Daughter of</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="guardian_name" value="{{ __('Father/Husband Name') }}" :required="true" />
                                    <x-input id="guardian_name" class="block mt-1 w-full" type="text" name="guardian_name" value="{{ old('guardian_name', $student->guardian_name) }}" required />
                                </div>

                                <div>
                                    <x-label for="address" value="{{ __('Address') }}" :required="true" />
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ old('address', $student->address) }}" required />
                                </div>



                                <div>
                                    <x-label for="district" value="{{ __('District') }}" :required="true" />
                                    <select name="district" id="district" required class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select a district</option>
                                        <option value="MUZAFFARABAD" @if(old('district', $student->district) == "MUZAFFARABAD") selected @endif>MUZAFFARABAD</option>
                                        <option value="JHELUM VALLEY" @if(old('district', $student->district) == "JHELUM VALLEY") selected @endif>JHELUM VALLEY</option>
                                        <option value="NEELUM" @if(old('district', $student->district) == "NEELUM") selected @endif>NEELUM</option>
                                        <option value="MIRPUR" @if(old('district', $student->district) == "MIRPUR") selected @endif>MIRPUR</option>
                                        <option value="BHIMBER" @if(old('district', $student->district) == "BHIMBER") selected @endif>BHIMBER</option>
                                        <option value="KOTLI" @if(old('district', $student->district) == "KOTLI") selected @endif>KOTLI</option>
                                        <option value="POONCH" @if(old('district', $student->district) == "POONCH") selected @endif>POONCH</option>
                                        <option value="BAGH" @if(old('district', $student->district) == "BAGH") selected @endif>BAGH</option>
                                        <option value="HAVELI" @if(old('district', $student->district) == "HAVELI") selected @endif>HAVELI</option>
                                        <option value="SUDHNATI" @if(old('district', $student->district) == "SUDHNATI") selected @endif>SUDHNATI</option>
                                        <option value="OTHER/PAKISTAN" @if(old('district', $student->district) == "OTHER/PAKISTAN") selected @endif>OTHER/PAKISTAN</option>
                                    </select>
                                </div>


                                <div>
                                    <x-label for="dob" value="{{ __('Date of Birth') }}" :required="true" />
                                    <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" max="{{ date('Y-m-d') }}" value="{{ old('dob', $student->dob) }}" required />
                                </div>

                                <div>
                                    <x-label for="qualification" value="{{ __('Education Qualification') }}" :required="true" />
                                    <select name="qualification" id="qualification" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select qualification</option>
                                        <option value="Secondary School Certificate / Matriculation / O - level" @if(old('qualification', $student->qualification) == "Secondary School Certificate / Matriculation / O - level") selected @endif>Secondary School Certificate / Matriculation / O - level</option>
                                        <option value="Higher Secondary School Certificate / Intermediate/ A - level" @if(old('qualification', $student->qualification) == "Higher Secondary School Certificate / Intermediate/ A - level") selected @endif>Higher Secondary School Certificate / Intermediate/ A - level</option>
                                        <option value="Bachelor (14 Years) Degree" @if(old('qualification', $student->qualification) == "Bachelor (14 Years) Degree") selected @endif>Bachelor (14 Years) Degree</option>
                                        <option value="Bachelor (16 Years) Degree" @if(old('qualification', $student->qualification) == "Bachelor (16 Years) Degree") selected @endif>Bachelor (16 Years) Degree</option>
                                        <option value="Master (16 Years) Degree" @if(old('qualification', $student->qualification) == "Master (16 Years) Degree") selected @endif>Master (16 Years) Degree</option>
                                        <option value="Master/ MS (18 Years) Degree" @if(old('qualification', $student->qualification) == "Master/ MS (18 Years) Degree") selected @endif>Master/ MS (18 Years) Degree</option>
                                        <option value="M-Phil (18 Years) Degree" @if(old('qualification', $student->qualification) == "M-Phil (18 Years) Degree") selected @endif>M-Phil (18 Years) Degree</option>
                                        <option value="Doctorate Degree" @if(old('qualification', $student->qualification) == "Doctorate Degree") selected @endif>Doctorate Degree</option>
                                        <option value="MS leading to PhD" @if(old('qualification', $student->qualification) == "MS leading to PhD") selected @endif>MS leading to PhD</option>
                                        <option value="Post Doctorate" @if(old('qualification', $student->qualification) == "Post Doctorate") selected @endif>Post Doctorate</option>
                                        <option value="PGD" @if(old('qualification', $student->qualification) == "PGD") selected @endif>PGD</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="cnic" value="{{ __('CNIC') }}" :required="true"/>
                                    <x-input id="cnic" class="block mt-1 w-full" type="text" name="cnic" value="{{ old('cnic', $student->cnic) }}" required />
                                </div>

                                <div>
                                    <x-label for="email" value="{{ __('Email') }}" :required="true" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $student->email) }}" required />
                                </div>

                                <div>
                                    <x-label for="mobile_no" value="{{ __('Student Cell #') }}" :required="true" />
                                    <x-input id="mobile_no" class="block mt-1 w-full" type="text" name="mobile_no" value="{{ old('mobile_no', $student->mobile_no) }}" required />
                                </div>


                                <div>
                                    <x-label for="blood_group_id" value="{{ __('Blood Group') }}" :required="true" />
                                    <select name="blood_group_id" id="blood_group_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select blood group</option>
                                        @foreach (\App\Models\BloodGroup::all() as $bg)
                                            <option value="{{ $bg->id }}" {{ old('blood_group_id', $student->blood_group_id) == $bg->id ? 'selected' : '' }}>{{ $bg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="certification_required" value="{{ __('Certification Required') }}" :required="true" />
                                    <select name="certification_required" id="certification_required" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select certification required?</option>
                                        @foreach(\App\Models\Category::where('category_type', 'Certification Required')->get() as $cat)
                                            <option value="{{ $cat->id }}" {{ old('certification_required', $student->certification_required ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="admission_type" value="{{ __('Admission Type') }}" :required="true" />
                                    <select name="admission_type" id="admission_type" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Selectn admission type</option>
                                        @foreach(\App\Models\Category::where('category_type', 'Admission Type')->get() as $cat)
                                            <option value="{{ $cat->id }}" {{ old('admission_type', $student->admission_type ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="computer_knowledge" value="{{ __('Do you have Computer Knowledge') }}" :required="true" />
                                    <select name="computer_knowledge" id="computer_knowledge" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select computer knowledge</option>
                                        @foreach(\App\Models\Category::where('category_type', 'Computer Knowledge')->get() as $cat)
                                            <option value="{{ $cat->id }}" {{ old('computer_knowledge', $student->computer_knowledge ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="guardian_emergency_contact" value="{{ __('Guardian Cell # / Emergency Contact') }}" :required="true"/>
                                    <x-input id="guardian_emergency_contact" class="block mt-1 w-full" type="text" name="guardian_emergency_contact" value="{{ old('guardian_emergency_contact', $student->guardian_emergency_contact ?? '') }}" />
                                </div>

                                <!-- Phone Network -->
                                <div>
                                    <x-label for="phone_network_id" value="{{ __('Phone Network') }}" :required="true"/>
                                    <select name="phone_network_id" id="phone_network_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select phone network</option>
                                        @foreach(\App\Models\PhoneNetwork::all() as $mn)
                                            <option value="{{ $mn->id }}" {{ old('phone_network_id', $student->phone_network_id ?? '') == $mn->id ? 'selected' : '' }}>{{ $mn->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Mobile Number for SMS Alert -->
                                <div>
                                    <x-label for="mobile_number_for_sms_alert" value="{{ __('SMS Alert / WhatsApp') }}" :required="true" />
                                    <x-input id="mobile_number_for_sms_alert" class="block mt-1 w-full" type="text" name="mobile_number_for_sms_alert" value="{{ old('mobile_number_for_sms_alert', $student->mobile_number_for_sms_alert) }}" required />
                                </div>




                                <div>
                                    <x-label for="status_id" value="{{ __('Status') }}" :required="true"/>
                                    <select name="status_id" id="status_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select student status</option>
                                        @foreach(\App\Models\Status::all() as $st)
                                            <option value="{{ $st->id }}" {{ old('status_id', $student->latestStatus->status_id ?? '') == $st->id ? 'selected' : '' }}>{{ $st->name }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <div>
                                    <x-label for="session_year_id" value="{{ __('Session Year') }}" :required="true"/>
                                    <select name="session_year_id" id="session_year_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select session year</option>
                                        @foreach(\App\Models\SessionYear::all() as $st)
                                            <option value="{{ $st->id }}" {{ old('status_id', $student->sessionYear->session_year_id ?? '') == $st->id ? 'selected' : '' }}>{{ \Carbon\Carbon::parse($st->start_year)->format('Y-') . \Carbon\Carbon::parse($st->end_year)->format('Y') }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="is_lock" value="{{ __('Profile Lock') }}" :required="true" />
                                    <select name="is_lock" id="is_lock" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select Profile Lock Status</option>
                                        <option value="1" {{ old('is_lock', $student->is_lock ?? '') == 1 ? 'selected' : '' }}>Lock</option>
                                        <option value="0" {{ old('is_lock', $student->is_lock ?? '') == 0 ? 'selected' : '' }}>Unlock</option>
                                    </select>
                                </div>


                                <div>
                                    <x-label for="applied_for" class="uppercase font-extrabold" value="{{ __('Applied For') }}" :required="true" />
                                    <select name="applied_for[]" id="applied_for" multiple="multiple" required class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        @foreach(\App\Models\CertificateCategory::where('status',1)->get() as $cert)
                                            <option value="{{ $cert->id }}" {{ in_array($cert->id, old('applied_for', $student_applied_for_ids ?? [])) ? 'selected' : '' }}>{{ $cert->name }}</option>
                                        @endforeach
                                    </select>
                                </div>





                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label for="profile_pic" class="block text-sm font-medium text-gray-700">Student Photo/Picture</label>
                                    @if($student->profile_picture)
                                        <img id="profilePicturePreview" src="{{ Storage::url($student->profile_picture) }}" alt="Profile Picture" class="rounded-lg shadow mb-2" style="width: 2in; height: 2in">
                                    @endif
                                    <img id="profilePicturePreview" src="" alt="Profile Picture" class="h-32 w-32 object-cover rounded-lg shadow mb-2" style="display: none;">
                                    <div class="mt-1">
                                        <button type="button" id="openCameraButton" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75" style="background-color: #0f0161;">
                                            Open Camera
                                        </button>
                                        <button type="button" id="captureButton" class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75" style="display:none;">
                                            Capture Photo
                                        </button>
                                    </div>
                                    <video id="cameraStream" autoplay style="display:none;" class="rounded-lg mt-2"></video>
                                    <input id="profile_pic" name="profile_pic" type="file" class="mt-1 w-full" style="display: none;"/>
                                </div>
                                <div>
                                    <x-label for="cnic_front" value="CNIC Front" :required="true"/>
                                    @if($student->cnic_front_picture)
                                        <img id="cnicFrontPreview" src="{{ Storage::url($student->cnic_front_picture) }}" alt="CNIC Front" class="rounded-lg" style="width: 3.5in; height: 2in">
                                    @endif
                                    <x-input id="cnic_front" name="cnic_front" class="block mt-1 w-full" type="file" />
                                </div>

                                <div>
                                    <x-label for="cnic_back" value="CNIC Back" :required="true"/>
                                    @if($student->cnic_back_picture)
                                        <img id="cnicBackPreview" src="{{ Storage::url($student->cnic_back_picture) }}" alt="CNIC Back" class="rounded-lg" style="width: 3.5in; height: 2in">
                                    @endif
                                    <x-input id="cnic_back" name="cnic_back" class="block mt-1 w-full" type="file" />
                                </div>


                            </div>

                            {{-- For the submit button --}}
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4"> {{ __('Update Student') }} </x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')

            <script>
                let openCameraButton = document.getElementById('openCameraButton');
                let captureButton = document.getElementById('captureButton');
                let cameraStreamElement = document.getElementById('cameraStream');
                let profilePicturePreview = document.getElementById('profilePicturePreview');
                let stream = null; // Keep track of the stream globally

                openCameraButton.addEventListener('click', async function() {
                    if (!stream) { // Only request the stream if it hasn't been started yet
                        try {
                            stream = await navigator.mediaDevices.getUserMedia({ video: {
                            width: { ideal: 1080 },
                            height: { ideal: 720 },
                            facingMode: "environment"
                        } });
                            cameraStreamElement.srcObject = stream;
                            cameraStreamElement.style.display = 'block';
                            openCameraButton.style.display = 'none';
                            captureButton.style.display = 'inline-block'; // Use inline-block for TailwindCSS consistency
                        } catch (error) {
                            console.error("Cannot access camera:", error);
                        }
                    }
                });

                captureButton.addEventListener('click', function() {
                    const canvas = document.createElement('canvas');
                    canvas.width = cameraStreamElement.videoWidth;
                    canvas.height = cameraStreamElement.videoHeight;
                    const context = canvas.getContext('2d');
{{--                    // Flip the canvas context horizontally--}}
{{--                    context.translate(canvas.width, 0);--}}
{{--                    context.scale(-1, 1);--}}
                    context.drawImage(cameraStreamElement, 0, 0, canvas.width, canvas.height);

                    canvas.toBlob(function(blob) {
                        const url = URL.createObjectURL(blob);
                        profilePicturePreview.src = url;
                        profilePicturePreview.style.display = 'block';

                        const file = new File([blob], "webcam.jpg", { type: "image/jpeg" });
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        document.getElementById('profile_pic').files = dataTransfer.files;

                        if (stream) {
                            stream.getTracks().forEach(track => track.stop()); // Stop the camera stream
                        }
                        stream = null; // Reset the stream
                        cameraStreamElement.style.display = 'none';
                        captureButton.style.display = 'none';
                        openCameraButton.style.display = 'inline-block'; // Allow the user to start the camera again
                    }, 'image/jpeg');
                });

            </script>


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const cnicInput = document.getElementById('cnic');
                    const mobileInput = document.getElementById('mobile_no');
                    const guardianContactInput = document.getElementById('guardian_emergency_contact');
                    const smsAlertInput = document.getElementById('mobile_number_for_sms_alert');

                    const formatCNIC = (value) => {
                        return value.replace(/\D/g, '')
                                    .replace(/(\d{5})(\d{7})(\d{1})/, '$1-$2-$3')
                                    .substr(0, 15); // CNIC format: 00000-0000000-0
                    };

                    const formatPhoneNumber = (value) => {
                        return value.replace(/\D/g, '')
                                    .replace(/(\d{4})(\d{7})/, '$1-$2')
                                    .substr(0, 12); // Phone format: 0000-0000000
                    };

                    cnicInput.addEventListener('input', function(e) {
                        e.target.value = formatCNIC(e.target.value);
                    });

                    mobileInput.addEventListener('input', function(e) {
                        e.target.value = formatPhoneNumber(e.target.value);
                    });

                    guardianContactInput.addEventListener('input', function(e) {
                        e.target.value = formatPhoneNumber(e.target.value);
                    });

                    smsAlertInput.addEventListener('input', function(e) {
                        e.target.value = formatPhoneNumber(e.target.value);
                    });
                });
            </script>

        @endpush
</x-app-layout>
