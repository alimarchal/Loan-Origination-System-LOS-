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


            .w-5 {
                width: 10%;
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



        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-8">

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
                              <td class="font-bold">Home Ownership Status:</td>
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
                          <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
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
                          <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
                              Requested Loan Information Is Missing
                          </h1>
                      @endif



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
                          <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
                              Guarantor Missing
                          </h1>

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
                          <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
                              Finance Facility Missing
                          </h1>
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

                          <table style="width: 100%; font-size: 12px;">
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
                                          <td  colspan="5" style="color: red; text-align: center;">Missing</td>

                                      </tr>
                                  @endif
                              @endforeach
                              </tbody>
                          </table>

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
                          <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">

                              Reference Missing
                          </h1>
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
                          <table style="width: 100%; font-size: 12px;">
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
                          <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
                              Household Items Missing
                          </h1>
                      @endif

                      @if(!empty($borrower->obligor_score_card))
                          <table>
                              <thead>
                              <tr>
                                  <th colspan="4" class="text-center">Obligor Score Card </th>

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
                      @else
                          <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
                              Obligor Score Card Missing
                          </h1>
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
                                      @else
                                          <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">

                                              Reference Missing
                                          </h1>

                                      @endif

                                  @else
                                      <h1 class="text-2xl text-red-500">You must add at least two reference not more then two</h1>
                                  @endif
                              @else
                                  <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
                                      Please add at least two reference</h1>
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
                              @else
                                  <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">

                                      Requested Loan Data Missing
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
                                  <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
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
                                  <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
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
                                  <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
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
                                          <th colspan="4" class="text-left">D.</th>
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
                                  <h1 style="color: red; text-align: center; font-size: 20px; font-weight: bold;">
                                      Form D is missing
                                  </h1>
                              @endif

                          </div>


                      </div>
                  </div>

                    <div class="p-4">
                        @if($borrower->is_lock == "Yes" && $borrower->status == "Submitted")
                            <hr style=" border:2px solid black;" class="mb-4">
                            <h1 class="text-center mb-4 text-2xl font-bold">Official Use Only</h1>

                            <table id="loanApplicationTable" class="min-w-full bg-white border border-gray-300">
                                <thead>
                                <tr>
                                    <th colspan="7" class="py-2 px-4 bg-gray-100 text-center font-bold">Loan Application Tracking Status</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 text-center border-b">ID</th>
                                    <th class="py-2 px-4 text-center border-b">From</th>
                                    <th class="py-2 px-4 text-center border-b">To</th>
{{--                                    <th class="py-2 px-4 text-center border-b">Name</th>--}}
                                    <th class="py-2 px-4 text-center border-b">Remarks</th>
                                    <th class="py-2 px-4 text-center border-b">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                        </svg>
                                    </th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($borrower->statusHistories as $index => $item)
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center font-bold w-5">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-4 border-b text-center w-16">{{ $item->from->name ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b text-center w-16">{{ $item->to->name ?? 'N/A' }}</td>
{{--                                        <td class="py-2 px-4 border-b text-center w-16">{{ $item->name ?? 'N/A' }}</td>--}}
                                        <td class="py-2 px-4 border-b w-50">
                                            <div class="remarks-container">
                                                <span class="remarks-text" data-full-text="{{ $item->description }}">
                                                    {{ \Illuminate\Support\Str::limit($item->description, 100, '...') }}
                                                </span>
                                                @if(strlen($item->description) > 100)
                                                    <button class="text-blue-500 hover:text-blue-700 read-more-btn ml-2" data-action="expand">Read more</button>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="py-2 px-4 border-b text-center w-5">
                                            @if(!empty($item->attachment))
                                                <a href="{{ \Illuminate\Support\Facades\Storage::url($item->attachment) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                                    </svg>
                                                </a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b text-center w-5">{{ $item->loan_status->name ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    @push('modals')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const table = document.getElementById('loanApplicationTable');

                    table.addEventListener('click', function(e) {
                        if (e.target.classList.contains('read-more-btn')) {
                            const btn = e.target;
                            const container = btn.closest('.remarks-container');
                            const textSpan = container.querySelector('.remarks-text');
                            const fullText = textSpan.dataset.fullText;

                            if (btn.dataset.action === 'expand') {
                                textSpan.textContent = fullText;
                                btn.textContent = 'Show less';
                                btn.dataset.action = 'collapse';
                            } else {
                                textSpan.textContent = fullText.substr(0, 100) + '...';
                                btn.textContent = 'Read more';
                                btn.dataset.action = 'expand';
                            }
                        }
                    });

                    // Initialize tooltips
                    const remarks = table.querySelectorAll('.remarks-text');
                    remarks.forEach(remark => {
                        const tooltip = document.createElement('div');
                        tooltip.className = 'tooltip hidden absolute bg-gray-800 text-white p-2 rounded';
                        tooltip.textContent = remark.dataset.fullText;
                        remark.parentNode.appendChild(tooltip);

                        remark.addEventListener('mouseenter', function() {
                            tooltip.classList.remove('hidden');
                        });

                        remark.addEventListener('mouseleave', function() {
                            tooltip.classList.add('hidden');
                        });
                    });
                });
            </script>

            <style>
                .tooltip {
                    max-width: 300px;
                    word-wrap: break-word;
                    z-index: 1000;
                }
            </style>
    @endpush
</x-app-layout>
