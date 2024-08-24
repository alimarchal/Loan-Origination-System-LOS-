<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-center uppercase font-bold text-red-700 dark:text-gray-200 leading-tight">
            Request for Data Check Credit Bureau of Pakistan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                            <li class="me-2">
                                <a href="javascript:;" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 mb-4 pt-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <!-- resources/views/users/create.blade.php -->
                        <x-validation-errors class="mb-4 mt-4" />
                        <x-status-message class="mb-4" />
                        <form method="POST" action="{{ route('credit-reporting.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-4">

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">
                                        Name
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="name" type="text" name="name" value="{{ old('name') }}" required="required">
                                </div>


                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="national_id_cnic">
                                       Customer CNIC
                                        <span class="text-red-700">*</span>
                                    </label>
                                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="national_id_cnic" type="text" name="national_id_cnic" value="{{ old('national_id_cnic') }}" required="required">
                                </div>


                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">
                                    Send Request
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
{{--        <script>--}}
{{--            let openCameraButton = document.getElementById('openCameraButton');--}}
{{--            let captureButton = document.getElementById('captureButton');--}}
{{--            let cameraStreamElement = document.getElementById('cameraStream');--}}
{{--            let profilePicturePreview = document.getElementById('profilePicturePreview');--}}
{{--            let stream = null; // Keep track of the stream globally--}}

{{--            openCameraButton.addEventListener('click', async function () {--}}
{{--                if (!stream) { // Only request the stream if it hasn't been started yet--}}
{{--                    try {--}}
{{--                        stream = await navigator.mediaDevices.getUserMedia({video: true});--}}
{{--                        cameraStreamElement.srcObject = stream;--}}
{{--                        cameraStreamElement.style.display = 'block';--}}
{{--                        cameraStreamElement.style.transform = 'scaleX(-1)';--}}
{{--                        openCameraButton.style.display = 'none';--}}
{{--                        captureButton.style.display = 'inline-block'; // Use inline-block for TailwindCSS consistency--}}
{{--                    } catch (error) {--}}
{{--                        console.error("Cannot access camera:", error);--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}

{{--            captureButton.addEventListener('click', function () {--}}
{{--                const canvas = document.createElement('canvas');--}}
{{--                canvas.width = cameraStreamElement.videoWidth;--}}
{{--                canvas.height = cameraStreamElement.videoHeight;--}}
{{--                const context = canvas.getContext('2d');--}}
{{--                --}}{{--                  // Flip the canvas context horizontally--}}
{{--                context.translate(canvas.width, 0);--}}
{{--                context.scale(-1, 1);--}}
{{--                context.drawImage(cameraStreamElement, 0, 0, canvas.width, canvas.height);--}}

{{--                canvas.toBlob(function (blob) {--}}
{{--                    const url = URL.createObjectURL(blob);--}}
{{--                    profilePicturePreview.src = url;--}}
{{--                    profilePicturePreview.style.display = 'block';--}}

{{--                    const file = new File([blob], "webcam.jpg", {type: "image/jpeg"});--}}
{{--                    const dataTransfer = new DataTransfer();--}}
{{--                    dataTransfer.items.add(file);--}}
{{--                    document.getElementById('profile_pic').files = dataTransfer.files;--}}

{{--                    if (stream) {--}}
{{--                        stream.getTracks().forEach(track => track.stop()); // Stop the camera stream--}}
{{--                    }--}}
{{--                    stream = null; // Reset the stream--}}
{{--                    cameraStreamElement.style.display = 'none';--}}
{{--                    captureButton.style.display = 'none';--}}
{{--                    openCameraButton.style.display = 'inline-block'; // Allow the user to start the camera again--}}
{{--                }, 'image/jpeg');--}}
{{--            });--}}
{{--        </script>--}}



{{--        <script>--}}
{{--            document.addEventListener('DOMContentLoaded', function () {--}}
{{--                const cnicInput = document.getElementById('cnic');--}}
{{--                const mobileInput = document.getElementById('mobile_number');--}}
{{--                const guardianContactInput = document.getElementById('guardian_emergency_contact');--}}
{{--                const smsAlertInput = document.getElementById('mobile_number_for_sms_alert');--}}

{{--                const formatCNIC = (value) => {--}}
{{--                    return value.replace(/\D/g, '')--}}
{{--                        .replace(/(\d{5})(\d{7})(\d{1})/, '$1-$2-$3')--}}
{{--                        .substr(0, 15); // CNIC format: 00000-0000000-0--}}
{{--                };--}}

{{--                const formatPhoneNumber = (value) => {--}}
{{--                    return value.replace(/\D/g, '')--}}
{{--                        .replace(/(\d{4})(\d{7})/, '$1-$2')--}}
{{--                        .substr(0, 12); // Phone format: 0000-0000000--}}
{{--                };--}}

{{--                cnicInput.addEventListener('input', function (e) {--}}
{{--                    e.target.value = formatCNIC(e.target.value);--}}
{{--                });--}}

{{--                mobileInput.addEventListener('input', function (e) {--}}
{{--                    e.target.value = formatPhoneNumber(e.target.value);--}}
{{--                });--}}

{{--                guardianContactInput.addEventListener('input', function (e) {--}}
{{--                    e.target.value = formatPhoneNumber(e.target.value);--}}
{{--                });--}}

{{--                smsAlertInput.addEventListener('input', function (e) {--}}
{{--                    e.target.value = formatPhoneNumber(e.target.value);--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}

        <script>
            $(document).ready(function() {
                var oldCategoryId = "{{ old('loan_category_id') }}";
                var oldSubCategoryId = "{{ old('loan_sub_category_id') }}";

                function populateSubCategories(categoryId, selectedSubCategoryId = null) {
                    var subCategorySelect = $('#loan_sub_category_id');
                    subCategorySelect.empty().append('<option value="">Select an option</option>');

                    if (categoryId) {
                        $.ajax({
                            url: '/loan-subcategories/' + categoryId,
                            type: 'GET',
                            success: function(response) {
                                $.each(response, function(index, subCategory) {
                                    var selected = selectedSubCategoryId == subCategory.id ? 'selected' : '';
                                    subCategorySelect.append('<option value="' + subCategory.id + '" ' + selected + '>' + subCategory.name + '</option>');
                                });
                            }
                        });
                    }
                }

                if (oldCategoryId) {
                    $('#loan_category_id').val(oldCategoryId);
                    populateSubCategories(oldCategoryId, oldSubCategoryId);
                }

                $('#loan_category_id').change(function() {
                    var categoryId = $(this).val();
                    populateSubCategories(categoryId);
                });
            });
        </script>
    @endpush
</x-app-layout>
