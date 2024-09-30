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
                                <td class="" style="width: 30%!important;">
                                    <x-input id="TypeOfFinance" class="block shadow-none w-full h-8 rounded-none" type="text" name="TypeOfFinance" value=" {{ $borrower->loan_category->name}} - {{ $borrower->loan_sub_category->name }}" readonly />
                                </td>
                                <td class="font-bold" style="width: 20%!important;">SGL Code:</td>
                                <td class="" style="width: 30%!important;">
                                    <x-input id="SglCode" class="block shadow-none w-full h-8 rounded-none" type="text" name="SglCode" value="4160"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold">Nature Of Finance:</td>
                                <td>
                                    <x-input id="NatureOfFinance" class="block shadow-none w-full h-8 rounded-none" type="text" name="NatureOfFinance" value="Demand Finance"/>
                                </td>
                                <td class="font-bold">Purpose Of Finance:</td>
                                <td>
                                    <x-input id="NatureOfFinance" class="block shadow-none w-full h-8 rounded-none" type="text" name="NatureOfFinance" value="{{ $borrower->applicant_requested_loan_information->loan_purpose ?? 'N/A' }}"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold">Tenure:</td>
                                <td>
                                    <x-input id="title" class="block shadow-none w-full h-8 rounded-none" type="text" name="title" :value="$borrower->applicant_requested_loan_information->tenure_in_months"/>

{{--                                    {{$borrower->applicant_requested_loan_information->tenure_in_months }}--}}
                                </td>
                                <td class="font-bold">Take Home Salary:</td>
                                <td >
                                    <x-input id="TakeHomeSalary" class="block w-full h-8 rounded-none" type="text" name="TakeHomeSalary" :value="$borrower->employment_information->monthly_gross_salary ?? 'N/A'"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold">DSR (Required):</td>
                                <td>
                                    <x-input id="DSR_Required" class="block w-full h-8 rounded-none" type="text" name="DSR_Required" value="40%" />
                                </td>
                                <td class="font-bold">DSR(Actual):</td>
                                <td>
                                    <x-input id="DSR_Actual" class="block w-full h-8 rounded-none" type="text" name="DSR_Actual" value="26.22%" />
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold">Status:</td>
                                <td>
                                    <x-input id="RequestedAmountStatus" class="block w-full h-8 rounded-none" type="text" name="RequestedAmountStatus" :value="$borrower->applicant_requested_loan_information?->status" readonly />
                                </td>
                                <td class="font-bold">Amount of Finance / Limit:</td>
                                <td>
                                    <x-input id="AmountOfFinanceLimit" class="block w-full h-8 rounded-none" type="text" name="AmountOfFinanceLimit" :value="$borrower->applicant_requested_loan_information?->requested_amount" />
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold">Previous Enhancement O/S:</td>
                                <td>
                                    <x-input id="PreviousOutstanding" class="block w-full h-8 rounded-none" type="text" name="PreviousOutstanding"  />
                                </td>
                                <td class="font-bold">Enhancement :</td>
                                <td>
                                    <x-input id="EnhancementAmount" class="block w-full h-8 rounded-none" type="text" name="EnhancementAmount"  />
                                </td>
                            </tr>
                            <tr>

                                <td class="font-bold">Total Enhancement :</td>
                                <td>
                                    <x-input id="TotalAmount" class="block w-full h-8 rounded-none" type="text" name="TotalAmount"  />
                                </td>
                                <td class="font-bold">Repayment History:</td>
                                <td>
                                <x-input id="RepaymentHistory" class="block w-full h-8 rounded-none" type="text" name="RepaymentHistory" :value="$facility->repayment_status ?? 'N/A'" readonly />
                                </td>
                            </tr>
                            <tr>

                                <td class="font-bold">Rate of Markup:</td>
                                <td>
                                    <x-input id="RateofMarkup" class="block w-full h-8 rounded-none" type="text" name="RateofMarkup"  />
                                </td>
                            </tr>


                            <tr>
                                <td class="font-bold">Repayment Schedule:<br> Monthly Installment</td>
                                <td colspan="3">Tentative Monthly Installment Rs.
                                    <span >
{{--                                        <x-input id="RepaymentScheduleMonthlyInstallment" class=" w-1/6 h-8 " type="text" name="RepaymentScheduleMonthlyInstallment" value="36,205" /> /---}}
                                        <x-input id="RepaymentScheduleMonthlyInstallment" class=" w-1/6 h-8 " type="number" min="0" step="0.01" name="RepaymentScheduleMonthlyInstallment"  /> /-
                                    </span> Including Markup, Life Insurance and Principal.
                                    Grace period for broken days of the month during which loan is disbursed will be allowed i.e.,
                                    only markup shall be charged for grace period whereas Principal repayment will Commence
                                    from subsequent month (Instruction Circular no. CMD/HO/2018/207 dated: January 29, 2018
                                    Repayment Schedule is attached for reference only</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Insurance Treatment:</td>
                                <td >Insurance premium is to be recovered along with monthly installment and be credited to the head of "Insurance Life Insurance-SGL premium payable (Life).</td>
                                <td class="font-bold">Life Insurance-SGL</td>
                                <td>
                                     <x-input id="LifeInsuranceSGL" class="block w-full h-8 rounded-none" type="text" name="LifeInsuranceSGL"  value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold">Recovery Mode of Installment:</td>
                             <td colspan="3">
                            <strong>Regular</strong>; Monthly installment to be recovered on or before 5th of each month.
                             <br>
                             <strong>Default</strong>: Delay payment mark-up @ 02% over and above the normal mark-up rate will be charged on the principal portion of the overdue installment from the due date till the date of recovery and will be recovered from the borrower.
                           Instruction Circular no BAJK/HO/CMD/2022/320 dated: August 19, 2022
                            </td>


                            </tr>


                        <table>
                            <thead>
                            <tr>
                                <th colspan="4" class="text-left">C: Security DETAILS:</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-bold" style="width: 20%!important;">Primary:</td>
                                <td colspan="3"  class="" style="width: 40%!important;">Hypothecation of Household Goods valuing to
                                       <x-input id="SecuritySecondary" class=" w-1/6 h-8 " type="number" min="0" step="0.01" name="SecuritySecondary" value="$securities->amount" /> /-
                                    <br>
                                       (Minimum equivalent to loan amount)
                                     </td>
                             </tr>
                            <tr>
                                <td class="font-bold" style="width: 20%!important;">Secondary:</td>

                                <td>  • {{ $borrower->security->where('security_type','Post Dated Cheques')->first()?->post_dated_cheques }} Post Dated Cheques favoring BAJK along with Departmental undertaking.<br>
                                        @php $guarantor = $borrower->guarantor?->first() @endphp
                                      • One Personal Guarantee: {{ $guarantor->name }}<br>
                                      • Designation:  {{ $guarantor->designation }}<br>
                                      • CNIC:  {{ $guarantor->national_id }}<br>
                                      • Contact #  PP: {{ $guarantor->phone_number }}




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
                                  <td>
                                       <x-input id="BorrowerPGsNoIssued" class="block w-full h-8 rounded-none" type="text" name="BorrowerPGsNoIssued"  />
                                  </td>
                                <td>
                                    <x-input id="BorrowerRPStatus" class="block w-full h-8 rounded-none" type="text" name="BorrowerRPStatus"  />
                                </td>
                            </tr>
                            <tr>
                             <td class="font-bold" style="width: 20%!important;">Guarantor</td>
                                     <td><x-input id="GuarantorPGsNoIssued" class="block w-full h-8 rounded-none" type="text" name="GuarantorPGsNoIssued"  /></td>

                                        <td><x-input id="GuarantorRPStatus" class="block w-full h-8 rounded-none" type="text" name="GuarantorRPStatus"  /></td>

                     </tr>
                            </tbody>
                        </table>


                            <!-- Create the editor container -->
                            <div class="mx-4">
                                <div id="editor">

                                    <h2 class="text-xl font-bold mb-4">E: DOCUMENTS REQUIRED BEFORE DISBURSEMENT:</h2>
                                    <p class="mb-4">Loan may be disbursed only on issuance of the DAC that will be issued on receipt / scrutiny of the following Charge / Security documents for the Principal Plus Total Amount of the Markup), using Bank's standard / approved charge documents (legible copies) having proper stamps affixed for appropriate value.</p>
                                    <ol class="list-decimal pl-6 mb-6">
                                        <li>Letter of Acceptance of Terms and Conditions of the Finance.</li>
                                        <li>Agreement of Finance for Short/Medium/Long Term on Markup basis.</li>
                                        <li>Demand Promissory Note.</li>
                                        <li>Letter of Hypothecation of Moveable Assets.</li>
                                        <li>Letter of Installment.</li>
                                        <li>Letter of Continuity.</li>
                                        <li>Letter of Arrangement.</li>
                                        <li>Letter of Guarantee from the Borrower & Guarantor in their personal capacity.</li>
                                        <li>Undertaking regarding Postdated Cheques in favor of BAJK.</li>
                                        <li>Repayment Schedule of Installment.</li>
                                        <li>Authority Letter to debit the account for recovery of Installment and other charges.</li>
                                    </ol>

                                    <h2 class="text-xl font-bold mb-4">F: GENERAL TERMS AND CONDITIONS:</h2>
                                    <ol class="list-decimal pl-6 mb-6">
                                        <li>The Bank reserves the right to call back the finance at any time or change, or modify any term and conditions, without assigning any reason during currency of the limit.</li>
                                        <li>The facility shall be got adjusted in full by the expiry of the limit positively.</li>
                                        <li>Bank reserves the right to change the markup rate at any time.</li>
                                        <li>Routing of salary as per BAJK approved policy.</li>
                                        <li>Processing fee as per latest schedule of charges to be recovered.</li>
                                        <li>Validity period of this sanctioned advice is thirty days.</li>
                                        <li>In case of Salary Loan Enhancement, the outstanding balance must be settled at the time of disbursement.</li>
                                        <li>Insurance must be obtained as per Bank's Policy.</li>
                                    </ol>

                                    <p class="font-bold mb-4">Note:</p>
                                    <p>The applicant has not availed any multiple loans from BAJK as reported by Regional Offices.</p>

                                    <p class="font-bold mt-6 mb-2">THE PROPOSAL IS SUBMITTED FOR APPROVAL BEFORE (CONCERNED COMMITTEE)</p>

                                </div>
                            </div>



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








                    <!-- Initialize Quill editor -->
                    <script>
                        const quill = new Quill('#editor', {
                            theme: 'snow'
                        });
                    </script>


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
