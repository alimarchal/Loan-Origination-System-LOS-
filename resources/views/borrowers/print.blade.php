<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Applicant Information
        </h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg print:shadow-none">

                <x-status-message class="mb-4" />
                <x-validation-errors class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent  ">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent">

                        <p class="text-black text-sm font-extrabold text-center">
                            Branch & Code: {{ $borrower->branch?->name }} - {{ $borrower->branch?->code }},
                            <br>Region: {{ $borrower->branch?->region?->name }}
                            <br> Date: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-M-Y') }}
                        </p>
                        <h2 class="text-black font-extrabold text-sm  uppercase underline text-center">Application Form For {{ $borrower->loan_sub_category?->name }}</h2>

                        @if(!empty($borrower))
                            Yes
                        @endif

                        <title>Personal Information</title>
                        <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assuming you're using Laravel Mix for CSS -->
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 0;
                                color: #333;
                            }
                            .container {
                                max-width: 100%;
                                margin: 0 auto;
                                padding: 20px;
                                box-sizing: border-box;
                            }
                            .personal-info, .business-information, .requested-loan-information {
                                margin-bottom: 20px;
                                padding: 10px;
                                border-radius: 8px;
                                background: #f9f9f9;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            .personal-info h2, .business-information h2, .requested-loan-information h2 {
                                border-bottom: 2px solid #007bff;
                                padding-bottom: 10px;
                                color: #007bff;
                                font-size: 1.5em;
                                margin-bottom: 10px;
                            }
                            .personal-info p, .business-information p, .requested-loan-information ul {
                                margin: 5px 0;
                                font-size: 1em;
                            }
                            .personal-info label {
                                font-weight: bold;
                                display: inline-block;
                                min-width: 200px;
                            }
                            .table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-bottom: 20px;
                            }
                            .table th, .table td {
                                padding: 8px 12px;
                                border: 1px solid #ddd;
                                text-align: left;
                            }
                            .table th {
                                background-color: #f2f2f2;
                                font-weight: bold;
                            }
                            @media (max-width: 768px) {
                                .container {
                                    padding: 10px;
                                }
                                .personal-info label {
                                    display: block;
                                    margin-bottom: 5px;
                                }
                            }
                        </style>

                   <div class="container mx-auto px-4 py-6">
    <div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Personal Information</h2>
    <div class="overflow-x-auto">
        <!-- Table content goes here -->
    </div>
</div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2 border-b font-semibold">Field</th>
                    <th class="px-4 py-2 border-b font-semibold">Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>NAME:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>RELATIONSHIP STATUS:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->relationship_status ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>PARENT/SPOUSE NAME:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->parent_spouse_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>GENDER:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->gender ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>NATIONAL ID (CNIC):</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>NTN:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->ntn ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>PARENT/SPOUSE NATIONAL ID (CNIC):</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->parent_spouse_national_id_cnic ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>NUMBER OF DEPENDENTS:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->number_of_dependents ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>EDUCATIONAL QUALIFICATION:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->education_qualification ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>EMAIL:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>FAX:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->fax ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>NATURE OF BUSINESS:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->nature_of_business ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>DETAILS OF PAYMENT SCHEDULE (IF SOUGHT):</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->details_of_payment_schedule_if_sought ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>RESIDENCE PHONE NUMBER:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->residence_phone_number ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>OFFICE PHONE NUMBER:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->office_phone_number ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>MOBILE NUMBER:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->mobile_number ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>PRESENT ADDRESS:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->present_address ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>PERMANENT ADDRESS:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->permanent_address ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>OCCUPATION TITLE:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->occupation_title ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>JOB TITLE:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->job_title ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>DATE OF BIRTH:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->date_of_birth ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>AGE:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->age ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>MARITAL STATUS:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->marital_status ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>HOME OWNERSHIP STATUS:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->home_ownership_status ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>NATIONALITY:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->nationality ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>NEXT OF KIN NAME:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->next_of_kin_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>NEXT OF KIN MOBILE NUMBER:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->next_of_kin_mobile_number ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>BUSINESS NAME:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->business_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>BUSINESS ADDRESS:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->business_address ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>BUSINESS CONTACT NUMBER:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->business_contact_number ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>BUSINESS EMAIL:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->business_email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>BUSINESS REGISTRATION NUMBER:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->business_registration_number ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


                            @if($borrower->applicant_business_many->isNotEmpty())
                                Yes
                            @endif

                            <div class="container">
                                <div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Employment Information</h2>
    <!-- Table content goes here -->
</div>
                                <table class="table">
                                    <tr>
                                        <th>Job Title / Designation</th>
                                        <td>{{ $borrower->employment_information->job_title_designation ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Employment Status</th>
                                        <td>{{ $borrower->employment_information->employment_status ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Employer Name</th>
                                        <td>{{ $borrower->employment_information->employer_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Monthly Gross Salary</th>
                                        <td>{{ $borrower->employment_information->monthly_gross_salary ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Monthly Net Salary</th>
                                        <td>{{ $borrower->employment_information->monthly_net_salary ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Service Length (Years)</th>
                                        <td>{{ $borrower->employment_information->service_length_in_years ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Service Length (Months)</th>
                                        <td>{{ $borrower->employment_information->service_length_in_months ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $borrower->employment_information->location ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Additional Income</th>
                                        <td>{{ $borrower->employment_information->additional_income ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Other Income Source</th>
                                        <td>{{ $borrower->employment_information->other_income_source ?? 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>

 <div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Requested Loan Information</h2>
    <div class="overflow-x-auto">
        <!-- Requested Loan Information content goes here -->
    </div>
</div>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100 text-left">

            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Request Date:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->request_date ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Requested Amount:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->requested_amount ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Margin on Gold Limit:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->margin_on_gold_limit ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Currency:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->currency ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Loan Purpose:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->loan_purpose ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Status:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->status ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Tenure in Years:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->tenure_in_years ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Tenure in Months:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->tenure_in_months ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Repayment Frequency:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->repayment_frequency ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Salary Account No:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->salary_account_no ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Salary Account Branch Name:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->salary_account_branch_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Salary Account Bank Name:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->salary_account_bank_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Account with BAJK:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->account_with_bajk ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Account with Other Banks:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->account_with_other_banks ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Markup Rate Type:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->markup_rate_type ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border-b"><strong>Is Insured:</strong></td>
                    <td class="px-4 py-2 border-b">{{ $borrower->applicant_requested_loan_information->is_insured ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Refrences</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100 text-left">
        @if($borrower->reference->isEmpty())
            <p>No references available.</p>
        @else
            @foreach($borrower->reference as $reference)
                <div class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md mb-4 p-4">
                    <table class="w-full">
                        <tbody>

                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Father/Husband:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->father_husband }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">National ID:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->national_id }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">NTN:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->ntn }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Date of Birth:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Present Address:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->present_address }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Permanent Address:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->permanent_address }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Phone Number:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->phone_number }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Phone Number Two:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->phone_number_two }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Phone Number Three:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->phone_number_three }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Email:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->email }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Fax:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->fax }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Designation:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->designation }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Relationship to Borrower:</th>
                                <td class="px-4 py-2 border-b">{{ $reference->relationship_to_borrower }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div>

<div><div class="container mx-auto px-4 py-6">
    @if($borrower && $borrower->finance_facility_many && $borrower->finance_facility_many->isNotEmpty())
        <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
            <h2 class="text-2xl font-semibold mb-4">Finance Facility Information</h2>
            @foreach($borrower->finance_facility_many as $facility)
                <div class="mb-6">
                    <table class="w-full border-collapse bg-white">
                        <tbody>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Institution Name:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->institution_name }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Repayment Status:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->repayment_status }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Facility Type:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->facility_type }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Amount:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->amount }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Loan Limit:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->loan_limit }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Outstanding Amount:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->outstanding_amount }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Monthly Installment:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->monthly_installment }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Interest Rate (%):</th>
                                <td class="px-4 py-2 border-b">{{ $facility->interest_rate }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Term (Months):</th>
                                <td class="px-4 py-2 border-b">{{ $facility->term_months }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Start Date:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->start_date }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">End Date:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->end_date }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Purpose of Loan:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->purpose_of_loan }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Status:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->status }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold text-left">Remarks:</th>
                                <td class="px-4 py-2 border-b">{{ $facility->remarks }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    @endif
</div>
<h1 class="text-3xl font-bold mb-6 text-gray-800">Documents</h1>

<div class="document-info bg-white shadow-lg rounded-lg overflow-hidden">
    @if($borrower->documents)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700">

            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">Document Type</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $borrower->documents->document_type }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">Description</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $borrower->documents->description }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">Path Attachment</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        @if($borrower->documents->path_attachment)
                            <a href="{{ asset($borrower->documents->path_attachment) }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">View Document</a>
                            <div class="mt-2">
                                <img src="{{ asset($borrower->documents->path_attachment) }}" alt="Uploaded Document" class="max-w-xs h-auto border border-gray-300 rounded-lg shadow-md">
                            </div>
                        @else
                            <span class="text-gray-500">No attachment available.</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="p-6 text-gray-500">No documents available.</div>
    @endif
</div>
<h1 class="text-2xl font-bold text-gray-900 mb-4">Household Items</h1>
<div class="document-info bg-white shadow-lg rounded-lg overflow-hidden">
    @if($borrower->listHouseHoldItems && $borrower->listHouseHoldItems->isNotEmpty())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Description of Items</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Quantity</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Market Value</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Amount</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($borrower->listHouseHoldItems as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->description_of_items }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->market_value }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="px-6 py-4">No household items found.</p>
    @endif
</div>


</div>

</div>

<h1 class="text-3xl font-bold text-gray-900 mb-6"></h1>

@foreach ($borrower->guarantor as $guarantor)
    <table class="table table-striped">
        <tr>
            <th>Guarantor Type</th>
            <td>{{ $guarantor->guarantor_type }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $guarantor->title }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $guarantor->name }}</td>
        </tr>
        <tr>
            <th>Father/Husband</th>
            <td>{{ $guarantor->father_husband }}</td>
        </tr>
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Guarantor Details</h1>

        <tr>
            <th>National ID</th>
            <td>{{ $guarantor->national_id }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $guarantor->phone_number }}</td>
        </tr>
        <tr>
            <th>Phone Number Two</th>
            <td>{{ $guarantor->phone_number_two }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $guarantor->email }}</td>
        </tr>
        <tr>
            <th>Present Address</th>
            <td>{{ $guarantor->present_address }}</td>
        </tr>
        <tr>
            <th>Permanent Address</th>
            <td>{{ $guarantor->permanent_address }}</td>
        </tr>
        <tr>
            <th>Department</th>
            <td>{{ $guarantor->department }}</td>
        </tr>
        <tr>
            <th>Designation</th>
            <td>{{ $guarantor->designation }}</td>
        </tr>
        <tr>
            <th>Employer Name</th>
            <td>{{ $guarantor->employer_name }}</td>
        </tr>
        <tr>
            <th>Employee Personal Number</th>
            <td>{{ $guarantor->employee_personal_number }}</td>
        </tr>
        <tr>
            <th>Employment Status</th>
            <td>{{ $guarantor->employment_status }}</td>
        </tr>
        <tr>
            <th>Monthly Gross Salary</th>
            <td>{{ $guarantor->monthly_gross_salary }}</td>
        </tr>
        <tr>
            <th>Date of Retirement</th>
            <td>{{ $guarantor->date_of_retirement }}</td>
        </tr>
        <tr>
            <th>Relationship to Borrower</th>
            <td>{{ $guarantor->relationship_to_borrower }}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>{{ $guarantor->dob }}</td>
        </tr>
        <tr>
            <th>NTN</th>
            <td>{{ $guarantor->ntn }}</td>
        </tr>
        <tr>
            <th>Nature of Business</th>
            <td>{{ $guarantor->nature_of_business }}</td>
        </tr>
        <tr>
            <th>Title of Business</th>
            <td>{{ $guarantor->title_of_business }}</td>
        </tr>
        <tr>
            <th>Major Business Activities</th>
            <td>{{ $guarantor->major_business_activities }}</td>
        </tr>
        <tr>
            <th>Exact Location of Business Place</th>
            <td>{{ $guarantor->exact_location_of_business_place }}</td>
        </tr>
        <tr>
            <th>Business Bank Account Maintained</th>
            <td>{{ $guarantor->business_bank_account_maintained }}</td>
        </tr>
        <tr>
            <th>Statement of Account Attachment</th>
            <td>{{ $guarantor->statement_of_account_attachment }}</td>
        </tr>
        <tr>
            <th>Net Worth</th>
            <td>{{ $guarantor->net_worth }}</td>
        </tr>
        <tr>
            <th>Business Registration Number</th>
            <td>{{ $guarantor->business_registration_number }}</td>
        </tr>
        <tr>
            <th>Annual Revenue</th>
            <td>{{ $guarantor->annual_revenue }}</td>
        </tr>
        <tr>
            <th>Annual Expenses</th>
            <td>{{ $guarantor->annual_expenses }}</td>
        </tr>
        <tr>
            <th>Net Annual Income</th>
            <td>{{ $guarantor->net_annual_income }}</td>
        </tr>
        <!-- New fields -->
        <tr>
            <th>BPS/SPS No</th>
            <td>{{ $guarantor->bps_sps_no }}</td>
        </tr>
        <tr>
            <th>Date of Joining</th>
            <td>{{ $guarantor->date_of_joining }}</td>
        </tr>
        <tr>
            <th>Remaining Service (25 Years)</th>
            <td>{{ $guarantor->remaining_service_25_years }}</td>
        </tr>
        <tr>
            <th>Remaining Service (60 Years)</th>
            <td>{{ $guarantor->remaining_service_60_years }}</td>
        </tr>
        <tr>
            <th>DDO Title</th>
            <td>{{ $guarantor->ddo_title }}</td>
        </tr>
        <tr>
            <th>Monthly Salary</th>
            <td>{{ $guarantor->monthly_salary }}</td>
        </tr>
        <tr>
            <th>Other Monthly Income</th>
            <td>{{ $guarantor->other_monthly_income }}</td>
        </tr>
        <tr>
            <th>Number of Dependents</th>
            <td>{{ $guarantor->no_of_dependents }}</td>
        </tr>
    </table>
    <br>
@endforeach

<h1 class="text-2xl font-bold text-gray-900 mb-4">Vehicle</h1>
<div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
    <table class="table table-striped">
        <tr>
            <th>Vehicle Type</th>
            <td>{{ $borrower->vehicle?->vehicle_type }}</td>
        </tr>
        <tr>
            <th>Price of Vehicle</th>
            <td>{{ $borrower->vehicle?->price_of_vehicle }}</td>
        </tr>
        <tr>
            <th>Down Payment Percentage</th>
            <td>{{ $borrower->vehicle?->down_payment_percentage }}</td>
        </tr>
        <tr>
            <th>Finance Amount</th>
            <td>{{ $borrower->vehicle?->finance_amount }}</td>
        </tr>
        <tr>
            <th>Model Year</th>
            <td>{{ $borrower->vehicle?->model_year }}</td>
        </tr>
        <tr>
            <th>Year of Manufacturing</th>
            <td>{{ $borrower->vehicle?->year_of_manufacturing }}</td>
        </tr>
        <tr>
            <th>Make</th>
            <td>{{ $borrower->vehicle?->make }}</td>
        </tr>
        <tr>
            <th>Model</th>
            <td>{{ $borrower->vehicle?->model }}</td>
        </tr>
        <tr>
            <th>Cost of Vehicle</th>
            <td>{{ $borrower->vehicle?->cost_of_vehicle }}</td>
        </tr>
        <tr>
            <th>Equity Down Payment</th>
            <td>{{ $borrower->vehicle?->equity_dawn_payment }}</td>
        </tr>
        <tr>
            <th>Financial Institute Contribution</th>
            <td>{{ $borrower->vehicle?->financial_institute_contribution }}</td>
        </tr>
        <tr>
            <th>Name of Authorized Dealer/Seller</th>
            <td>{{ $borrower->vehicle?->name_authorized_dealer_seller }}</td>
        </tr>
        <tr>
            <th>Repayment Mode</th>
            <td>{{ $borrower->vehicle?->repayment_mode }}</td>
        </tr>
        <tr>
            <th>Tenure in Years</th>
            <td>{{ $borrower->vehicle?->tenure_in_years }}</td>
        </tr>
        <tr>
            <th>Tenure in Months</th>
            <td>{{ $borrower->vehicle?->tenure_in_month }}</td>
        </tr>
        <tr>
            <th>Markup Rate Type</th>
            <td>{{ $borrower->vehicle?->markup_rate_type }}</td>
        </tr>
    </table>
</div>


</div>

    </div>
</div>

</div>





</x-app-layout>
