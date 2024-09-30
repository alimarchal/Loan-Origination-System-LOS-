<x-app-layout>
    @push('header')

        <style>

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 15px;
                page-break-inside: avoid;
            }

            th, td {
                border: 0.5px solid black;
                /*padding: 4px;*/
                padding-left: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-right: 5px;
                text-align: left;
                vertical-align: top;
                word-wrap: break-word;
            }

            th {
                /*background-color: #f2f2f2;*/
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

            .w-2 {
                width: 1%;
            }


            .w-5 {
                width: 1%;
            }


            .w-10 {
                width: 10%;
            }


            .w-15 {
                width: 15%;
            }

            .w-16 {
                width: 16.6%;
            }

            .w-20 {
                width: 20%;
            }


            .w-25 {
                width: 25%;
            }

            .w-30 {
                width: 30%;
            }

            .w-50 {
                width: 50%;
            }

            .w-75 {
                width: 75%;
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
            Creating Sanction Advice
        </h2>
        {{--        @include('back-navigation')--}}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

                        <h4 class="text-xl font-bold text-center mt-4 uppercase ">THE BANK OF AZAD JAMMU & KASHMIR</h4>
                        <h5 class="text-lg font-bold text-center uppercase  ">REGIONAL OFFICE {{ $borrower->region->name }}</h5>

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
                            As recommended by CRBD, vide letter No. BAJK/BR/001/2024/SALARY
                            dated 12-07-2024 following Credit limit of salary finance favoring
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
                                <td class="" style="width: 40%!important;">{{ $borrower->name ?? 'N/A' }}</td>
                                <td class="font-bold" style="width: 20%!important;">Contact:</td>
                                <td class="" style="width: 20%!important;">{{ $borrower->mobile_number ?? 'N/A' }}</td>
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
                                <td>
                                    {{ $borrower->occupation_title ?? 'N/A' }},
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
                                <td class="font-bold" style="width: 20%!important;">Type  Of Finance:</td>
                                <td class="" style="width: 40%!important;">{{ $borrower->loan_category->name }} - {{ $borrower->loan_sub_category->name }} </td>
                                <td class="font-bold" style="width: 20%!important;">SGL:</td>
                                <td class="" style="width: 20%!important;"></td>
                            </tr>
                            <tr>
                                <td class="font-bold">Nature Of Finance:</td>
                                <td>Demand Finance</td>
                                <td class="font-bold">Purpose Of Finance:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->loan_purpose ?? 'N/A' }}</</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Tenure:</td>
                                <td>{{$borrower->applicant_requested_loan_information->tenure_in_months }}</td>
                                <td class="font-bold">Take Home Salary:</td>
                                <td>{{ $borrower->employment_information->monthly_gross_salary ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">DSR(Required):</td>
                                <td></td>
                                <td class="font-bold">DSR(Actual)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-bold">Amount Of Finance</td>
                                <td> {{ $borrower->applicant_requested_loan_information->requested_amount }}</td>
                                <td class="font-bold">Previous Enhancement :</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-bold">Enhancement</td>
                                <td></td>
                                <td class="font-bold">Total Enhancement O/S:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-bold">Repayment History</td>
                                <td>{{ $facility->repayment_status ?? 'N/A' }}</td>
                                <td class="font-bold">Rate of Markup</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-bold">Enhancement</td>
                                <td></td>
                                <td class="font-bold">Total Enhancement O/S:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="font-bold">Repayment Schedule:<br> Monthly Installment</td>
                                <td colspan="3">Tentative Monthly Installment Rs.36,205/- Including Markup, Life Insurance and Principal.
                                    Grace period for broken days of the month during which loan is disbursed will be allowed i.e.,
                                    only markup shall be charged for grace period whereas Principal repayment will Commence
                                    from subsequent month (Instruction Circular no. CMD/HO/2018/207 dated: January 29, 2018
                                    Repayment Schedule is attached for reference only</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Insurance Treatment</td>
                                <td >Insurance premium is to be recovered along with monthly installment and be credited to the head of "Insurance Life Insurance-SGL premium payable (Life).</td>
                                <td class="font-bold">Life Insurance-SGL</td>
                                <td>1925</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Recovery Mode of Installment</td>
                                <td colspan="3">Regular; Monthly installment to be recovered on or before 5th of each month.
                                 <br> Default: Delay payment mark-up @ 02% over and above the normal mark-up rate be charged on the principal portion of the overdue installment from the due date till date of recovery and be recovered from the borrower. Instruction Circular no BAJK/HO/CMD/2022/320 dated: August 19, 2022</td>
                                 </td>

                            </tr>


                        <table>
                            <thead>
                            <tr>
                                <th colspan="4" class="text-left">C: Security DETAILS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-bold" style="width: 20%!important;">Primary:</td>
                                <td colspan="3"  class="" style="width: 40%!important;">Hypothecation of Househo~ld Goods valuing to Rs.4,000,000/-<br>
                                       (Minimum equivalent to loan amount)
                                     </td>
                             </tr>
                            <tr>
                                <td class="font-bold" style="width: 20%!important;">Secondary:</td>
                                <td>  • 06 Post Dated Cheques favoring BAJK along with Departmental undertaking.<br>
                                      • One Personal Guarantee: <br>
                                      • Designation: <br>
                                      •  CNIC: <br>
                                      • Contact #  PP:




                                </td> </td>



                            </tr>



                            </tbody>
                        </table>

                        <table>
                            <thead>
                            <tr>
                                <th colspan="4" class="text-left">D: Personal Guarantee (s) extended by Borrower / Guarantor (if any):</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                          <td></td>
                             <td class="font-bold" style="width: 20%!important;">No of PG's</td>
                             <td class="font-bold" style="width: 20%!important;">Repayment Status</td>
                          </tr>
                          <tr>
                      <td class="font-bold" style="width: 20%!important;">Borrower</td>
                                  <td>Nil</td>
                                <td></td>
                            </tr>
                            <tr>
                             <td class="font-bold" style="width: 20%!important;">Guarantor</td>
                                     <td>Nil</td>
                                       <td></td>
                     </tr>
                            </tbody>
                        </table>


                        <table class="w-full mb-4 border-collapse border border-gray-300">
                            <tr>
                                <td class="border border-gray-300 p-2">Name of the Applicant</td>
                                <td class="border border-gray-300 p-2">muhammad danish abbasi</td>
                                <td class="border border-gray-300 p-2">Contact #</td>
                                <td class="border border-gray-300 p-2">12345678</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">Father/Husband's Name</td>
                                <td class="border border-gray-300 p-2">muhammad yousaf abbasi</td>
                                <td class="border border-gray-300 p-2">PP NO.</td>
                                <td class="border border-gray-300 p-2">1234</td>
                            </tr>
                            <!-- Add more rows for other details -->
                        </table>


                        <div class="flex justify-between mt-8">
                            <div>
                                <p>__________________</p>
                                <p class="font-bold">Credit Officer</p>
                            </div>
                            <div>
                                <p>__________________</p>
                                <p class="font-bold">Credit Manager</p>
                            </div>
                        </div>

                        <p class="text-center font-bold mt-8">APPROVED</p>

                        <div class="text-center mt-8">
                            <p>__________________</p>
                            <p class="font-bold">Regional Head</p>
                        </div>
                    </div>


                    <x-validation-errors class="mb-4 mt-4"/>

                    <!-- Include stylesheet -->
                    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet"/>


                    <!-- Create the editor container -->
                    <div id="editor">
                        <p>Hello World!</p>
                        <p>Some initial <strong>bold</strong> text</p>
                        <p><br/></p>
                    </div>

                    <!-- Include the Quill library -->
                    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

                    <!-- Initialize Quill editor -->
                    <script>
                        const quill = new Quill('#editor', {
                            theme: 'snow'
                        });
                    </script>

                    <form method="POST" action="{{ route('guarantor.store', $borrower->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                            <!-- Form fields for Guarantor -->
                            <div>
                                <x-label for="guarantor_type" value="Guarantor Type"/>
                                <select name="guarantor_type" id="guarantor_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="">Select an option</option>
                                    <option value="Individual" {{ old('guarantor_type') == 'Individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="Business" {{ old('guarantor_type') == 'Business' ? 'selected' : '' }}>Business</option>
                                </select>
                            </div>

                            <div>
                                <x-label for="title" value="Title"/>
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"/>
                            </div>

                            <div>
                                <x-label for="name" value="Name"/>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$borrower->name" readonly/>
                            </div>

                            <div>
                                <x-label for="father_husband" value="Father/Husband Name"/>
                                <x-input id="father_husband" class="block mt-1 w-full" type="text" name="father_husband" :value="old('father_husband')"/>
                            </div>

                            <div>
                                <x-label for="national_id" value="National ID"/>
                                <x-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" :value="old('national_id')"/>
                            </div>

                            <div>
                                <x-label for="phone_number" value="Phone Number"/>
                                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')"/>
                            </div>

                            <div>
                                <x-label for="phone_number_two" value="Phone Number Two"/>
                                <x-input id="phone_number_two" class="block mt-1 w-full" type="text" name="phone_number_two" :value="old('phone_number_two')"/>
                            </div>

                            <div>
                                <x-label for="email" value="Email"/>
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
                            </div>

                            <div>
                                <x-label for="present_address" value="Present Address"/>
                                <x-input id="present_address" class="block mt-1 w-full" type="text" name="present_address" :value="old('present_address')"/>
                            </div>

                            <div>
                                <x-label for="permanent_address" value="Permanent Address"/>
                                <x-input id="permanent_address" class="block mt-1 w-full" type="text" name="permanent_address" :value="old('permanent_address')"/>
                            </div>

                            <div>
                                <x-label for="department" value="Department"/>
                                <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')"/>
                            </div>

                            <div>
                                <x-label for="designation" value="Designation"/>
                                <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')"/>
                            </div>

                            <div>
                                <x-label for="employer_name" value="Employer Name"/>
                                <x-input id="employer_name" class="block mt-1 w-full" type="text" name="employer_name" :value="old('employer_name')"/>
                            </div>

                            <div>
                                <x-label for="employee_personal_number" value="Employee Personal Number"/>
                                <x-input id="employee_personal_number" class="block mt-1 w-full" type="text" name="employee_personal_number" :value="old('employee_personal_number')"/>
                            </div>

                            <div>
                                <x-label for="employment_status" value="Employment Status"/>
                                <x-input id="employment_status" class="block mt-1 w-full" type="text" name="employment_status" :value="old('employment_status')"/>
                            </div>

                            <div>
                                <x-label for="monthly_gross_salary" value="Monthly Gross Salary"/>
                                <x-input id="monthly_gross_salary" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_gross_salary" :value="old('monthly_gross_salary')"/>
                            </div>

                            <div>
                                <x-label for="date_of_retirement" value="Date of Retirement"/>
                                <x-input id="date_of_retirement" class="block mt-1 w-full" type="date" name="date_of_retirement" :value="old('date_of_retirement')"/>
                            </div>

                            <div>
                                <x-label for="relationship_to_borrower" value="Relationship to Borrower"/>
                                <x-input id="relationship_to_borrower" class="block mt-1 w-full" type="text" name="relationship_to_borrower" :value="old('relationship_to_borrower')"/>
                            </div>

                            <div>
                                <x-label for="dob" value="Date of Birth"/>
                                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')"/>
                            </div>

                            <div>
                                <x-label for="ntn" value="NTN"/>
                                <x-input id="ntn" class="block mt-1 w-full" type="text" name="ntn" :value="old('ntn')"/>
                            </div>

                            <div>
                                <x-label for="nature_of_business" value="Nature of Business"/>
                                <x-input id="nature_of_business" class="block mt-1 w-full" type="text" name="nature_of_business" :value="old('nature_of_business')"/>
                            </div>

                            <div>
                                <x-label for="title_of_business" value="Title of Business"/>
                                <x-input id="title_of_business" class="block mt-1 w-full" type="text" name="title_of_business" :value="old('title_of_business')"/>
                            </div>

                            <div>
                                <x-label for="major_business_activities" value="Major Business Activities"/>
                                <x-input id="major_business_activities" class="block mt-1 w-full" type="text" name="major_business_activities" :value="old('major_business_activities')"/>
                            </div>

                            <div>
                                <x-label for="exact_location_of_business_place" value="Exact Location of Business Place"/>
                                <x-input id="exact_location_of_business_place" class="block mt-1 w-full" type="text" name="exact_location_of_business_place" :value="old('exact_location_of_business_place')"/>
                            </div>

                            <div>
                                <x-label for="business_bank_account_maintained" value="Business Bank Account Maintained"/>
                                <x-input id="business_bank_account_maintained" class="block mt-1 w-full" type="text" name="business_bank_account_maintained" :value="old('business_bank_account_maintained')"/>
                            </div>

                            <div>
                                <x-label for="annual_turnover" value="Annual Turnover"/>
                                <x-input id="annual_turnover" class="block mt-1 w-full" type="number" step="0.01" min="0" name="annual_turnover" :value="old('annual_turnover')"/>
                            </div>

                            <!-- Additional Fields -->
                            <div>
                                <x-label for="bps_sps_no" value="BPS or SPS No."/>
                                <x-input id="bps_sps_no" class="block mt-1 w-full" type="text" name="bps_sps_no" :value="old('bps_sps_no')"/>
                            </div>

                            <div>
                                <x-label for="date_of_joining" value="Date of Joining"/>
                                <x-input id="date_of_joining" class="block mt-1 w-full" type="date" name="date_of_joining" :value="old('date_of_joining')"/>
                            </div>

                            <div>

                                <x-label for="remaining_service_25_years" value="Remaining Service (25 years)"/>
                                <x-input id="remaining_service_25_years" class="block mt-1 w-full" type="number" step="0.01" min="0" name="remaining_service_25_years" :value="old('remaining_service_25_years')"/>

                            </div>

                            <div>
                                <x-label for="remaining_service_60_years" value="Remaining Service ( years)"/>

                                <x-input id="remaining_service_60_years" class="block mt-1 w-full" type="number" step="0.01" min="0" name="remaining_service_60_years" :value="old('remaining_service_60_years')"/>
                            </div>

                            <div>
                                <x-label for="ddo_title" value="Title of the DDO"/>
                                <x-input id="ddo_title" class="block mt-1 w-full" type="text" name="ddo_title" :value="old('ddo_title')"/>
                            </div>

                            <div>
                                <x-label for="monthly_salary" value="Monthly Take Home Salary"/>
                                <x-input id="monthly_salary" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_salary" :value="old('monthly_salary')"/>
                            </div>

                            <div>
                                <x-label for="other_monthly_income" value="Other Monthly Income"/>
                                <x-input id="other_monthly_income" class="block mt-1 w-full" type="number" step="0.01" min="0" name="other_monthly_income" :value="old('other_monthly_income')"/>
                            </div>

                            <div>
                                <x-label for="no_of_dependents" value="No. of Dependents"/>
                                <x-input id="no_of_dependents" class="block mt-1 w-full" type="number" min="0" name="no_of_dependents" :value="old('no_of_dependents')"/>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cnicInput = document.getElementById('national_id');
            const mobileInput = document.getElementById('phone_number_two');

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

        });
    </script>
</x-app-layout>
