<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Information</title>


    <style>
        body {
            font-family: Arial, sans-serif;
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
    <p class="font-bold uppercase">
        Branch & Code: {{ $borrower->branch?->name }} - {{ $borrower->branch?->code }},<br>
        Region: {{ $borrower->branch?->region?->name }}<br>
        Date: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-M-Y') }}
    </p>
    <h2 class="font-bold uppercase">Application Form For {{ $borrower->loan_sub_category?->name }}</h2>
</div>

<table>
    <thead>
    <tr>
        <th colspan="4" class="text-center">Personal Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="font-bold w-25">NAME:</td>
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
        <td class="font-bold">FAX:</td>
        <td>{{ $borrower->fax ?? 'N/A' }}</td>
        <td class="font-bold">RESIDENCE PHONE NUMBER:</td>
        <td>{{ $borrower->residence_phone_number ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">MOBILE NUMBER:</td>
        <td>{{ $borrower->mobile_number ?? 'N/A' }}</td>
        <td class="font-bold">PRESENT ADDRESS:</td>
        <td>{{ $borrower->present_address ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">PERMANENT ADDRESS:</td>
        <td>{{ $borrower->permanent_address ?? 'N/A' }}</td>
        <td class="font-bold">OCCUPATION TITLE:</td>
        <td>{{ $borrower->occupation_title ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">JOB TITLE:</td>
        <td>{{ $borrower->job_title ?? 'N/A' }}</td>
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

<!-- <div class="page-break"></div> -->

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
        <td class="font-bold">Employer Name</td>
        <td>{{ $borrower->employment_information->employer_name ?? 'N/A' }}</td>
        <td class="font-bold">Monthly Gross Salary</td>
        <td>{{ $borrower->employment_information->monthly_gross_salary ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Monthly Net Salary</td>
        <td>{{ $borrower->employment_information->monthly_net_salary ?? 'N/A' }}</td>
        <td class="font-bold">Service Length (Years)</td>
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
        <td class="font-bold">Terminal Benefits</td>
        <td>{{ $borrower->employment_information->terminal_benefits ?? 'N/A' }}</td>
        <td class="font-bold">Other Benefits</td>
        <td>{{ $borrower->employment_information->other_benefits ?? 'N/A' }}</td>
    </tr>
    <tr>
        <td class="font-bold">Other Sources of Income</td>
        <td colspan="3">{{ $borrower->employment_information->other_sources_of_income ?? 'N/A' }}</td>
    </tr>
    </tbody>
</table>

<!-- <div class="page-break"></div> -->

@if(!$borrower->applicant_business_many->isEmpty())
    @foreach($borrower->applicant_business_many as $index => $business)
        <table>
            <thead>
            <tr>
                <th colspan="4" class="text-center">Business Information # {{ $index + 1 }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="font-bold w-25">Business Name</td>
                <td class="w-25">{{ $business->name }}</td>
                <td class="font-bold w-25">Type</td>
                <td class="w-25">{{ $business->type }}</td>
            </tr>
            <tr>
                <td class="font-bold">Address</td>
                <td>{{ $business->address }}</td>
                <td class="font-bold">Landline</td>
                <td>{{ $business->landline }}</td>
            </tr>
            <tr>
                <td class="font-bold">Mobile</td>
                <td>{{ $business->mobile }}</td>
                <td class="font-bold">Designation</td>
                <td>{{ $business->designation }}</td>
            </tr>
            <tr>
                <td class="font-bold">Monthly Revenue</td>
                <td>{{ $business->monthly_revenue }}</td>
                <td class="font-bold">Experience (Years)</td>
                <td>{{ $business->experience_years }}</td>
            </tr>
            <tr>
                <td class="font-bold">Monthly Expenses</td>
                <td>{{ $business->monthly_expenses }}</td>
                <td class="font-bold">Net Monthly Income</td>
                <td>{{ $business->net_monthly_income }}</td>
            </tr>
            <tr>
                <td class="font-bold">Start Date</td>
                <td>{{ $business->start_date }}</td>
                <td class="font-bold">Acquisition Date</td>
                <td>{{ $business->acquisition_date }}</td>
            </tr>
            <tr>
                <td class="font-bold">Number of Employees</td>
                <td>{{ $business->number_of_employees }}</td>
                <td class="font-bold">Tax Number</td>
                <td>{{ $business->tax_number }}</td>
            </tr>
            <tr>
                <td class="font-bold">Initial Investment</td>
                <td>{{ $business->initial_investment }}</td>
                <td class="font-bold">Investment Source</td>
                <td>{{ $business->investment_source }}</td>
            </tr>
            <tr>
                <td class="font-bold">Premises Status</td>
                <td>{{ $business->premises_status }}</td>
                <td class="font-bold">Monthly Rent</td>
                <td>{{ $business->monthly_rent }}</td>
            </tr>
            <tr>
                <td class="font-bold">Average Monthly Balance</td>
                <td>{{ $business->average_monthly_balance }}</td>
                <td class="font-bold">Account Opening Date</td>
                <td>{{ $business->account_opening_date }}</td>
            </tr>
            <tr>
                <td class="font-bold">Average Balance (Six Months)</td>
                <td>{{ $business->average_balance_six_months }}</td>
                <td class="font-bold">Account Number</td>
                <td>{{ $business->account_no }}</td>
            </tr>
            <tr>
                <td class="font-bold">Bank Name</td>
                <td>{{ $business->bank_name }}</td>
                <td class="font-bold">Net Worth</td>
                <td>{{ $business->net_worth }}</td>
            </tr>
            </tbody>
        </table>
        @if(!$loop->last)
            <!-- <div class="page-break"></div> -->
        @endif
    @endforeach
@endif

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

<!-- <div class="page-break"></div> -->

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

<!-- <div class="page-break"></div> -->

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
                <td class="w-25">{{ $vehicle->vehicle_type }}</td>
                <td class="font-bold w-25">Price of Vehicle</td>
                <td class="w-25">{{ $vehicle->price_of_vehicle }}</td>
            </tr>
            <tr>
                <td class="font-bold">Down Payment Percentage</td>
                <td>{{ $vehicle->down_payment_percentage }}</td>
                <td class="font-bold">Finance Amount</td>
                <td>{{ $vehicle->finance_amount }}</td>
            </tr>
            <tr>
                <td class="font-bold">Model Year</td>
                <td>{{ $vehicle->model_year }}</td>
                <td class="font-bold">Year of Manufacturing</td>
                <td>{{ $vehicle->year_of_manufacturing }}</td>
            </tr>
            <tr>
                <td class="font-bold">Make</td>
                <td>{{ $vehicle->make }}</td>
                <td class="font-bold">Model</td>
                <td>{{ $vehicle->model }}</td>
            </tr>
            <tr>
                <td class="font-bold">Cost of Vehicle</td>
                <td>{{ $vehicle->cost_of_vehicle }}</td>
                <td class="font-bold">Equity Down Payment</td>
                <td>{{ $vehicle->equity_dawn_payment }}</td>
            </tr>
            <tr>
                <td class="font-bold">Financial Institute Contribution</td>
                <td>{{ $vehicle->financial_institute_contribution }}</td>
                <td class="font-bold">Name of Authorized Dealer/Seller</td>
                <td>{{ $vehicle->name_authorized_dealer_seller }}</td>
            </tr>
            <tr>
                <td class="font-bold">Repayment Mode</td>
                <td>{{ $vehicle->repayment_mode }}</td>
                <td class="font-bold">Tenure in Years</td>
                <td>{{ $vehicle->tenure_in_years }}</td>
            </tr>
            <tr>
                <td class="font-bold">Tenure in Months</td>
                <td>{{ $vehicle->tenure_in_month }}</td>
                <td class="font-bold">Markup Rate Type</td>
                <td>{{ $vehicle->markup_rate_type }}</td>
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
                <td class="font-bold w-25">Value of Gold Ornaments</td>
                <td class="w-25">{{ $security->value_of_gold_ornaments_value }}</td>
            </tr>
            <tr>
                <td class="font-bold">Gross Weight of Gold</td>
                <td>{{ $security->gross_weight_of_gold }}</td>
                <td class="font-bold">Gold Bag Seal No</td>
                <td>{{ $security->gold_bag_seal_no }}</td>
            </tr>
            <tr>
                <td class="font-bold">Market Value</td>
                <td>{{ $security->market_value }}</td>
                <td class="font-bold">Forced Sales Value (FSV)</td>
                <td>{{ $security->forced_sales_value_fsv }}</td>
            </tr>
            <tr>
                <td class="font-bold">Ownership</td>
                <td>{{ $security->ownership }}</td>
                <td class="font-bold">Lien Account No</td>
                <td>{{ $security->lien_ac_no }}</td>
            </tr>
            <tr>
                <td class="font-bold">Lien Title</td>
                <td>{{ $security->lien_title }}</td>
                <td class="font-bold">Lien Bank Branch</td>
                <td>{{ $security->lien_bank_branch }}</td>
            </tr>
            <tr>
                <td class="font-bold">Lien Amount</td>
                <td>{{ $security->lien_amount }}</td>
                <td class="font-bold">Pledge TDR/SSC/DSC Certificate No</td>
                <td>{{ $security->pledge_tdr_ssc_dsc_cert_no }}</td>
            </tr>
            <tr>
                <td class="font-bold">Pledge Date of Issuance</td>
                <td>{{ $security->pledge_date_of_issuance }}</td>
                <td class="font-bold">Pledge Issuing Office</td>
                <td>{{ $security->pledge_issuing_office }}</td>
            </tr>
            <tr>
                <td class="font-bold">Pledge Amount</td>
                <td>{{ $security->pledge_amount }}</td>
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
<div class="page-break"></div>


<h2 class="text-center">BASIC BORROWER'S FACT SHEET – FOR INDIVIDUALS / CONSUMERS</h2>
<h2 class="text-center">(TO BE COMPLETED IN CAPITAL LETTERS OR TYPEWRITTEN)</h2>
<h2 class="text-center">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>

@php
    $address = $borrower->permanent_address; // Example address
    $limit = 40; // Character limit for the first line

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


<table>
    <thead>
    <tr>
        <th colspan="4" class="text-left">1. BORROWER'S PROFILE:</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="font-bold w-25">Name</td>
        <td class="w-25">{{ strtoupper($borrower->name) }}</td>
        <td class="font-bold w-25">Address</td>
        <td class="w-25">{{ strtoupper($firstLine) }}</td>
    </tr>
    <tr>
        <td class="" colspan="4">{{ strtoupper($secondLine) }} &nbsp;</td>
    </tr>
    <tr>
        <td class="font-bold">FAX #</td>
        <td>{{ $borrower->fax }}</td>
        <td class="font-bold">EMAIL ADDRESS</td>
        <td>{{ strtoupper($borrower->email) }}</td>
    </tr>

    <tr>

        <td class="font-bold">OFFICE:</td>
        <td>{{$borrower->office_phone_number}}</td>
        <td class="font-bold"> RES.</td>
        <td>{{$borrower->residence_phone_number}}</td>
    </tr>
    <tr>

        <td class="font-bold">NATIONAL IDENTITY CARD #</td>
        <td>{{ $borrower->national_id_cnic }}</td>
        <td class="font-bold">NATIONAL TAX #</td>
        <td>{{ $borrower->ntn }}</td>
    </tr>
    <tr>
        <td class="font-bold">FATHER&rsquo;S NAME</td>
        <td>{{ $borrower->parent_spouse_national_id_cnic }}</td>
        <td class="font-bold">FATHER&rsquo;S NATIONAL IDENTITY CARD #</td>
        <td>{{ $borrower->parent_spouse_national_id_cnic }}</td>
    </tr>
    </tbody>

</table>


@if($borrower->reference->isNotEmpty())
    @if($borrower->reference->count() == 2)
        <table>
            <thead>
            <tr>
                <th colspan="4" class="text-left">2. REFERENCES (AT LEAST TWO):</th>
            </tr>
            </thead>

            <tbody>
            @foreach($borrower->reference as $rf)
                @php
                    $address = $rf->permanent_address; // Example address
                    $limit = 40; // Character limit for the first line

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

                <tr>
                    <th colspan="4" class="text-center">Reference # {{ $loop->iteration }}</th>
                </tr>
                <tr>
                    <td class="font-bold w-25">Name</td>
                    <td class="w-25">{{ strtoupper($borrower->name) }}</td>
                    <td class="font-bold w-25">Address</td>
                    <td class="w-25">{{ strtoupper($firstLine) }}</td>
                </tr>

                <tr>
                    <td colspan="4">{{ strtoupper($secondLine) }}&nbsp;</td>
                </tr>

                <tr>
                    <td class="font-bold">PHONE #: </td>
                    <td>{{ $rf->phone_number }}</td>
                    <td class="font-bold">FAX #: </td>
                    <td>{{ $rf->fax }}</td>
                </tr>

                <tr>
                    <td class="font-bold">EMAIL ADDRESS: </td>
                    <td>{{ strtoupper($rf->email) }}</td>
                    <td class="font-bold">OFFICE: </td>
                    <td>{{$rf->phone_number_two}}</td>
                </tr>

                <tr>
                    <td class="font-bold">RES. </td>
                    <td> {{$rf->phone_number_three}}</td>
                    <td class="font-bold">&nbsp; </td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td class="font-bold">NATIONAL IDENTITY CARD # </td>
                    <td> {{ $rf->national_id }}</td>
                    <td class="font-bold">NATIONAL TAX #</td>
                    <td>{{ $rf->ntn }}</td>
                </tr>

                <tr>
                    <td class="font-bold">FATHER’S NAME</td>
                    <td> {{ $rf->father_husband }}</td>
                    <td class="font-bold">FATHER’S NATIONAL IDENTITY CARD #</td>
                    <td>{{ $rf->national_id }}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @endif
@endif



@if(!empty($borrower->borrower_fact_sheet_consumer))

    <table>
        <thead>
        <tr>
            <th colspan="5" class="text-left">3. NATURE OF BUSINESS / PROFESSION:</th>
        </tr>

        <tr>
            <th class="w-20 text-center">Industrial</th>
            <th class="w-20 text-center">Commercial</th>
            <th class="w-20 text-center">Agricultural</th>
            <th class="w-20 text-center">Services</th>
            <th class="w-20 text-center">Any Other</th>
        </tr>
        </thead>
        <tbody>
        <tr style="font-family: DejaVu Sans;">
            <td class="font-bold text-center">
                @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Industrial")
                    ✓
                @endif
            </td>
            <td class="font-bold text-center">
                  @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Commercial")
                    ✓
                @endif
            </td>
            <td class="font-bold text-center">
                 @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Agricultural")
                    ✓
                @endif
            </td>
            <td class="font-bold text-center">
                @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Services")
                    ✓
                @endif
            </td>
            <td class="font-bold text-center">
                @if($borrower->borrower_fact_sheet_consumer->nature_of_business == "Any Other")
                    {{ $borrower->borrower_fact_sheet_consumer->nature_of_business }}
                @endif
            </td>
        </tr>
        </tbody>
    </table>



    <table>
        <thead>
        <tr>
            <th colspan="6" class="text-left">4. EXISTING LIMITS AND STATUS:</th>
        </tr>
        <tr>
            <th class="text-center">&nbsp;</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Expiry Date</th>
            <th class="text-center" colspan="3">Status</th>
        </tr>
        <tr>
            <th class="text-center w-16">&nbsp;</th>
            <th class="text-center w-16">(Rs.)</th>
            <th class="text-center w-16">&nbsp;</th>
            <th class="text-center w-16">Regular</th>
            <th class="text-center w-16">Amount Overdue (If any)</th>
            <th class="text-center w-16">Amount Rescheduled / Restructured (if Any)</th>
        </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="text-center">Fund Based</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->fund_based_amount }}</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->fund_based_expiry_date }}</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_regular }}</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_amount_overdue_if_any }}</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->fund_based_status_amount_rescheduled_or_restructured_if_any }}</td>
                </tr>
                <tr>
                    <td class="text-center">Non Fund Based</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_amount }}</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_expiry_date }}</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_regular }}</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_amount_overdue_if_any }}</td>
                    <td class="text-center">{{ $borrower->borrower_fact_sheet_consumer->non_fund_based_status_amount_rescheduled_or_restructured_if_any }}</td>
                </tr>


                <tr>
                    <td class="text-left" colspan="6">
                        5. Details of Payment schedule if term loan sought:  {{ $borrower->borrower_fact_sheet_consumer->detail_of_term_loan_sougnt }}
                        <br>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>

                <tr>
                    <td class="text-left" colspan="6">6. Details of Payment schedule if term loan sought:

                        <br>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
        </tbody>
    </table>


    <h3>I CERTIFY AND UNDERTAKE THAT THE INFORMATION FURNISHED ABOVE IS TRUE TO THE BEST OF MY KNOWLEDGE</h3>


@endif
<div class="page-break"></div>

@if(!$borrower->documents_uploaded->isEmpty())

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
                        <td class="text-center" >{{ $item->score_gained }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td class="text-right" colspan="3">
                        Total
                    </td>
                    <td class="text-center" >
                        {{ number_format($borrower->obligor_score_cards->sum('score_gained'),2) }}
                    </td>
                </tr>
        </tbody>
    </table>
@endif


</body>
</html>