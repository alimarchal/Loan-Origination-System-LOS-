<x-app-layout>
    @push('header')
        <style>
            @media print {
                body {
                    font-size: 9px!important; /* 11 point font size for print */
                }
            }

            body {
                font-family: 'Calibri', sans-serif;
                font-size: 12px;
                line-height: 1.3;
                margin: 0px;
                padding: 0px;
                /*padding: 20px;*/
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 15px;
                page-break-inside: avoid;
            }

            th, td {
                border: 1px solid black;
                /*padding: 4px;*/
                padding-left: 5px;
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


            .w-10 {
                width: 10%;
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
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Applicant Information
        </h2>
        @include('back-navigation')

    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded-lg">

                <x-status-message class="mb-4" />
                <x-validation-errors class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200">
                    @include('tabs')
                    <div class=" mb-4 p-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent ">

                        <p class="text-center my-2 uppercase  font-bold text-black">
                            Branch & Code: {{ $borrower->branch?->name }} - {{ $borrower->branch?->code }},
                            <br>Region: {{ $borrower->branch?->region?->name }}
                            <br> Date: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-M-Y') }}
                        </p>
                        <h2 class="text-center uppercase underline font-bold text-black">Application Form For {{ $borrower->loan_sub_category?->name }}</h2>

                        <table>
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center">Personal Information</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-bold w-25">Full Name:</td>
                                <td class="w-25">{{ $borrower->name ?? 'N/A' }}</td>
                                <td class="font-bold w-25">RELATIONSHIP STATUS:</td>
                                <td class="w-25">{{ $borrower->relationship_status ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">PARENT/SPOUSE NAME:</td>
                                <td>{{ $borrower->parent_spouse_name ?? 'N/A' }}</td>
                                <td class="font-bold">GENDER:</td>
                                <td>{{ $borrower->gender ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">NATIONAL ID (CNIC):</td>
                                <td>{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
                                <td class="font-bold">NTN:</td>
                                <td>{{ $borrower->ntn ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">PARENT/SPOUSE NATIONAL ID (CNIC):</td>
                                <td>{{ $borrower->parent_spouse_national_id_cnic ?? 'N/A' }}</td>
                                <td class="font-bold">NUMBER OF DEPENDENTS:</td>
                                <td>{{ $borrower->number_of_dependents ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">EDUCATIONAL QUALIFICATION:</td>
                                <td>{{ $borrower->education_qualification ?? 'N/A' }}</td>
                                <td class="font-bold">EMAIL:</td>
                                <td>{{ $borrower->email ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Phone Number:</td>
                                <td>{{ $borrower->phone_number ?? 'N/A' }}</td>

                                    <td class="font-bold">MOBILE NUMBER:</td>
                                    <td>{{ $borrower->mobile_number ?? 'N/A' }}</td>
                            </tr>
                            <tr>

                                <td class="font-bold">PRESENT ADDRESS:</td>
                                <td>{{ $borrower->present_address ?? 'N/A' }}</td>
                                <td class="font-bold">PERMANENT ADDRESS:</td>
                                <td>{{ $borrower->permanent_address ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">OCCUPATION TITLE:</td>
                                <td>{{ $borrower->occupation_title ?? 'N/A' }}</td>
                                <td class="font-bold">DATE OF BIRTH:</td>
                                <td>{{ $borrower->date_of_birth ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">AGE:</td>
                                <td>{{ $borrower->age ?? 'N/A' }}</td>
                                <td class="font-bold">MARITAL STATUS:</td>
                                <td>{{ $borrower->marital_status ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">HOME OWNERSHIP STATUS:</td>
                                <td>{{ $borrower->home_ownership_status ?? 'N/A' }}</td>
                                <td class="font-bold">NATIONALITY:</td>
                                <td>{{ $borrower->nationality ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">NEXT OF KIN NAME:</td>
                                <td>{{ $borrower->next_of_kin_name ?? 'N/A' }}</td>
                                <td class="font-bold">NEXT OF KIN MOBILE NUMBER:</td>
                                <td>{{ $borrower->next_of_kin_mobile_number ?? 'N/A' }}</td>
                            </tr>
                            </tbody>
                        </table>


                        <table>
                            <thead>
                            <tr>
                                <th colspan="4" class="text-center">Employment Information</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-bold w-25">Job Title / Designation</td>
                                <td class="w-25">{{ $borrower->employment_information->job_title_designation ?? 'N/A' }}</td>
                                <td class="font-bold w-25">Employment Status</td>
                                <td class="w-25">{{ $borrower->employment_information->employment_status ?? 'N/A' }}</td>
                            </tr>
                            <tr>

                                <td class="font-bold">Job Title/Designation</td>
                                <td>{{ $borrower->employment_information->job_title_designation ?? 'N/A' }}</td>
                                <td class="font-bold">Department</td>
                                <td>{{ $borrower->employment_information->department ?? 'N/A' }}</td>

                            </tr>
                            <tr>
                                <td class="font-bold">Monthly Gross Salary</td>
                                <td>{{ $borrower->employment_information->monthly_gross_salary ?? 'N/A' }}</td>
                                <td class="font-bold">Monthly Net Salary</td>
                                <td>{{ $borrower->employment_information->service_length_in_years ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Service Length (Months)</td>
                                <td>{{ $borrower->employment_information->service_length_in_months ?? 'N/A' }}</td>
                                <td class="font-bold">Remaining Service Years</td>
                                <td>{{ $borrower->employment_information->remaining_service_years ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Remaining Service Months</td>
                                <td>{{ $borrower->employment_information->remaining_service_months ?? 'N/A' }}</td>
                                <td class="font-bold">Department</td>
                                <td>{{ $borrower->employment_information->department ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Official Address</td>
                                <td>{{ $borrower->employment_information->official_address ?? 'N/A' }}</td>
                                <td class="font-bold">Legal Status</td>
                                <td>{{ $borrower->employment_information->legal_status ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Office Mobile Number</td>
                                <td>{{ $borrower->employment_information->office_mobile_number ?? 'N/A' }}</td>
                                <td class="font-bold">Office Phone Number</td>
                                <td>{{ $borrower->employment_information->office_phone_number ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Personal Number</td>
                                <td>{{ $borrower->employment_information->personal_number ?? 'N/A' }}</td>
                                <td class="font-bold">Grade</td>
                                <td>{{ $borrower->employment_information->grade ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Service Status</td>
                                <td>{{ $borrower->employment_information->service_status ?? 'N/A' }}</td>
                                <td class="font-bold">Mode of Salary Receipt</td>
                                <td>{{ $borrower->employment_information->mode_of_salary_receipt ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Salary Disbursement Office Name</td>
                                <td>{{ $borrower->employment_information->salary_disbursement_office_name ?? 'N/A' }}</td>
                                <td class="font-bold">Contact Person for Disbursement</td>
                                <td>{{ $borrower->employment_information->contact_person_for_disbursement ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">Other Sources of Income</td>
                                <td>{{ $borrower->employment_information->other_sources_of_income ?? 'N/A' }}</td>
                                <td class="font-bold">Service Status</td>
                                <td>{{ $borrower->employment_information->service_status ?? 'N/A' }}</td>
                            </tr>
                            </tbody>
                        </table>


                        <table>
                            <thead>
                            <tr>
                                <th colspan="4" class="text-center">Requested Loan Information</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-bold w-25">Request Date:</td>
                                <td class="w-25">{{ $borrower->applicant_requested_loan_information->request_date ?? 'N/A' }}</td>
                                <td class="font-bold w-25">Requested Amount:</td>
                                <td class="w-25">{{ $borrower->applicant_requested_loan_information->requested_amount ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">Loan Purpose:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->loan_purpose ?? 'N/A' }}</td>
                                <td class="font-bold">Status:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->status ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Tenure in Years:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->tenure_in_years ?? 'N/A' }}</td>
                                <td class="font-bold">Tenure in Months:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->tenure_in_months ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Repayment Frequency:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->repayment_frequency ?? 'N/A' }}</td>
                                <td class="font-bold">Salary Account No:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->salary_account_no ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Salary Account Branch Name:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->salary_account_branch_name ?? 'N/A' }}</td>
                                <td class="font-bold">Salary Account Bank Name:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->salary_account_bank_name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Account with BAJK:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->account_with_bajk ?? 'N/A' }}</td>
                                <td class="font-bold">Account with Other Banks:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->account_with_other_banks ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Markup Rate Type:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->markup_rate_type ?? 'N/A' }}</td>
                                <td class="font-bold">Is Insured:</td>
                                <td>{{ $borrower->applicant_requested_loan_information->is_insured ?? 'N/A' }}</td>
                            </tr>
                            </tbody>
                        </table>


                        @if(!$borrower->guarantor->isEmpty())
                            @foreach($borrower->guarantor as $index => $guarantor)
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="4" class="text-center">Guarantor Details # {{ $index + 1 }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="font-bold w-25">Guarantor Type</td>
                                        <td class="w-25">{{ $guarantor->guarantor_type }}</td>
                                        <td class="font-bold w-25">Title</td>
                                        <td class="w-25">{{ $guarantor->title }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Name</td>
                                        <td>{{ $guarantor->name }}</td>
                                        <td class="font-bold">Father/Husband</td>
                                        <td>{{ $guarantor->father_husband }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">National ID</td>
                                        <td>{{ $guarantor->national_id }}</td>
                                        <td class="font-bold">Phone Number</td>
                                        <td>{{ $guarantor->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Phone Number Two</td>
                                        <td>{{ $guarantor->phone_number_two }}</td>
                                        <td class="font-bold">Email</td>
                                        <td>{{ $guarantor->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Present Address</td>
                                        <td>{{ $guarantor->present_address }}</td>
                                        <td class="font-bold">Permanent Address</td>
                                        <td>{{ $guarantor->permanent_address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Department</td>
                                        <td>{{ $guarantor->department }}</td>
                                        <td class="font-bold">Designation</td>
                                        <td>{{ $guarantor->designation }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Employer Name</td>
                                        <td>{{ $guarantor->employer_name }}</td>
                                        <td class="font-bold">Employee Personal Number</td>
                                        <td>{{ $guarantor->employee_personal_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Employment Status</td>
                                        <td>{{ $guarantor->employment_status }}</td>
                                        <td class="font-bold">Monthly Gross Salary</td>
                                        <td>{{ $guarantor->monthly_gross_salary }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Date of Retirement</td>
                                        <td>{{ $guarantor->date_of_retirement }}</td>
                                        <td class="font-bold">Relationship to Borrower</td>
                                        <td>{{ $guarantor->relationship_to_borrower }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Date of Birth</td>
                                        <td>{{ $guarantor->dob }}</td>
                                        <td class="font-bold">NTN</td>
                                        <td>{{ $guarantor->ntn }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Nature of Business</td>
                                        <td>{{ $guarantor->nature_of_business }}</td>
                                        <td class="font-bold">Title of Business</td>
                                        <td>{{ $guarantor->title_of_business }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Major Business Activities</td>
                                        <td>{{ $guarantor->major_business_activities }}</td>
                                        <td class="font-bold">Exact Location of Business Place</td>
                                        <td>{{ $guarantor->exact_location_of_business_place }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-bold">Business Bank Account Maintained</td>
                                        <td>{{ $guarantor->business_bank_account_maintained }}</td>
                                        <td class="font-bold">Statement of Account Attachment</td>
                                        <td>{{ $guarantor->statement_of_account_attachment }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Net Worth</td>
                                        <td>{{ $guarantor->net_worth }}</td>
                                        <td class="font-bold">Business Registration Number</td>
                                        <td>{{ $guarantor->business_registration_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Annual Revenue</td>
                                        <td>{{ $guarantor->annual_revenue }}</td>
                                        <td class="font-bold">Annual Expenses</td>
                                        <td>{{ $guarantor->annual_expenses }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Net Annual Income</td>
                                        <td>{{ $guarantor->net_annual_income }}</td>
                                        <td class="font-bold">BPS/SPS No</td>
                                        <td>{{ $guarantor->bps_sps_no }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Date of Joining</td>
                                        <td>{{ $guarantor->date_of_joining }}</td>
                                        <td class="font-bold">Remaining Service (25 Years)</td>
                                        <td>{{ $guarantor->remaining_service_25_years }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Remaining Service (60 Years)</td>
                                        <td>{{ $guarantor->remaining_service_60_years }}</td>
                                        <td class="font-bold">DDO Title</td>
                                        <td>{{ $guarantor->ddo_title }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Monthly Salary</td>
                                        <td>{{ $guarantor->monthly_salary }}</td>
                                        <td class="font-bold">Other Monthly Income</td>
                                        <td>{{ $guarantor->other_monthly_income }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Number of Dependents</td>
                                        <td colspan="3">{{ $guarantor->no_of_dependents }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                @if(!$loop->last)
                                    <!-- <div class="page-break"></div> -->
                                @endif
                            @endforeach
                        @endif

                        @if(!$borrower->finance_facility_many->isEmpty())
                            @foreach($borrower->finance_facility_many as $index => $facility)
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="4" class="text-center">Finance Facility Information # {{ $index + 1 }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="font-bold w-25">Institution Name:</td>
                                        <td class="w-25">{{ $facility->institution_name }}</td>
                                        <td class="font-bold w-25">Repayment Status:</td>
                                        <td class="w-25">{{ $facility->repayment_status }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Facility Type:</td>
                                        <td>{{ $facility->facility_type }}</td>
                                        <td class="font-bold">Amount:</td>
                                        <td>{{ $facility->amount }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Loan Limit:</td>
                                        <td>{{ $facility->loan_limit }}</td>
                                        <td class="font-bold">Outstanding Amount:</td>
                                        <td>{{ $facility->outstanding_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Monthly Installment:</td>
                                        <td>{{ $facility->monthly_installment }}</td>
                                        <td class="font-bold">Interest Rate (%):</td>
                                        <td>{{ $facility->interest_rate }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Term (Months):</td>
                                        <td>{{ $facility->term_months }}</td>
                                        <td class="font-bold">Start Date:</td>
                                        <td>{{ $facility->start_date }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">End Date:</td>
                                        <td>{{ $facility->end_date }}</td>
                                        <td class="font-bold">Purpose of Loan:</td>
                                        <td>{{ $facility->purpose_of_loan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Status:</td>
                                        <td>{{ $facility->status }}</td>
                                        <td class="font-bold">Remarks:</td>
                                        <td>{{ $facility->remarks }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                @if(!$loop->last)
                                    <!-- <div class="page-break"></div> -->
                                @endif
                            @endforeach
                        @endif

                        @if(!$borrower->securities->isEmpty())
                            @foreach($borrower->securities as $index => $security)
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="4" class="text-center">Security Details # {{ $index + 1 }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="font-bold w-25">Security Type</td>
                                        <td class="w-25">{{ $security->security_type }}</td>
                                        <td class="font-bold">No Of Post Dated Cheques</td>
                                        <td>{{ $security->post_dated_cheques}}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-bold">Cheques Obtained (Yes/No)</td>
                                        <td>{{ $security->cheques_obtained}}</td>
                                        <td class="font-bold">Remarks</td>
                                        <td>{{ $security->remarks }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Amount </td>
                                        <td>{{ $security->amount}}</td>
                                        <td class="font-bold">Remarks</td>
                                        <td>{{ $security->remarks }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Name Of Guarantor </td>
                                        <td>{{ $security->name_of_guarantor}}</td>
                                        <td class="font-bold">Remarks</td>
                                        <td>{{ $security->remarks }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                @if(!$loop->last)
                                    <!-- <div class="page-break"></div> -->
                                @endif
                            @endforeach
                        @endif

                        @if(!$borrower->reference->isEmpty())
                            @foreach($borrower->reference as $index => $reference)
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="4" class="text-center">References # {{ $index + 1 }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="font-bold w-25">Father/Husband:</td>
                                        <td class="w-25">{{ $reference->father_husband }}</td>
                                        <td class="font-bold w-25">National ID:</td>
                                        <td class="w-25">{{ $reference->national_id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">NTN:</td>
                                        <td>{{ $reference->ntn }}</td>
                                        <td class="font-bold">Date of Birth:</td>
                                        <td>{{ $reference->date_of_birth }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Present Address:</td>
                                        <td>{{ $reference->present_address }}</td>
                                        <td class="font-bold">Permanent Address:</td>
                                        <td>{{ $reference->permanent_address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Phone Number:</td>
                                        <td>{{ $reference->phone_number }}</td>
                                        <td class="font-bold">Phone Number Two:</td>
                                        <td>{{ $reference->phone_number_two }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Phone Number Three:</td>
                                        <td>{{ $reference->phone_number_three }}</td>
                                        <td class="font-bold">Email:</td>
                                        <td>{{ $reference->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Fax:</td>
                                        <td>{{ $reference->fax }}</td>
                                        <td class="font-bold">Designation:</td>
                                        <td>{{ $reference->designation }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Relationship to Borrower:</td>
                                        <td colspan="3">{{ $reference->relationship_to_borrower }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                @if(!$loop->last)
                                    <!-- <div class="page-break"></div> -->
                                @endif
                            @endforeach
                        @endif

                        @if(!$borrower->documents_uploaded->isEmpty())
                            <table>
                                <thead>
                                <tr>
                                    <th colspan="4" class="text-center">Documents</th>
                                </tr>
                                <tr>
                                    <th class="w-25">ID</th>
                                    <th class="w-25">Document Type</th>
                                    <th class="w-25">Description</th>
                                    <th class="w-25">Attachment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($borrower->documents_uploaded as $doc)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $doc->document_type }}</td>
                                        <td>{{ $doc->description }}</td>
                                        <td>@if(!empty($doc->path_attachment))
                                                Yes
                                            @else
                                                No
                                            @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                        @if(!$borrower->listHouseHoldItems->isEmpty())
                            <table>
                                <thead>
                                <tr>
                                    <th colspan="4" class="text-center">Household Items</th>
                                </tr>
                                <tr>
                                    <th>Description of Items</th>
                                    <th>Quantity</th>
                                    <th>Market Value</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($borrower->listHouseHoldItems as $item)
                                    <tr>
                                        <td>{{ $item->description_of_items }}</td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-center">{{ $item->market_value }}</td>
                                        <td class="text-center">{{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif


                        @if(!empty($borrower->obligor_score_card))
                            <table>
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Measurement / Factor</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Score Gained</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($borrower->obligor_score_cards as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-left">
                                            {{ \App\Models\ObligorScoreCardFactor::find($item->score_card_factor_id)?->factor }}
                                        </td>
                                        <td class="text-left">
                                            {{ \App\Models\OscfOpt::find($item->score_card_factor_opt_id)->options }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->score_gained }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif


                        <div class="page-break"></div>

                        <h2 class="text-sm text-center my-2 uppercase underline font-bold text-black">BASIC BORROWER'S FACT SHEET – FOR INDIVIDUALS / CONSUMERS</h2>
                        <h2 class="text-sm text-center my-2 uppercase  font-bold text-black">(TO BE COMPLETED IN CAPITAL LETTERS OR TYPEWRITTEN)</h2>
                        <h2 class="text-sm text-center my-2 font-bold text-black">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>
                        <div class="relative overflow-x-auto">
                            <div class="relative overflow-x-auto">
                                @php
                                    $address = $borrower->permanent_address; // Example address
                                    $limit = 20; // Character limit for the first line

                                    // Check if the address is longer than the limit
                                    if (strlen($address) > $limit) {
                                        $breakpoint = strrpos(substr($address, 0, $limit), ' '); // Find last space before limit
                                        $firstLine = substr($address, 0, $breakpoint); // Text before the breakpoint
                                        $secondLine = substr($address, $breakpoint + 1); // Text after the breakpoint
                                    } else {
                                        $firstLine = $address;
                                        $secondLine = '';
                                    }
                                @endphp
                                <table class="table-auto w-full border-collapse border border-black">
                                    <thead class="border-black uppercase">
                                    <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                        <th class="border-black border py-1 px-2 text-center" colspan="4"> BORROWER'S PROFILE</th>
                                    </tr>
                                    </thead>

                                    <tbody class="text-black">
                                    <tr>
                                        <td class="font-bold w-25">NAME:</td>
                                        <td class="w-25">{{ strtoupper($borrower->name) }}</td>
                                        <td class="font-bold w-25">ADDRESS:</td>
                                        <td class="w-25">{{ strtoupper($firstLine) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">ADDRESS (LINE 2):</td>
                                        <td class="w-25">{{ strtoupper($secondLine) }}</td>
                                        <td class="font-bold w-25">PHONE #</td>
                                        <td class="w-25"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">FAX #:</td>
                                        <td class="w-25">{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">EMAIL ADDRESS:</td>
                                        <td class="w-25">{{ $borrower->ntn ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">CNIC:</td>
                                        <td class="w-25">{{ $borrower->parent_spouse_national_id_cnic ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">NTN:</td>
                                        <td class="w-25">{{ $borrower->number_of_dependents ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">FATHER’S NAME:</td>
                                        <td class="w-25">{{ $borrower->education_qualification ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">FATHER’S CNIC #:</td>
                                        <td class="w-25">{{ $borrower->email ?? 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>


                                @if($borrower->reference->isNotEmpty())
                                    @if($borrower->reference->count() == 2)
                                        @if(!$borrower->reference->isEmpty())
                                            @foreach($borrower->reference as $index => $reference)
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th colspan="4" class="text-center">References # {{ $index + 1 }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="font-bold w-25">Father/Husband:</td>
                                                        <td class="w-25">{{ $reference->father_husband }}</td>
                                                        <td class="font-bold w-25">National ID:</td>
                                                        <td class="w-25">{{ $reference->national_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">NTN:</td>
                                                        <td>{{ $reference->ntn }}</td>
                                                        <td class="font-bold">Date of Birth:</td>
                                                        <td>{{ $reference->date_of_birth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Present Address:</td>
                                                        <td>{{ $reference->present_address }}</td>
                                                        <td class="font-bold">Permanent Address:</td>
                                                        <td>{{ $reference->permanent_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Phone Number:</td>
                                                        <td>{{ $reference->phone_number }}</td>
                                                        <td class="font-bold">Phone Number Two:</td>
                                                        <td>{{ $reference->phone_number_two }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Phone Number Three:</td>
                                                        <td>{{ $reference->phone_number_three }}</td>
                                                        <td class="font-bold">Email:</td>
                                                        <td>{{ $reference->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Fax:</td>
                                                        <td>{{ $reference->fax }}</td>
                                                        <td class="font-bold">Designation:</td>
                                                        <td>{{ $reference->designation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Relationship to Borrower:</td>
                                                        <td colspan="3">{{ $reference->relationship_to_borrower }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                @if(!$loop->last)
                                                    <!-- <div class="page-break"></div> -->
                                                @endif
                                            @endforeach
                                        @endif

                                    @else
                                        <h1 class="text-2xl text-red-500">You must add at least two reference not more then two</h1>
                                    @endif
                                @else
                                    <h1 class="text-2xl text-red-500">Please add at least two reference</h1>
                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">NATURE OF BUSINESS / PROFESSION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-25">Nature of Business Profession</td>
                                            <td class="w-25">{{ $borrower->applicant_requested_loan_information->nature_of_business }}</td>
                                            <td class="font-bold w-25">Any Other</td>
                                            <td class="w-25">{{ $borrower->applicant_requested_loan_information->nature_of_business_other }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif






                                @if($borrower->finance_facility_many->isNotEmpty())

                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">EXISTING LIMITS AND STATUS</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" rowspan="2"></th>
                                            <th class="text-center align-middle" rowspan="2">Amount (Rs)</th>
                                            <th class="text-center align-middle" rowspan="2">Expiry Date</th>
                                            <th class="text-center align-middle" colspan="3">Status</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Regular</th>
                                            <th class="text-center">Amount Overdue</th>
                                            <th class="text-center">Amount Rescheduled</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($borrower->finance_facility_many as $item)
                                            <tr>
                                                <td class="font-bold w-16 text-center">{{ $item->facility_type }}</td>
                                                <td class="w-16 text-center">{{ $item->sanctioned_amount }}</td>
                                                <td class="w-16 text-center">{{ $item->end_date }} </td>
                                                <td class="w-16 text-center">{{ $item->repayment_status }}</td>
                                                <td class="font-bold w-16 text-center">{{ $item->outstanding_amount }}</td>
                                                <td class="w-16 text-center"> {{ $item->amount_rescheduled }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">REQUESTED LIMITS</th>
                                        </tr>

                                        <tr>
                                            <th class="text-center">Regular</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">TENURE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-16">{{ $borrower->applicant_requested_loan_information->fund_based_non_fund_based }}</td>
                                            <td class="w-16">{{ $borrower->applicant_requested_loan_information->requested_amount }}</td>
                                            <td class="w-16">{{ $borrower->applicant_requested_loan_information->tenure_in_years }} Years, and {{ $borrower->applicant_requested_loan_information->tenure_in_months }} Months</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">Details of Payment schedule if term loan sought</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-16">{{ $borrower->applicant_requested_loan_information->details_payment_schedule }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                @endif

                            </div>
                            <x-validation-errors class="mb-4 mt-4"/>
                        </div>
                        <div class="page-break"></div>


                        <h2 class="text-sm text-center my-2 uppercase underline font-bold text-black">
                            Personal Net Worth Statement (PNWS)
                        </h2>
                        <h2 class="text-sm text-center my-2 uppercase  font-bold text-black">
                            ACCOUNT AT THE BANK OF AZAD JAMMU & KASHMIR **********
                        </h2>
                        <h2 class="text-sm text-center my-2 font-bold text-black">
                            DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}
                        </h2>

                        <div class="relative overflow-x-auto">
                            <div class="relative overflow-x-auto">
                                @php
                                    $address = $borrower->present_address; // Example address
                                    $limit = 20; // Character limit for the first line

                                    // Check if the address is longer than the limit
                                    if (strlen($address) > $limit) {
                                        $breakpoint = strrpos(substr($address, 0, $limit), ' '); // Find last space before limit
                                        $firstLine = substr($address, 0, $breakpoint); // Text before the breakpoint
                                        $secondLine = substr($address, $breakpoint + 1); // Text after the breakpoint
                                    } else {
                                        $firstLine = $address;
                                        $secondLine = '';
                                    }
                                @endphp
                                <table class="table-auto w-full border-collapse border border-black">
                                    <thead class="border-black uppercase">
                                    <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                        <th class="border-black border py-1 px-2 text-center" colspan="4">
                                            Personal Net Worth Statement (PNWS)
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody class="text-black">
                                    <tr>
                                        <td class="font-bold w-25">NAME:</td>
                                        <td class="w-25">{{ strtoupper($borrower->name) }}</td>
                                        <td class="font-bold w-25">ADDRESS:</td>
                                        <td class="w-25">{{ strtoupper($firstLine) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">ADDRESS (LINE 2):</td>
                                        <td class="w-25">{{ strtoupper($secondLine) }}</td>
                                        <td class="font-bold w-25">PHONE #</td>
                                        <td class="w-25">{{ $borrower->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">Mobile #:</td>
                                        <td class="w-25">{{ $borrower->mobile_number ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">EMAIL ADDRESS:</td>
                                        <td class="w-25">{{ $borrower->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">CNIC:</td>
                                        <td class="w-25">{{ $borrower->parent_spouse_national_id_cnic ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">NTN:</td>
                                        <td class="w-25">{{ $borrower->number_of_dependents ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold w-25">FATHER’S NAME:</td>
                                        <td class="w-25">{{ $borrower->education_qualification ?? 'N/A' }}</td>
                                        <td class="font-bold w-25">FATHER’S CNIC #:</td>
                                        <td class="w-25">{{ $borrower->email ?? 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>


                                @if($borrower->reference->isNotEmpty())
                                    @if($borrower->reference->count() == 2)
                                        @if(!$borrower->reference->isEmpty())
                                            @foreach($borrower->reference as $index => $reference)
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th colspan="4" class="text-center">References # {{ $index + 1 }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="font-bold w-25">Father/Husband:</td>
                                                        <td class="w-25">{{ $reference->father_husband }}</td>
                                                        <td class="font-bold w-25">National ID:</td>
                                                        <td class="w-25">{{ $reference->national_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">NTN:</td>
                                                        <td>{{ $reference->ntn }}</td>
                                                        <td class="font-bold">Date of Birth:</td>
                                                        <td>{{ $reference->date_of_birth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Present Address:</td>
                                                        <td>{{ $reference->present_address }}</td>
                                                        <td class="font-bold">Permanent Address:</td>
                                                        <td>{{ $reference->permanent_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Phone Number:</td>
                                                        <td>{{ $reference->phone_number }}</td>
                                                        <td class="font-bold">Phone Number Two:</td>
                                                        <td>{{ $reference->phone_number_two }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Phone Number Three:</td>
                                                        <td>{{ $reference->phone_number_three }}</td>
                                                        <td class="font-bold">Email:</td>
                                                        <td>{{ $reference->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Fax:</td>
                                                        <td>{{ $reference->fax }}</td>
                                                        <td class="font-bold">Designation:</td>
                                                        <td>{{ $reference->designation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Relationship to Borrower:</td>
                                                        <td colspan="3">{{ $reference->relationship_to_borrower }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                @if(!$loop->last)
                                                    <!-- <div class="page-break"></div> -->
                                                @endif
                                            @endforeach
                                        @endif

                                    @else
                                        <h1 class="text-2xl text-red-500">You must add at least two reference not more then two</h1>
                                    @endif
                                @else
                                    <h1 class="text-2xl text-red-500">Please add at least two reference</h1>
                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">NATURE OF BUSINESS / PROFESSION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-25">Nature of Business Profession</td>
                                            <td class="w-25">{{ $borrower->applicant_requested_loan_information->nature_of_business }}</td>
                                            <td class="font-bold w-25">Any Other</td>
                                            <td class="w-25">{{ $borrower->applicant_requested_loan_information->nature_of_business_other }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif






                                @if($borrower->finance_facility_many->isNotEmpty())

                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">EXISTING LIMITS AND STATUS</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle" rowspan="2"></th>
                                            <th class="text-center align-middle" rowspan="2">Amount (Rs)</th>
                                            <th class="text-center align-middle" rowspan="2">Expiry Date</th>
                                            <th class="text-center align-middle" colspan="3">Status</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Regular</th>
                                            <th class="text-center">Amount Overdue</th>
                                            <th class="text-center">Amount Rescheduled</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($borrower->finance_facility_many as $item)
                                            <tr>
                                                <td class="font-bold w-16 text-center">{{ $item->facility_type }}</td>
                                                <td class="w-16 text-center">{{ $item->sanctioned_amount }}</td>
                                                <td class="w-16 text-center">{{ $item->end_date }} </td>
                                                <td class="w-16 text-center">{{ $item->repayment_status }}</td>
                                                <td class="font-bold w-16 text-center">{{ $item->outstanding_amount }}</td>
                                                <td class="w-16 text-center"> {{ $item->amount_rescheduled }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">REQUESTED LIMITS</th>
                                        </tr>

                                        <tr>
                                            <th class="text-center">Regular</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">TENURE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-16">{{ $borrower->applicant_requested_loan_information->fund_based_non_fund_based }}</td>
                                            <td class="w-16">{{ $borrower->applicant_requested_loan_information->requested_amount }}</td>
                                            <td class="w-16">{{ $borrower->applicant_requested_loan_information->tenure_in_years }} Years, and {{ $borrower->applicant_requested_loan_information->tenure_in_months }} Months</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                @endif



                                @if(!empty($borrower->applicant_requested_loan_information))
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">Details of Payment schedule if term loan sought</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-bold w-16">{{ $borrower->applicant_requested_loan_information->details_payment_schedule }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                @endif

                            </div>
                            <x-validation-errors class="mb-4 mt-4"/>
                        </div>





                        <table class="min-w-max w-full table-auto">
                            <tbody class="text-black text-sm leading-normal">
{{--                            @foreach($osc as $item)--}}
{{--                                <tr class="border-b border-gray-200 hover:bg-gray-100">--}}
{{--                                    <td class="py-1 px-2 text-center">--}}
{{--                                        {{ $loop->iteration }}--}}
{{--                                    </td>--}}
{{--                                    <td class="py-1 px-2 text-left" >--}}
{{--                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">--}}
{{--                                            {{ \App\Models\ObligorScoreCardFactor::find($item->score_card_factor_id)?->factor }}--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="py-1 px-2 text-left">--}}
{{--                                        <div class="space-y-2">--}}

{{--                                            {{ \App\Models\OscfOpt::find($item->score_card_factor_opt_id)->options }}--}}
{{--                                        </div>--}}
{{--                                    </td>--}}

{{--                                    <td class="py-1 px-2 text-center">--}}
{{--                                        <div class="space-y-2">--}}
{{--                                            <div class="text-center">--}}
{{--                                                {{ $item->score_gained }}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                            <tfoot>--}}
{{--                            <tr class="border-b border-gray-200 hover:bg-gray-100 font-extrabold">--}}
{{--                                <td class="py-1 px-2 text-right" colspan="3">--}}
{{--                                    Total--}}
{{--                                </td>--}}
{{--                                <td class="py-1 px-2 text-center" >--}}
{{--                                    {{ number_format($osc->sum('score_gained'),2) }}--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tfoot>--}}
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
