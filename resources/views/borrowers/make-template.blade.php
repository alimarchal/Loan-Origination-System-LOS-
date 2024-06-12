<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Borrower Details
        </h2>

        <div class="flex justify-center items-center float-right">
            <div class="flex justify-center items-center float-right">

                <a href="#" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"/>
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-validation-errors class="mb-4 mt-4"/>
                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                            <li class="me-2">

                                <a href="javascript:;" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                    Borrower
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <!-- resources/views/users/create.blade.php -->
                        <x-validation-errors class="mb-4 mt-4"/>
                        <x-status-message class="mb-4"/>
                        <form method="POST" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">


                                @foreach($fillable as $key => $value)
                                    @if($value == "select")
                                        <div>
                                            <x-label for="{{ $key }}" value="{{ ucwords(str_replace('_', ' ', strtolower($key))) }}" :required="true" />
                                            <select name="{{ $key }}" id="{{ $key }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                <option value="">Select an option</option>
                                                <!-- Add your options here -->
                                            </select>
                                        </div>
                                    @elseif($value == "text")
                                        <div>
                                            <x-label for="{{ $key }}" value="{{ ucwords(str_replace('_', ' ', strtolower($key))) }}" :required="true"/>
                                            <x-input id="{{ $key }}" class="block mt-1 w-full" type="text" name="{{ $key }}" :value="old('{{ $key }}')" required/>
                                        </div>
                                    @elseif($value == "date")
                                        <div>
                                            <x-label for="{{ $key }}" value="{{ ucwords(str_replace('_', ' ', strtolower($key))) }}" :required="true"/>
                                            <x-input id="{{ $key }}" class="block mt-1 w-full" type="date" max="{{ date('Y-m-d') }}" name="{{ $key }}" :value="old('{{ $key }}')" required/>
                                        </div>
                                    @elseif($value == "number")
                                        <div>
                                            <x-label for="{{ $key }}" value="{{ ucwords(str_replace('_', ' ', strtolower($key))) }}" :required="true"/>
                                            <x-input id="{{ $key }}" class="block mt-1 w-full" type="number" min="0" name="{{ $key }}" :value="old('{{ $key }}')" required/>
                                        </div>
                                    @elseif($value == "email")
                                        <div>
                                            <x-label for="{{ $key }}" value="{{ ucwords(str_replace('_', ' ', strtolower($key))) }}" :required="true"/>
                                            <x-input id="{{ $key }}" class="block mt-1 w-full" type="email" name="{{ $key }}" :value="old('{{ $key }}')" required/>
                                        </div>
                                    @elseif($value == "file")
                                        <div>
                                            <x-label for="{{ $key }}" value="{{ ucwords(str_replace('_', ' ', strtolower($key))) }}" :required="true"/>
                                            <x-input id="{{ $key }}" name="{{ $key }}" class="block mt-1 w-full" type="file" required/>
                                        </div>
                                    @endif
                                @endforeach


                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                {{--
                                <div>--}} {{--
                                    <x-label for="profile_pic_1" value="Student Photo/Picture" :required="true" />--}} {{-- <img id="profilePicture1" class="rounded-lg shadow" style="border: 1px solid #747474;width: 2in; height: 2.1in" src="{{ url('icons-images/profile_avatar.png') }}" alt="profile picture">--}} {{--
                                    <x-input id="profile_pic_1"
                                    required name="profile_pic" class="block mt-1 w-full" type="file" />--}} {{-- </div>--}}


                                <div>
                                    <label for="profile_pic" class="block text-sm font-medium text-gray-700">Student Photo/Picture</label>
                                    <img id="profilePicturePreview" src="" alt="Profile Picture" class="h-32 w-32 object-cover rounded-lg shadow mb-2" style="display: none;">
                                    <div class="mt-1">
                                        <button type="button" id="openCameraButton" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                                                style="background-color: #0f0161;">
                                            Open Camera
                                        </button>
                                        <button type="button" id="captureButton" class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75"
                                                style="display:none;">
                                            Capture Photo
                                        </button>
                                    </div>
                                    <video id="cameraStream" autoplay style="display:none;" class="rounded-lg mt-2"></video>
                                    <input id="profile_pic" name="profile_pic" type="file" class="mt-1 w-full" style="display: none;"/>
                                </div>


                                <div>
                                    <x-label for="cnic_front" value="CNIC Front" :required="true"/>
                                    <img id="cnicFrontImage" class="rounded-lg " style="width: 3.5in; height: 2in" src="{{ url('icons-images/front.png') }}" alt="CNIC FRONT">
                                    <x-input id="cnic_front" required name="cnic_front" class="block mt-1 w-full" type="file"/>
                                </div>

                                <div>
                                    <x-label for="cnic_back" value="CNIC Back" :required="true"/>
                                    <img id="cnicBackImage" class="rounded-lg" style="width: 3.5in; height: 2in" src="{{ url('icons-images/back.png') }}" alt="CNIC BACK">
                                    <x-input id="cnic_back" required name="cnic_back" class="block mt-1 w-full" type="file"/>
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn"> Save & Next </x-button>
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

            openCameraButton.addEventListener('click', async function () {
                if (!stream) { // Only request the stream if it hasn't been started yet
                    try {
                        stream = await navigator.mediaDevices.getUserMedia({video: true});
                        cameraStreamElement.srcObject = stream;
                        cameraStreamElement.style.display = 'block';
                        cameraStreamElement.style.transform = 'scaleX(-1)';
                        openCameraButton.style.display = 'none';
                        captureButton.style.display = 'inline-block'; // Use inline-block for TailwindCSS consistency
                    } catch (error) {
                        console.error("Cannot access camera:", error);
                    }
                }
            });

            captureButton.addEventListener('click', function () {
                const canvas = document.createElement('canvas');
                canvas.width = cameraStreamElement.videoWidth;
                canvas.height = cameraStreamElement.videoHeight;
                const context = canvas.getContext('2d');
                {{--                  // Flip the canvas context horizontally--}}
                context.translate(canvas.width, 0);
                context.scale(-1, 1);
                context.drawImage(cameraStreamElement, 0, 0, canvas.width, canvas.height);

                canvas.toBlob(function (blob) {
                    const url = URL.createObjectURL(blob);
                    profilePicturePreview.src = url;
                    profilePicturePreview.style.display = 'block';

                    const file = new File([blob], "webcam.jpg", {type: "image/jpeg"});
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
            document.addEventListener('DOMContentLoaded', function () {
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

                cnicInput.addEventListener('input', function (e) {
                    e.target.value = formatCNIC(e.target.value);
                });

                mobileInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });

                guardianContactInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });

                smsAlertInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });
            });
        </script>
    @endpush
</x-app-layout>
