<x-app-layout>
    @push('header')
        <!-- Include stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet"/>
        <!-- Include the Quill library -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 15px;
                page-break-inside: avoid;
            }

            th, td {
                border: 0.5px solid black;
                padding-left: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-right: 5px;
                text-align: left;
                vertical-align: top;
                word-wrap: break-word;
            }

            th {
                background-color: lightgray;
                font-weight: bold;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            .font-bold {
                font-weight: bold;
            }

            .uppercase {
                text-transform: uppercase;
            }

            .mb-4 {
                margin-bottom: 10px;
            }

            .w-1 {
                width: 1%;
            }

            .w-10 {
                width: 10%;
            }

            .w-25 {
                width: 25%;
            }

            .w-100 {
                width: 100%;
            }

            .page-break {
                page-break-after: always;
            }
        </style>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight text-center block">
            EDITING SANCTION ADVICE OF {{ $borrower->name }} <br> Requested Amount: {{ $borrower->applicant_requested_loan_information->requested_amount }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-status-message class="mb-4"/>
                <x-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('sanction-advice.update', [$borrower->id, $sanctionAdvice->id]) }}" enctype="multipart/form-data" id="sanction-form">
                    @csrf
                    @method('PUT')
                    <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

                            <h4 class="text-xl font-bold text-center mt-4 uppercase">THE BANK OF AZAD JAMMU & KASHMIR</h4>
                            <h5 class="text-lg font-bold text-center uppercase">REGIONAL OFFICE {{ $borrower->region->name }}</h5>

                            <div class="mb-4">
                                <p class="font-semibold">No: BAJK/HO/CMD/2024/228</p>
                                <p class="font-semibold">Dated: Month Date, 2024</p>
                            </div>

                            <h3 class="text-xl font-bold text-center underline">OFFICE NOTE</h3>
                            <h4 class="text-lg font-bold text-center underline uppercase">
                                APPROVAL CUM SANCTION ADVICE - {{ $borrower->loan_sub_category->name }} ({{ $borrower->applicant_requested_loan_information->status }})
                            </h4>
                            <h5 class="text-base font-bold text-center underline uppercase">
                                {{ $borrower->branch->name }}
                            </h5>

                            <p class="mb-4 mt-2">
                                As recommended by CRBD, vide letter No. BAJK/BR/001/2024/SALARY dated 12-07-2024, following Credit limit of salary finance favoring
                                {{ $borrower->gender == 'Male' ? 'Mr.' : ($borrower->gender == 'Female' ? 'Ms.' : 'M/s.') }}{{ $borrower->name }}
                                {{ $borrower->relationship_status }} {{ $borrower->parent_spouse_name }}
                                is submitted for sanction on terms and conditions mentioned below:
                            </p>

                            <table>
                                <thead>
                                <tr>
                                    <th colspan="4" class="text-left">A: APPLICANT'S DETAILS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="font-bold" style="width: 20%!important;">Name:</td>
                                    <td>{{ $borrower->name ?? 'N/A' }}</td>
                                    <td class="font-bold">Contact:</td>
                                    <td>{{ $borrower->mobile_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Father/Husband's Name:</td>
                                    <td>{{ $borrower->parent_spouse_name ?? 'N/A' }}</td>
                                    <td class="font-bold">PP NO:</td>
                                    <td>{{ $borrower->employment_information->personal_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Resident Address:</td>
                                    <td>{{ $borrower->present_address ?? 'N/A' }}</td>
                                    <td class="font-bold">CNIC:</td>
                                    <td>{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Occupation:</td>
                                    <td>{{ $borrower->occupation_title ?? 'N/A' }},
                                        {{ $borrower->employment_information->job_title_designation ?? 'N/A' }},
                                        BPS-{{ $borrower->employment_information->grade ?? 'N/A' }}
                                    </td>
                                    <td class="font-bold">DOB:</td>
                                    <td>{{ \Carbon\Carbon::parse($borrower->date_of_birth)->format('d-m-Y') ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Office Address:</td>
                                    <td>{{ $borrower->employment_information->official_address ?? 'N/A' }}</td>
                                    <td class="font-bold">DOR:</td>
                                    <td>{{ $borrower->date_of_birth ? \Carbon\Carbon::parse($borrower->date_of_birth)->addYears(60)->format('d-m-Y') : 'N/A' }}</td>
                                </tr>
                                </tbody>
                            </table>

                            <table>
                                <thead>
                                <tr>
                                    <th colspan="4" class="text-left">B: LIMIT DETAILS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="font-bold">Type of Finance:</td>
                                    <td>
                                        <x-input id="type_of_finance" class="block shadow-none w-full h-8 rounded-none" type="text" name="type_of_finance" value="{{ $sanctionAdvice->type_of_finance }}" readonly />
                                    </td>
                                    <td class="font-bold">SGL Code:</td>
                                    <td>
                                        <x-input id="sgl_code" class="block shadow-none w-full h-8 rounded-none" type="text" name="sgl_code" value="{{ $sanctionAdvice->sgl_code }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Nature Of Finance:</td>
                                    <td>
                                        <x-input id="nature_of_finance" class="block shadow-none w-full h-8 rounded-none" type="text" name="nature_of_finance" value="Demand Finance"/>
                                    </td>
                                    <td class="font-bold">Purpose Of Finance:</td>
                                    <td>
                                        <x-input id="purpose_of_finance" class="block shadow-none w-full h-8 rounded-none" type="text" name="purpose_of_finance" value="{{ $sanctionAdvice->purpose_of_finance ?? 'N/A' }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Tenure:</td>
                                    <td>
                                        <x-input id="tenure" class="block shadow-none w-full h-8 rounded-none" type="text" name="tenure" :value="$sanctionAdvice->tenure"/>
                                    </td>
                                    <td class="font-bold">Take Home Salary:</td>
                                    <td>
                                        <x-input id="take_home_salary" class="block w-full h-8 rounded-none" type="text" name="take_home_salary" :value="$sanctionAdvice->take_home_salary ?? 'N/A'"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">DSR (Required):</td>
                                    <td>
                                        <x-input id="dsr_required" class="block w-full h-8 rounded-none" type="text" name="dsr_required" value="{{ $sanctionAdvice->dsr_required }}" />
                                    </td>
                                    <td class="font-bold">DSR (Actual):</td>
                                    <td>
                                        <x-input id="dsr_actual" class="block w-full h-8 rounded-none" type="text" name="dsr_actual" value="{{ $sanctionAdvice->dsr_actual }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Status:</td>
                                    <td>
                                        <x-input id="requested_amount_status" class="block w-full h-8 rounded-none" type="text" name="requested_amount_status" :value="$sanctionAdvice->requested_amount_status" readonly />
                                    </td>
                                    <td class="font-bold">Amount of Finance / Limit:</td>
                                    <td>
                                        <x-input id="amount_of_finance_limit" class="block w-full h-8 rounded-none" type="text" name="amount_of_finance_limit" :value="$sanctionAdvice->amount_of_finance_limit" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Previous Outstanding:</td>
                                    <td>
                                        <x-input id="previous_outstanding" class="block w-full h-8 rounded-none" value="{{ $sanctionAdvice->previous_outstanding }}"  type="text" name="previous_outstanding"/>
                                    </td>
                                    <td class="font-bold">Enhancement Amount:</td>
                                    <td>
                                        <x-input id="enhancement_amount" class="block w-full h-8 rounded-none"  value="{{ $sanctionAdvice->enhancement_amount }}" type="text" name="enhancement_amount"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Total Enhancement:</td>
                                    <td>
                                        <x-input id="total_amount" class="block w-full h-8 rounded-none" type="text" name="total_amount" value="{{ $sanctionAdvice->total_amount }}"/>
                                    </td>
                                    <td class="font-bold">Repayment History:</td>
                                    <td>
                                        <x-input id="repayment_history" class="block w-full h-8 rounded-none" type="text" name="repayment_history" value="{{ $sanctionAdvice->repayment_history ?? 'N/A' }}" readonly />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Rate of Markup:</td>
                                    <td colspan="3">
                                        <x-input id="rate_of_markup" class="block w-full h-8 rounded-none" type="text" name="rate_of_markup" value="{{ $sanctionAdvice->rate_of_markup }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Repayment Schedule (Monthly Installment):</td>
                                    <td colspan="3">
                                        Rs. <x-input id="monthly_installment" class="w-1/3 h-8" type="number" min="0" step="0.01" name="monthly_installment" value="{{ $sanctionAdvice->monthly_installment }}"/>
                                        <br>

                                        <input type="hidden" name="repayment_schedule_monthly_installment" id="repayment_schedule_monthly_installment">
                                        <!-- Second Quill Editor -->
                                        <div id="editor3" class="mt-2">
                                            {!! $sanctionAdvice->repayment_schedule_monthly_installment !!}
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Insurance Treatment:</td>
                                    <td colspan="3">

                                        <input type="hidden" name="insurance_treatment" id="insurance_treatment">
                                        <!-- Second Quill Editor -->
                                        <div id="editor2">
                                            {!! $sanctionAdvice->insurance_treatment !!}
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Life Insurance-SGL:</td>
                                    <td colspan="3">
                                        <x-input id="life_insurance_sgl" class="block w-full h-8 rounded-none" type="text" name="life_insurance_sgl" value="{{ $sanctionAdvice->life_insurance_sgl }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Recovery Mode of Installment:</td>
                                    <td colspan="3">


                                        <input type="hidden" name="recovery_mode_of_installment" id="recovery_mode_of_installment">
                                        <!-- Second Quill Editor -->
                                        <div id="editor4">
                                            {!! $sanctionAdvice->recovery_mode_of_installment !!}
                                        </div>


                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <table>
                                <thead>
                                <tr>
                                    <th colspan="4" class="text-left">C: SECURITY DETAILS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="font-bold">Primary:</td>
                                    <td colspan="3">
                                         Hypothecation of Household Goods valuing to
                                        <x-input id="security_primary_amount" class="w-1/6 h-8" type="number" readonly min="0" step="0.01" name="security_primary_amount" :value="$borrower->listHouseHoldItems->sum('amount')"/> /-

                                        <input type="hidden" name="security_primary" id="security_primary">
                                        <!-- Second Quill Editor -->
                                        <div id="editor5" class="mt-1">
                                            {!! $sanctionAdvice->security_primary !!}
                                        </div>



                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Secondary:</td>
                                    <td colspan="3">
                                        <input type="hidden" name="security_secondary" id="security_secondary">
                                        <div id="editor6">{!! $sanctionAdvice->security_secondary !!}</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <table>
                                <thead>
                                <tr>
                                    <th colspan="4" class="text-left">D: Personal Guarantee(s) extended by Borrower/Guarantor</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="font-bold">Borrower</td>
                                    <td>
                                        <x-input id="borrower_pgs_no_issued" class="block w-full h-8 rounded-none" type="text" name="borrower_pgs_no_issued" value="{{ $sanctionAdvice->borrower_pgs_no_issued }}"/>
                                    </td>
                                    <td class="font-bold">Repayment Status</td>
                                    <td>
                                        <x-input id="borrower_rp_status" class="block w-full h-8 rounded-none" type="text" name="borrower_rp_status" value="{{ $sanctionAdvice->borrower_rp_status }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Guarantor</td>
                                    <td>
                                        <x-input id="guarantor_pgs_no_issued" class="block w-full h-8 rounded-none" type="text" name="guarantor_pgs_no_issued" value="{{ $sanctionAdvice->guarantor_pgs_no_issued }}" />
                                    </td>
                                    <td class="font-bold">Repayment Status</td>
                                    <td>
                                        <x-input id="guarantor_rp_status" class="block w-full h-8 rounded-none" type="text" name="guarantor_rp_status" value="{{ $sanctionAdvice->guarantor_rp_status }}" />
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <!-- Hidden input to store Quill data -->
                            <input type="hidden" name="documents_required_before_disbursement" id="documents_required_before_disbursement">

                            <!-- Quill Editor Section -->
                            <div class="">
                                <div id="editor">
                                   {!! $sanctionAdvice->documents_required_before_disbursement !!}
                                </div>
                            </div>


                            <div class="">
                                <!-- Hidden input to store Quill data -->
                                <input type="hidden" name="general_terms_of_service" id="general_terms_of_service">
                                <div id="editor7" class="my-2">
                                    {!! $sanctionAdvice->general_terms_of_service !!}
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-4">

                            <!-- Gender -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="gender">
                                    Do you want to finalize this Sanction Advice?
                                    <span class="text-red-700">*</span>
                                </label>
                                <select name="is_lock" id="is_lock" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes, Finalize It</option>
                                    <option value="No">No, Just Update The Basic Information For Draft</option>
                                </select>
                            </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">Update</x-button>
                            </div>

                            {{--                            <!-- Initialize Quill editor -->--}}
                            {{--                            <script>--}}
                            {{--                                const quill = new Quill('#editor', {--}}
                            {{--                                    theme: 'snow'--}}
                            {{--                                });--}}
                            {{--                            </script>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('modals')

        <!-- Quill and Form Submission Scripts -->
        <script>
            // Initialize Quill
            const quill = new Quill('#editor', {
                theme: 'snow',
                readOnly: true,  // Make it read-only if necessary
                modules: {
                    toolbar: false  // Disable toolbar if it's read-only
                }
            });

            // Initialize the second Quill editor
            const quill2 = new Quill('#editor2', {
                theme: 'snow',
                readOnly: true,  // Make it read-only if necessary
                modules: {
                    toolbar: false  // Disable toolbar if it's read-only
                }
            });


            // Initialize the second Quill editor
            const quill3 = new Quill('#editor3', {
                theme: 'snow',
                readOnly: true,  // Make it read-only if necessary
                modules: {
                    toolbar: false  // Disable toolbar if it's read-only
                }
            });


            // Initialize the second Quill editor
            const quill4 = new Quill('#editor4', {
                theme: 'snow',
                readOnly: true,  // Make it read-only if necessary
                modules: {
                    toolbar: false  // Disable toolbar if it's read-only
                }
            });


            // Initialize the second Quill editor
            const quill5 = new Quill('#editor5', {
                theme: 'snow',
                readOnly: true,  // Make it read-only if necessary
                modules: {
                    toolbar: false  // Disable toolbar if it's read-only
                }
            });

            // Initialize the second Quill editor
            const quill6 = new Quill('#editor6', {
                theme: 'snow',
                readOnly: true,  // Make it read-only if necessary
                modules: {
                    toolbar: false  // Disable toolbar if it's read-only
                }
            });



            // Initialize the second Quill editor
            const quill7 = new Quill('#editor7', {
                theme: 'snow',
                readOnly: true,  // Make it read-only if necessary
                modules: {
                    toolbar: false  // Disable toolbar if it's read-only
                }
            });


            // Get the form
            const form = document.getElementById('sanction-form');

            // On form submission, place Quill content into hidden input
            form.addEventListener('submit', function (e) {
                // Get HTML content from Quill
                const quillHtml = quill.root.innerHTML;
                const quillHtml2 = quill2.root.innerHTML;
                const quillHtml3 = quill3.root.innerHTML;
                const quillHtml4 = quill4.root.innerHTML;
                const quillHtml5 = quill5.root.innerHTML;
                const quillHtml6 = quill6.root.innerHTML;
                const quillHtml7 = quill7.root.innerHTML;

                // Place content into the hidden input
                document.getElementById('documents_required_before_disbursement').value = quillHtml;
                document.getElementById('insurance_treatment').value = quillHtml2;
                document.getElementById('repayment_schedule_monthly_installment').value = quillHtml3;
                document.getElementById('recovery_mode_of_installment').value = quillHtml4;
                document.getElementById('security_primary').value = quillHtml5;
                document.getElementById('security_secondary').value = quillHtml6;
                document.getElementById('general_terms_of_service').value = quillHtml7;
            });
        </script>

        <!-- CNIC and Phone Number Formatting -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cnicInput = document.getElementById('national_id');
                const mobileInput = document.getElementById('phone_number_two');

                const formatCNIC = (value) => {
                    return value.replace(/\D/g, '')
                        .replace(/(\d{5})(\d{7})(\d{1})/, '$1-$2-$3')
                        .substr(0, 15);
                };

                const formatPhoneNumber = (value) => {
                    return value.replace(/\D/g, '')
                        .replace(/(\d{4})(\d{7})/, '$1-$2')
                        .substr(0, 12);
                };

                cnicInput.addEventListener('input', function (e) {
                    e.target.value = formatCNIC(e.target.value);
                });

                mobileInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });
            });
        </script>

        <!-- Add this CSS to remove the border around the Quill editor -->
        {{--            <style>--}}
        {{--                .ql-container {--}}
        {{--                    border: none !important; /* Removes border around the content */--}}
        {{--                    padding: 0 !important;    /* Optional: Adjust padding if necessary */--}}
        {{--                }--}}
        {{--            </style>--}}
    @endpush
</x-app-layout>
