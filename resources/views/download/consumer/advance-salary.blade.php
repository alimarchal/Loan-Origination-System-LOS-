<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Information</title>


    <style>
        body {
            font-family: "Calibri" !important;
            font-size: 12px;
            line-height: 1.3;
            margin: 0;
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
</head>
<body>
<div class="text-center mb-4">
    <img src="{{ $base64Image }}" alt="BAJK Logo" style="width: 250px; height: 100px;">
    <p class="font-bold uppercase">
        Branch & Code: {{ $borrower->branch?->name }} - {{ $borrower->branch?->code }},<br>
        Region: {{ $borrower->branch?->region?->name }}<br>
        Date: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-M-Y') }}


    </p>
    <h4 class="font-bold uppercase">
        Application Form For: {{ $borrower->loan_sub_category?->name }}
        <br>
        LOAN ID: {{ $borrower->id }}
        <br>
        REQUESTED LOAN AMOUNT: {{ $borrower->applicant_requested_loan_information->requested_amount }}
    </h4>
</div>

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
        <td class="font-bold w-25">Relationship Status:</td>
        <td class="w-25">{{ $borrower->relationship_status ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Parent/Spouse Name:</td>
        <td>{{ $borrower->parent_spouse_name ?? 'N/A' }}</td>
        <td class="font-bold">Gender:</td>
        <td>{{ $borrower->gender ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">National ID (CNIC):</td>
        <td>{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
        <td class="font-bold">NTN:</td>
        <td>{{ $borrower->ntn ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Parent/Spouse National ID (CNIC):</td>
        <td>{{ $borrower->parent_spouse_national_id_cnic ?? 'N/A' }}</td>
        <td class="font-bold">Number of Dependents:</td>
        <td>{{ $borrower->number_of_dependents ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Educational Qualification:</td>
        <td>{{ $borrower->education_qualification ?? 'N/A' }}</td>
        <td class="font-bold">Email:</td>
        <td>{{ $borrower->email ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Phone Number:</td>
        <td>{{ $borrower->phone_number ?? 'N/A' }}</td>
        <td class="font-bold">Mobile Number:</td>
        <td>{{ $borrower->mobile_number ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Present Address:</td>
        <td>{{ $borrower->present_address ?? 'N/A' }}</td>
        <td class="font-bold">Permanent Address:</td>
        <td>{{ $borrower->permanent_address ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Occupation Title:</td>
        <td>{{ $borrower->occupation_title ?? 'N/A' }}</td>
        <td class="font-bold">Date of Birth:</td>
        <td>{{ isset($borrower->date_of_birth) ? \Carbon\Carbon::parse($borrower->date_of_birth)->format('d-m-Y') : 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Age:</td>
        <td>{{ $borrower->age ?? 'N/A' }}</td>
        <td class="font-bold">Marital Status:</td>
        <td>{{ $borrower->marital_status ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Home Qwnership Status:</td>
        <td>{{ $borrower->home_ownership_status ?? 'N/A' }}</td>
        <td class="font-bold">Nationality:</td>
        <td>{{ $borrower->nationality ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Next of Kin Name:</td>
        <td>{{ $borrower->next_of_kin_name ?? 'N/A' }}</td>
        <td class="font-bold">Next of Kin Mobile Number:</td>
        <td>{{ $borrower->next_of_kin_mobile_number ?? 'N/A' }}</td>
    </tr>

    </tbody>
</table>


<!-- <div class="page-break"></div> -->

@if(!empty($borrower->employment_information))
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
            <td class="font-bold">Service Status</td>
            <td>{{ $borrower->employment_information->service_status ?? 'N/A' }}</td>
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
            <td colspan="6">{{ $borrower->employment_information->other_sources_of_income ?? 'N/A' }}</td>
        </tr>
        </tbody>
    </table>
@else
    <h1 style="color: red; text-align: center; font-size: 25px;">

        Employment Data Missing
    </h1>
@endif

@if($borrower->applicant_requested_loan_information)
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
            <td class="font-bold">Margin on Gold Limit:</td>
            <td>{{ $borrower->applicant_requested_loan_information->margin_on_gold_limit ?? 'N/A' }}</td>
            <td class="font-bold">Currency:</td>
            <td>{{ $borrower->applicant_requested_loan_information->currency ?? 'N/A' }}</td>
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
@else
    <h1 style="color: red; text-align: center">
        Requested Loan Information Is Missing
    </h1>
@endif


<!-- <div class="page-break"></div> -->

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
                <td class="w-25">{{ $reference->father_husband ?? 'N/A'}}</td>
                <td class="font-bold w-25">National ID:</td>
                <td class="w-25">{{ $reference->national_id ?? 'N/A'}}</td>
            </tr>
            <tr>
                <td class="font-bold">NTN:</td>
                <td>{{ $reference->ntn }}</td>
                <td class="font-bold">Date of Birth:</td>
                <td>{{ isset($reference->date_of_birth) ? \Carbon\Carbon::parse($reference->date_of_birth)->format('d-m-Y') : 'N/A' }}</td>

            </tr>
            <tr>
                <td class="font-bold">Present Address:</td>
                <td>{{ $reference->present_address ?? 'N/A'}}</td>
                <td class="font-bold">Permanent Address:</td>
                <td>{{ $reference->permanent_address ?? 'N/A'}}</td>
            </tr>
            <tr>
                <td class="font-bold">Phone Number:</td>
                <td>{{ $reference->phone_number?? 'N/A' }}</td>
                <td class="font-bold">Mobile Number:</td>
                <td>{{ $reference->mobile_number?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Email:</td>
                <td>{{ $reference->email?? 'N/A' }}</td>
                <td class="font-bold">Designation:</td>
                <td>{{ $reference->designation ?? 'N/A'}}</td>
            </tr>

            <tr>
                <td class="font-bold">Relationship to Borrower:</td>
                <td colspan="3">{{ $reference->relationship_to_borrower?? 'N/A' }}</td>
            </tr>
            </tbody>
        </table>
        @if(!$loop->last)
            <!-- <div class="page-break"></div> -->
        @endif
    @endforeach
@else
    <h1 style="color: red; text-align: center">
        Reference Missing
    </h1>
@endif


<!-- <div class="page-break"></div> -->

@if(!$borrower->finance_facility_many->isEmpty())
    @foreach($borrower->finance_facility_many as $index => $facility)
        <table style="width: 100%; font-size: 14px;">
            <thead>
            <tr>
                <th colspan="4" class="text-center">Finance Facility Information # {{ $index + 1 }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="font-bold w-25">Institution Name:</td>
                <td class="w-25">{{ $facility->institution_name ?? 'N/A' }}</td>
                <td class="font-bold w-25">Repayment Status:</td>
                <td class="w-25">{{ $facility->repayment_status ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Facility Type:</td>
                <td>{{ $facility->facility_type ?? 'N/A' }}</td>
                <td class="font-bold">Amount:</td>
                <td>{{ $facility->amount ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Loan Limit:</td>
                <td>{{ $facility->loan_limit ?? 'N/A' }}</td>
                <td class="font-bold">Outstanding Amount:</td>
                <td>{{ $facility->outstanding_amount ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Monthly Installment:</td>
                <td>{{ $facility->monthly_installment ?? 'N/A' }}</td>
                <td class="font-bold">Interest Rate (%):</td>
                <td>{{ $facility->interest_rate ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Term (Months):</td>
                <td>{{ $facility->term_months ?? 'N/A' }}</td>
                <td class="font-bold">Start Date:</td>
                <td>{{ $facility->start_date ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">End Date:</td>
                <td>{{ $facility->end_date ?? 'N/A' }}</td>
                <td class="font-bold">Purpose of Loan:</td>
                <td>{{ $facility->purpose_of_loan ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Status:</td>
                <td>{{ $facility->status ?? 'N/A' }}</td>
                <td class="font-bold">Remarks:</td>
                <td>{{ $facility->remarks ?? 'N/A' }}</td>
            </tr>

            </tbody>
        </table>
        @if(!$loop->last)
            <!-- <div class="page-break"></div> -->
        @endif
    @endforeach
@else
    <h1 style="color: red; text-align: center">
        Finance Facility Skipped / Not Filled
    </h1>
@endif
<!-- <div class="page-break"></div> -->
@if($borrower->documents_uploaded->isNotEmpty())
    <table style="width: 100%; font-size: 14px;">
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
                <td>{{ $doc->document_type ?? 'N/A' }}</td>
                <td>{{ $doc->description ?? 'N/A' }}</td>
                <td>
                    @if(!empty($doc->path_attachment))
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <h1 style="color: red; text-align: center">
        Documents are missing
    </h1>

@endif


@if(!$borrower->listHouseHoldItems->isEmpty())
    <table style="width: 100%; font-size: 15px;">
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
        @php
            $totalQuantity = 0;
            $totalMarketValue = 0;
            $totalAmount = 0;
        @endphp

        @foreach($borrower->listHouseHoldItems as $item)
            <tr>
                <td>{{ $item->description_of_items }}</td>
                <td class="text-center">{{ $item->quantity }}</td>
                <td class="text-center">{{ $item->market_value }}</td>
                <td class="text-center">{{ $item->amount }}</td>

                @php
                    $totalQuantity += $item->quantity;
                    $totalMarketValue += $item->market_value;
                    $totalAmount += $item->amount;
                @endphp
            </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Total</th>
            <td class="text-center">{{ $totalQuantity }}</td>
            <td class="text-center">{{ $totalMarketValue }}</td>
            <td class="text-center">{{ $totalAmount }}</td>
        </tr>
        </tfoot>
    </table>
@else
    <h1 style="color: red; text-align: center">
        Household Items Missing
    </h1>
@endif

<!-- <div class="page-break"></div> -->

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
                <td class="w-25">{{ $guarantor->guarantor_type ?? 'N/A' }}</td>
                <td class="font-bold w-25">Title</td>
                <td class="w-25">{{ $guarantor->title ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Name</td>
                <td>{{ $guarantor->name ?? 'N/A' }}</td>
                <td class="font-bold">Father/Husband</td>
                <td>{{ $guarantor->father_husband ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">National ID</td>
                <td>{{ $guarantor->national_id ?? 'N/A' }}</td>
                <td class="font-bold">Phone Number</td>
                <td>{{ $guarantor->phone_number ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Phone Number Two</td>
                <td>{{ $guarantor->phone_number_two ?? 'N/A' }}</td>
                <td class="font-bold">Email</td>
                <td>{{ $guarantor->email ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Present Address</td>
                <td>{{ $guarantor->present_address ?? 'N/A' }}</td>
                <td class="font-bold">Permanent Address</td>
                <td>{{ $guarantor->permanent_address ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Department</td>
                <td>{{ $guarantor->department ?? 'N/A' }}</td>
                <td class="font-bold">Designation</td>
                <td>{{ $guarantor->designation ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Employer Name</td>
                <td>{{ $guarantor->employer_name ?? 'N/A' }}</td>
                <td class="font-bold">Employee Personal Number</td>
                <td>{{ $guarantor->employee_personal_number ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Employment Status</td>
                <td>{{ $guarantor->employment_status ?? 'N/A' }}</td>
                <td class="font-bold">Monthly Gross Salary</td>
                <td>{{ $guarantor->monthly_gross_salary ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Date of Retirement</td>
                <td>{{ isset($guarantor->date_of_retirement) ? \Carbon\Carbon::parse($guarantor->date_of_retirement)->format('d-m-Y') : 'N/A' }}</td>
                <td class="font-bold">Relationship to Borrower</td>
                <td>{{ $guarantor->relationship_to_borrower ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Date of Birth</td>
                <td>{{ isset($guarantor->dob) ? \Carbon\Carbon::parse($guarantor->dob)->format('d-m-Y') : 'N/A' }}</td>
                <td class="font-bold">NTN</td>
                <td>{{ $guarantor->ntn ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Nature of Business</td>
                <td>{{ $guarantor->nature_of_business ?? 'N/A' }}</td>
                <td class="font-bold">Title of Business</td>
                <td>{{ $guarantor->title_of_business ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Major Business Activities</td>
                <td>{{ $guarantor->major_business_activities ?? 'N/A' }}</td>
                <td class="font-bold">Exact Location of Business Place</td>
                <td>{{ $guarantor->exact_location_of_business_place ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Business Bank Account Maintained</td>
                <td>{{ $guarantor->business_bank_account_maintained ?? 'N/A' }}</td>
                <td class="font-bold">Statement of Account Attachment</td>
                <td>{{ $guarantor->statement_of_account_attachment ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Net Worth</td>
                <td>{{ $guarantor->net_worth ?? 'N/A' }}</td>
                <td class="font-bold">Business Registration Number</td>
                <td>{{ $guarantor->business_registration_number ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Annual Revenue</td>
                <td>{{ $guarantor->annual_revenue ?? 'N/A' }}</td>
                <td class="font-bold">Annual Expenses</td>
                <td>{{ $guarantor->annual_expenses ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Net Annual Income</td>
                <td>{{ $guarantor->net_annual_income ?? 'N/A' }}</td>
                <td class="font-bold">BPS/SPS No</td>
                <td>{{ $guarantor->bps_sps_no ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Date of Joining</td>
                <td>{{ isset($guarantor->date_of_joining) ? \Carbon\Carbon::parse($guarantor->date_of_joining)->format('d-m-Y') : 'N/A' }}</td>
                <td class="font-bold">Remaining Service (25 Years)</td>
                <td>{{ $guarantor->remaining_service_25_years ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Remaining Service (60 Years)</td>
                <td>{{ $guarantor->remaining_service_60_years ?? 'N/A' }}</td>
                <td class="font-bold">DDO Title</td>
                <td>{{ $guarantor->ddo_title ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Monthly Salary</td>
                <td>{{ $guarantor->monthly_salary ?? 'N/A' }}</td>
                <td class="font-bold">Other Monthly Income</td>
                <td>{{ $guarantor->other_monthly_income ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Number of Dependents</td>
                <td colspan="3">{{ $guarantor->no_of_dependents ?? 'N/A' }}</td>
            </tr>

            </tbody>
        </table>
        @if(!$loop->last)
            <!-- <div class="page-break"></div> -->
        @endif
    @endforeach
@else
    <h1 style="color: red; text-align: center">
        Guarantor Missing
    </h1>
@endif


<!-- <div class="page-break"></div> -->

@if(!$borrower->vehicles->isEmpty())
    @foreach($borrower->vehicles as $index => $vehicle)
        <table>
            <thead>
            <tr>
                <th colspan="4" class="text-center">Vehicle Details # {{ $index + 1 }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="font-bold w-25">Vehicle Type</td>
                <td class="w-25">{{ $vehicle->vehicle_type ?? 'N/A' }}</td>
                <td class="font-bold w-25">Price of Vehicle</td>
                <td class="w-25">{{ $vehicle->price_of_vehicle ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Down Payment Percentage</td>
                <td>{{ $vehicle->down_payment_percentage ?? 'N/A' }}</td>
                <td class="font-bold">Finance Amount</td>
                <td>{{ $vehicle->finance_amount ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Model Year</td>
                <td>{{ $vehicle->model_year ?? 'N/A' }}</td>
                <td class="font-bold">Year of Manufacturing</td>
                <td>{{ $vehicle->year_of_manufacturing ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Make</td>
                <td>{{ $vehicle->make ?? 'N/A' }}</td>
                <td class="font-bold">Model</td>
                <td>{{ $vehicle->model ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Cost of Vehicle</td>
                <td>{{ $vehicle->cost_of_vehicle ?? 'N/A' }}</td>
                <td class="font-bold">Equity Down Payment</td>
                <td>{{ $vehicle->equity_dawn_payment ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Financial Institute Contribution</td>
                <td>{{ $vehicle->financial_institute_contribution ?? 'N/A' }}</td>
                <td class="font-bold">Name of Authorized Dealer/Seller</td>
                <td>{{ $vehicle->name_authorized_dealer_seller ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Repayment Mode</td>
                <td>{{ $vehicle->repayment_mode ?? 'N/A' }}</td>
                <td class="font-bold">Tenure in Years</td>
                <td>{{ $vehicle->tenure_in_years ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Tenure in Months</td>
                <td>{{ $vehicle->tenure_in_month ?? 'N/A' }}</td>
                <td class="font-bold">Markup Rate Type</td>
                <td>{{ $vehicle->markup_rate_type ?? 'N/A' }}</td>
            </tr>

            </tbody>
        </table>
        @if(!$loop->last)
            <!-- <div class="page-break"></div> -->
        @endif
    @endforeach
@endif

@if($borrower->securities->isNotEmpty())

    @php
        // Define the security types and their respective columns
        $securityTypes = [
            'Hypothecation of House Hold Item' => 'Amount',
            'Personal Guarantee' => 'Name Guarantor',
            'Post Dated Cheques' => 'Post Dated Cheque'
        ];

        // Initialize arrays to track existing and missing securities
        $existingSecurities = [];
        $missingSecurities = [
            'Hypothecation of House Hold Item' => true,
            'Personal Guarantee' => true,
            'Post Dated Cheques' => true
        ];

        // Check which securities are present
        foreach($borrower->securities as $security) {
            if (array_key_exists($security->security_type, $missingSecurities)) {
                $existingSecurities[$security->security_type] = $security;
                $missingSecurities[$security->security_type] = false;
            }
        }
    @endphp

    <table style="width: 100%; font-size: 14px;">
        <thead>
        <tr>
            <th colspan="6" class="text-center">Security Detail Information</th>
        </tr>
        <tr>
            <th class="text-center">Security Type</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Name Guarantor</th>
            <th class="text-center">Post Dated Cheque</th>
            <th class="text-center">Cheque Obtained</th>
            <th class="text-center">Remarks</th>
        </tr>
        </thead>
        <tbody>
        @foreach($borrower->securities as $security)
            <tr>
                <td class="font-bold w-25">{{ $security->security_type }}</td>
                <td class="w-16 text-center">{{ $security->amount ?? 'N/A' }}</td>
                <td class="w-16 text-center">{{ $security->name_of_guarantor ?? 'N/A' }}</td>
                <td class="w-16 text-center">{{ $security->post_dated_cheques ?? 'N/A' }}</td>
                <td class="w-16 text-center">{{ $security->cheques_obtained ?? 'N/A' }}</td>
                <td class="w-16 text-center">{{ $security->remarks ?? 'N/A' }}</td>
            </tr>
        @endforeach
        @if($borrower->securities->count() == 0)
            <tr>
                <td colspan="6" class="text-center">No securities found</td>
            </tr>
        @endif
        @foreach($missingSecurities as $type => $isMissing)
            @if($isMissing)
                <tr style="color: red; background-color: #fdd; text-align: center;">
                    <td class="font-bold w-25">{{ $type }}</td>
                    <td colspan="5" style="color: red; text-align: center;">Missing</td>

                </tr>
            @endif
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
                <td class="font-bold w-25">PHONE </td>
                <td class="w-25">{{ $borrower->phone_number ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold w-25">CNIC:</td>
                <td class="w-25">{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
                <td class="font-bold w-25">EMAIL ADDRESS:</td>
                <td class="w-25">{{ $borrower->email ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold w-25">FATHER’S NAME:</td>
                <td class="w-25">{{ $borrower->parent_spouse_name ?? 'N/A' }}</td>
                <td class="font-bold w-25">FATHER’S CNIC :</td>
                <td class="w-25">{{ $borrower->parent_spouse_national_id_cnic ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold w-25">NTN:</td>
                <td colspan="3" class="w-25">{{ $borrower->ntn ?? 'N/A' }}</td>
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
                                <td class="w-25">{{ $reference->father_husband ?? 'N/A' }}</td>
                                <td class="font-bold w-25">National ID:</td>
                                <td class="w-25">{{ $reference->national_id ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">NTN:</td>
                                <td>{{ $reference->ntn ?? 'N/A' }}</td>
                                <td class="font-bold">Date of Birth:</td>
                                <td>{{ isset($reference->date_of_birth) ? \Carbon\Carbon::parse($reference->date_of_birth)->format('d-m-Y') : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Present Address:</td>
                                <td>{{ $reference->present_address ?? 'N/A' }}</td>
                                <td class="font-bold">Permanent Address:</td>
                                <td>{{ $reference->permanent_address ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Phone Number:</td>
                                <td>{{ $reference->phone_number ?? 'N/A' }}</td>
                                <td class="font-bold">Mobile Number:</td>
                                <td>{{ $reference->mobile_number ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Email:</td>
                                <td>{{ $reference->email ?? 'N/A' }}</td>
                                <td class="font-bold">Designation:</td>
                                <td>{{ $reference->designation ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Relationship to Borrower:</td>
                                <td colspan="3">{{ $reference->relationship_to_borrower ?? 'N/A' }}</td>
                            </tr>

                            </tbody>
                        </table>
                        @if(!$loop->last)
                            <!-- <div class="page-break"></div> -->
                        @endif
                    @endforeach
                @else
                    <h1 style="color: red; text-align: center; font-size: 20px;">

                        Reference Missing
                    </h1>

                @endif

            @else
                <h1 class="text-2xl text-red-500">You must add at least two reference not more then two</h1>
            @endif
        @else
            <h1 style="color: red; text-align: center; font-size: 20px;">

                Please add at least two reference
            </h1>

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
                    <td class="w-25">{{ $borrower->applicant_requested_loan_information->nature_of_business ?? 'N/A' }}</td>
                    <td class="font-bold w-25">Any Other</td>
                    <td class="w-25">{{ $borrower->applicant_requested_loan_information->nature_of_business_other ?? 'N/A' }}</td>
                </tr>

                </tbody>
            </table>
        @else
            <h1 style="color: red; text-align: center; font-size: 20px;">

                Requested Loan DataMissing
            </h1>

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
                        <td class="font-bold w-16 text-center">{{ $item->facility_type ?? 'N/A' }}</td>
                        <td class="w-16 text-center">{{ $item->sanctioned_amount ?? 'N/A' }}</td>
                        <td class="w-16 text-center">{{ isset($item->end_date) ? \Carbon\Carbon::parse($item->end_date)->format('d-m-Y') : 'N/A' }}</td>
                        <td class="w-16 text-center">{{ $item->repayment_status ?? 'N/A' }}</td>
                        <td class="font-bold w-16 text-center">{{ $item->outstanding_amount ?? 'N/A' }}</td>
                        <td class="w-16 text-center">{{ $item->amount_rescheduled ?? 'N/A' }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        @endif

        @if(!empty($borrower->applicant_requested_loan_information))
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                <tr>
                    <th colspan="3" class="text-center">REQUESTED LIMITS</th>
                </tr>
                <tr>
                    <th style="padding: 8px; text-align: left; border: 1px solid ">Regular</th>
                    <th style="padding: 8px; text-align: left; border: 1px solid">Amount</th>
                    <th style="padding: 8px; text-align: left; border: 1px solid">TENURE</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $borrower->applicant_requested_loan_information->fund_based_non_fund_based }}</td>
                    <td>{{ $borrower->applicant_requested_loan_information->requested_amount }}</td>
                    <td>{{ $borrower->applicant_requested_loan_information->tenure_in_years }} Years, and {{ $borrower->applicant_requested_loan_information->tenure_in_months }} Months</td>
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
                    <td colspan="6" class="font-bold w-16">{{ $borrower->applicant_requested_loan_information->details_payment_schedule }}</td>
                </tr>
                </tbody>
            </table>

        @endif

    </div>
    <x-validation-errors class="mb-4 mt-4"/>
</div>
<div class="page-break"></div>

@if(!empty($borrower->obligor_score_card))
    <h1 class="text-center">Obligor Score Card</h1>
    <table>
        <thead>
        <tr>
            <th class="text-center" style="width: 10%">ID</th>
            <th class="text-center" style="width: 30%;">Measurement / Factor</th>
            <th class="text-center" style="width: 50%;">Description</th>
            <th class="text-center" style="width: 10%;">Score Gained</th>
        </tr>
        </thead>
        <tbody>
        @foreach($borrower->obligor_score_cards as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="w-30">{{ \App\Models\ObligorScoreCardFactor::find($item->score_card_factor_id)?->factor }}</td>
                <td class="w-30">{{ \App\Models\OscfOpt::find($item->score_card_factor_opt_id)->options }}</td>
                <td class="text-center">{{ $item->score_gained }}</td>
            </tr>
        @endforeach

        <tr>
            <td class="text-right" colspan="3">
                Total
            </td>
            <td class="text-center">
                {{ number_format($borrower->obligor_score_cards->sum('score_gained'),2) }}
            </td>
        </tr>
        </tbody>
    </table>
@else
    <h1 style="color: red; text-align: center">
        Obligor Score Card Is Missing
    </h1>
@endif


<div class="page-break"></div>

<div class="mb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
    <h2 class="text-sm text-center my-2 uppercase underline font-bold text-black">Personal Net Worth Statement (PNWS)</h2>
    <h2 class="text-sm text-center my-2 uppercase font-bold text-black">ACCOUNT AT THE BANK OF AZAD JAMMU & KASHMIR {{ $borrower->branch?->name }}</h2>
    <h2 class="text-sm text-center my-2 font-bold text-black">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>

    @if(!empty($borrower->personalNetWorthStat))
        <table>
            <thead>
            <tr>
                <th colspan="4" class="text-center">Personal Net Worth Statement (PNWS)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="font-bold w-25">Name:</td>
                <td class="w-25">{{ $borrower->name ?? 'N/A' }}</td>
                <td class="font-bold">Parent/Spouse Name:</td>
                <td>{{ $borrower->parent_spouse_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">National ID (CNIC):</td>
                <td>{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
                <td class="font-bold">NTN:</td>
                <td>{{ $borrower->ntn ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Present Address:</td>
                <td>{{ $borrower->present_address ?? 'N/A' }}</td>
                <td class="font-bold">Permanent Address:</td>
                <td>{{ $borrower->permanent_address ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Educational Qualification:</td>
                <td>{{ $borrower->education_qualification ?? 'N/A' }}</td>
                <td class="font-bold">Profession:</td>
                <td>{{ $borrower->occupation_title ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-bold">Phone Number:</td>
                <td>{{ $borrower->phone_number ?? 'N/A' }}</td>
                <td class="font-bold">Mobile Number:</td>
                <td>{{ $borrower->mobile_number ?? 'N/A' }}</td>
            </tr>
            </tbody>
        </table>
    @endif

    @if($borrower->personalNetWorthStat?->personal_form_a?->isNotEmpty())
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th colspan="5" class="text-left">A. Immovable Assets/ Real Estates, owned in Personal Capacity</th>
            </tr>
            <tr>
                <th class="text-center">Particulars</th>
                <th class="text-center">In the name of</th>
                <th class="text-center">Self acquired Or Family property</th>
                <th class="text-center">Encumbered d to (*)</th>
                <th class="text-center">Market Value</th>
            </tr>
            </thead>
            <tbody>
            @foreach($borrower->personalNetWorthStat?->personal_form_a as $item)
                <tr>
                    <td class="text-center">{{ $item->particulars ?? 'N/A' }}</td>
                    <td class="text-center">{{ $item->in_name_of ?? 'N/A' }}</td>
                    <td class="text-center">{{ $item->self_acquired_family_property ?? 'N/A' }}</td>
                    <td class="text-center">{{ $item->encumber_d_to_asterisk ?? 'N/A' }}</td>
                    <td class="text-center">{{ number_format($item->market_value, 2) ?? 'N/A' }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="4" class="text-right">Total Market Value</th>
                <th class="text-center">{{ number_format($borrower->personalNetWorthStat?->personal_form_a->sum('market_value'), 2) }}</th>
            </tr>
            </tfoot>
        </table>
    @else
        <h1 style="color: red; text-align: center">
            Form A (Immovable Assets/ Real Estates) is missing.
        </h1>
    @endif

    @if($borrower->personalNetWorthStat?->personal_form_b?->isNotEmpty())
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th colspan="3" class="text-left">B. Movable Assets/ Securities etc.</th>
            </tr>
            <tr>
                <th class="text-center">Particulars</th>
                <th class="text-center">Description</th>
                <th class="text-center">Current Value</th>
            </tr>
            </thead>
            <tbody>
            @foreach($borrower->personalNetWorthStat?->personal_form_b as $item)
                <tr>
                    <td class="text-center">{{ $item->particulars ?? 'N/A' }}</td>
                    <td class="text-center">{{ $item->description ?? 'N/A' }}</td>
                    <td class="text-center">{{ number_format($item->current_value, 2) ?? 'N/A' }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="2" class="text-right">Total Value</th>
                <th class="text-center">{{ number_format($borrower->personalNetWorthStat?->personal_form_b->sum('current_value'), 2) }}</th>
            </tr>
            </tfoot>
        </table>
    @else
        <h1 style="color: red; text-align: center">
            Form B (Movable Assets/ Securities) is missing.
        </h1>
    @endif

    @if($borrower->personalNetWorthStat?->personal_form_c?->isNotEmpty())
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>


                <th colspan="3" class="text-left">C. Liabilities Other than on business.</th>
            </tr>
            <tr>
                <th class="text-center">Particulars</th>
                <th class="text-center">Description</th>
                <th class="text-center">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($borrower->personalNetWorthStat?->personal_form_c as $item)
                <tr>
                    <td class="text-center">{{ $item->particulars ?? 'N/A' }}</td>
                    <td class="text-center">{{ $item->description ?? 'N/A' }}</td>
                    <td class="text-center">{{ number_format($item->amount, 2) ?? 'N/A' }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="2" class="text-right">Total Amount</th>
                <th class="text-center">{{ number_format($borrower->personalNetWorthStat?->personal_form_c->sum('amount'), 2) }}</th>
            </tr>
            </tfoot>
        </table>
    @else
        <h1 style="color: red; text-align: center">
            Form C (Liabilities) is missing
        </h1>
    @endif

    @if($borrower->personalNetWorthStat?->personal_form_a?->isNotEmpty() && $borrower->personalNetWorthStat?->personal_form_b?->isNotEmpty() && $borrower->personalNetWorthStat?->personal_form_c?->isNotEmpty())
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th colspan="2" class="text-center">Net Worth = (A + B - C)</th>
                <th class="text-center">{{ number_format(
                        ($borrower->personalNetWorthStat?->personal_form_a->sum('market_value') +
                        $borrower->personalNetWorthStat?->personal_form_b->sum('current_value')) -
                        $borrower->personalNetWorthStat?->personal_form_c->sum('amount'), 2)
                    }}</th>
            </tr>
            </thead>
        </table>
    @endif
    @if($borrower->personalNetWorthStat?->personal_form_d?->isNotEmpty())
        <table>
            <thead>
            <tr>
                <th colspan="4" class="text-left">D.Details of Assignd Guarantees/Sureties</th>
            </tr>
            <tr>
                <th class="text-center w-20">Bank Institution</th>
                <th class="text-center w-20">Amount</th>
                <th class="text-center w-20">Expiry Date</th>
                <th class="text-center w-20">Nature of Guarantee/ Surety</th>
            </tr>
            </thead>
            <tbody>
            @foreach($borrower->personalNetWorthStat->personal_form_d as $item)
                <tr>
                    <td class="w-20 text-center">{{ $item->bank_institution ?? 'N/A' }}</td>
                    <td class="w-20 text-center">{{ $item->amount ?? 'N/A' }}</td>
                    <td class="w-20 text-center">{{ $item->expiry_date ?? 'N/A' }}</td>
                    <td class="w-20 text-center">{{ $item->nature_of_guarantee ?? 'N/A' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 style="color: red; text-align: center">
            Form D is missing
        </h1>
    @endif


    <div class="p-4">
        @if($borrower->is_lock == "Yes" && $borrower->status == "Submitted")
            <h1 class="text-center mb-4 text-2xl font-bold">Official Use Only</h1>

            <table id="loanApplicationTable" class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th colspan="10" class="py-2 px-4 bg-gray-100 text-center font-bold">Loan Application Tracking Status</th>
                </tr>
                <tr>
                    <th class="py-2 px-x text-center border-b">ID</th>
                    <th class="py-2 px-x text-center border-b">From</th>
                    <th class="py-2 px-x text-center border-b">To</th>
                    <th class="py-2 px-x text-center border-b">Name</th>
                    <th class="py-2 px-x text-center border-b">Designation</th>
                    <th class="py-2 px-x text-center border-b">Placement</th>
                    <th class="py-2 px-x text-center border-b">EMP No</th>
                    <th class="py-2 px-x text-center border-b">Remarks</th>
                    <th class="py-2 px-x border-b  text-center">Status</th>
                    <th class="py-2 px-x border-b  text-center">Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($borrower->statusHistories as $index => $item)
                    <tr>
                        <td class="py-2 px-2 border-b text-center font-bold" style="horiz-align: center; vertical-align: middle">{{ $loop->iteration }}</td>
                        <td class="py-2 px-2 border-b text-center" style="horiz-align: center; vertical-align: middle">{{ $item->from->name ?? 'N/A' }}</td>
                        <td class="py-2 px-2 border-b text-center" style="horiz-align: center; vertical-align: middle">{{ $item->to->name ?? 'N/A' }}</td>
                        <td class="py-2 px-2 border-b text-center" style="horiz-align: center; vertical-align: middle">{{ $item->name ?? 'N/A' }}</td>
                        <td class="py-2 px-2 border-b text-center" style="horiz-align: center; vertical-align: middle">{{ $item->designation ?? 'N/A' }}</td>
                        <td class="py-2 px-2 border-b text-center" style="horiz-align: center; vertical-align: middle">{{ $item->placement ?? 'N/A' }}</td>
                        <td class="py-2 px-2 border-b text-center" style="horiz-align: center; vertical-align: middle">{{ $item->employee_no ?? 'N/A' }}</td>
                        <td class="py-2 px-2 border-b">
                           {{ $item->description }}
                        </td>
                        <td class="py-2 px-2 border-b text-center w-5" style="horiz-align: center; vertical-align: middle">{{ $item->loan_status->name ?? 'N/A' }}</td>
                        <td class="py-2 px-2 border-b text-center w-5" style="horiz-align: center; vertical-align: middle">{{ \Carbon\Carbon::parse($item->created_at) ?? 'N/A' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif

    </div>

</div>


</body>
</html>
