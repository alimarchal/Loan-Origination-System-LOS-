<x-app-layout>
    @push('header')
        <style>

            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                line-height: 1.5;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            th, td {
                border: 1px solid black;
                padding: 5px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
                font-weight: bold;
            }

            .text-center {
                text-align: center;
            }

            .font-bold {
                font-weight: bold;
            }

            .uppercase {
                text-transform: uppercase;
            }

            .mb-4 {
                margin-bottom: 16px;
            }
        </style>

        <style>
            /*table, td, th {*/
            /*    !*border: 1px solid;*!*/
            /*    !*padding-left: 5px;*!*/
            /*}*/

            /*table {*/
            /*    width: 100%;*/
            /*    border-collapse: collapse;*/
            /*}*/

            @media print {
                @page {
                    size: portrait;
                    /*margin: 0.5in; !* Default margin *!*/
                    margin-left: 0.2in;
                    margin-right: 0.2in;
                    margin-top: 0.5in;
                    margin-bottom: 0.2in;
                }
                body {
                    zoom: 70%;
                    background-color: white !important;
                }
                .no-print {
                    display: none !important;
                }
                /* Preserve table styles */
                table, th, td {
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                /* Override any unwanted background colors */
                .bg-white, .dark\:bg-gray-800 {
                    background-color: transparent !important;
                }
                /* Ensure text is visible */
                .text-gray-800, .dark\:text-gray-200 {
                    color: black !important;
                }
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
                    <div class=" mb-4  bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent ">

                        <p class="text-center my-2 uppercase  font-bold text-black">
                            Branch & Code: {{ $borrower->branch?->name }} - {{ $borrower->branch?->code }},
                            <br>Region: {{ $borrower->branch?->region?->name }}
                            <br> Date: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-M-Y') }}
                        </p>
                        <h2 class="text-center uppercase underline font-bold text-black">Application Form For {{ $borrower->loan_sub_category?->name }}</h2>

                        <div class="relative overflow-x-auto">
                            <table class="table-auto w-full border-collapse border border-black">
                                <thead class="border-black uppercase">
                                <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                    <th class="border-black border py-1 px-2 text-center" colspan="4">Personal Information</th>
                                </tr>
                                </thead>
                                <tbody class="text-black">
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">NAME:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->name ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">RELATIONSHIP STATUS:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->relationship_status ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">PARENT/SPOUSE NAME:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->parent_spouse_name ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">GENDER:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->gender ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">NATIONAL ID (CNIC):</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->national_id_cnic ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">NTN:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->ntn ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">PARENT/SPOUSE NATIONAL ID (CNIC):</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->parent_spouse_national_id_cnic ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">NUMBER OF DEPENDENTS:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->number_of_dependents ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">EDUCATIONAL QUALIFICATION:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->education_qualification ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">EMAIL:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">FAX:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->fax ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">RESIDENCE PHONE NUMBER:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->residence_phone_number ?? 'N/A' }}</td>
                                    </tr>

                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">MOBILE NUMBER:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->mobile_number ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">PRESENT ADDRESS:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->present_address ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">PERMANENT ADDRESS:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->permanent_address ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">OCCUPATION TITLE:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->occupation_title ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">JOB TITLE:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->job_title ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">DATE OF BIRTH:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->date_of_birth ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">AGE:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->age ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">MARITAL STATUS:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->marital_status ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">HOME OWNERSHIP STATUS:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->home_ownership_status ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">NATIONALITY:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->nationality ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                        <td class="border-black border py-1 px-2 font-bold text-left">NEXT OF KIN NAME:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->next_of_kin_name ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">NEXT OF KIN MOBILE NUMBER:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->next_of_kin_mobile_number ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>


                            <br>

                            <table class="table-auto w-full border-collapse border border-black">
                                <thead class="border-black uppercase">
                                <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                    <th class="border-black border py-1 px-2 text-center" colspan="4">Employment Information</th>
                                </tr>
                                </thead>
                                <tbody class="text-black">
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Job Title / Designation</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->job_title_designation ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Employment Status</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->employment_status ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Employer Name</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->employer_name ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Monthly Gross Salary</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->monthly_gross_salary ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Monthly Net Salary</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->monthly_net_salary ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Service Length (Years)</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->service_length_in_years ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Service Length (Months)</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->service_length_in_months ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Remaining Service Years</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->remaining_service_years ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Remaining Service Months</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->remaining_service_months ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Department</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->department ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Official Address</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->official_address ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Legal Status</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->legal_status ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Office Mobile Number</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->office_mobile_number ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Office Phone Number</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->office_phone_number ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Personal Number</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->personal_number ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Grade</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->grade ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Service Status</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->service_status ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Mode of Salary Receipt</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->mode_of_salary_receipt ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Salary Disbursement Office Name</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->salary_disbursement_office_name ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Contact Person for Disbursement</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->contact_person_for_disbursement ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Terminal Benefits</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->terminal_benefits ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left">Other Benefits</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->other_benefits ?? 'N/A' }}</td>
                                </tr>
                                <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">
                                    <td class="border-black border py-1 px-2 font-bold text-left">Other Sources of Income</td>
                                    <td class="border-black border py-1 px-2 text-left">{{ $borrower->employment_information->other_sources_of_income ?? 'N/A' }}</td>
                                    <td class="border-black border py-1 px-2 font-bold text-left"></td>
                                    <td class="border-black border py-1 px-2 font-bold text-left"></td>
                                </tr>
                                </tbody>
                            </table>

                            <br>

                            <table class="table-auto w-full border-collapse border border-black">

                                @if($borrower->applicant_business_many->isEmpty())
                                    <p>No references available.</p>
                                @else
                                    @foreach($borrower->applicant_business_many as $reference)
                                        <thead class="border-black uppercase">
                                        <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                            <th class="border-black border py-1 px-2 text-center" colspan="4">Business Information # {{ $loop->iteration }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-black" style="font-size: 12px!important;">
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Business Name</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->name }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Type</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Address</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->address }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Landline</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->landline }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Mobile</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->mobile }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Designation</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->designation }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Monthly Revenue</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->monthly_revenue }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Experience (Years)</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->experience_years }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Monthly Expenses</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->monthly_expenses }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Net Monthly Income</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->net_monthly_income }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Start Date</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->start_date }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Acquisition Date</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->acquisition_date }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Number of Employees</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->number_of_employees }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Tax Number</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->tax_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Initial Investment</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->initial_investment }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Investment Source</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->investment_source }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Premises Status</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->premises_status }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Monthly Rent</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->monthly_rent }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Average Monthly Balance</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->average_monthly_balance }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Account Opening Date</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->account_opening_date }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Average Balance (Six Months)</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->average_balance_six_months }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Account Number</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->account_no }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Bank Name</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->bank_name }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Net Worth</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_business->net_worth }}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif

                            </table>


                            <br>

                            <table class="table-auto w-full border-collapse border border-black">
                                <thead class="border-black uppercase">
                                <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                    <th class="border-black border py-1 px-2 text-center" colspan="4">Requested Loan Information</th>
                                </tr>
                                </thead>
                                <tbody class="text-black" style="font-size: 12px!important;">
                                    <tr class="border-b border-black hover:bg-yellow-100">
                                        <td class="border-black border py-1 px-2 font-bold text-left">Request Date:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->request_date ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">Requested Amount:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->requested_amount ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100">
                                        <td class="border-black border py-1 px-2 font-bold text-left">Margin on Gold Limit:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->margin_on_gold_limit ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">Currency:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->currency ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100">
                                        <td class="border-black border py-1 px-2 font-bold text-left">Loan Purpose:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->loan_purpose ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">Status:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->status ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100">
                                        <td class="border-black border py-1 px-2 font-bold text-left">Tenure in Years:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->tenure_in_years ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">Tenure in Months:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->tenure_in_months ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100">
                                        <td class="border-black border py-1 px-2 font-bold text-left">Repayment Frequency:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->repayment_frequency ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">Salary Account No:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->salary_account_no ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100">
                                        <td class="border-black border py-1 px-2 font-bold text-left">Salary Account Branch Name:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->salary_account_branch_name ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">Salary Account Bank Name:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->salary_account_bank_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100">
                                        <td class="border-black border py-1 px-2 font-bold text-left">Account with BAJK:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->account_with_bajk ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">Account with Other Banks:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->account_with_other_banks ?? 'N/A' }}</td>
                                    </tr>
                                    <tr class="border-b border-black hover:bg-yellow-100">
                                        <td class="border-black border py-1 px-2 font-bold text-left">Markup Rate Type:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->markup_rate_type ?? 'N/A' }}</td>
                                        <td class="border-black border py-1 px-2 font-bold text-left">Is Insured:</td>
                                        <td class="border-black border py-1 px-2 text-left">{{ $borrower->applicant_requested_loan_information->is_insured ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <br>

                            <table class="table-auto w-full border-collapse border border-black">

                                @if($borrower->reference->isEmpty())
                                    <p>No references available.</p>
                                @else
                                    @foreach($borrower->reference as $reference)
                                        <thead class="border-black uppercase">
                                        <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                            <th class="border-black border py-1 px-2 text-center" colspan="4">References # {{ $loop->iteration }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-black" style="font-size: 12px!important;">
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Father/Husband:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->father_husband }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">National ID:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->national_id }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">NTN:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->ntn }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Date of Birth:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->date_of_birth }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Present Address:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->present_address }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Permanent Address:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->permanent_address }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Phone Number:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->phone_number }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Phone Number Two:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->phone_number_two }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Phone Number Three:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->phone_number_three }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Email:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->email }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Fax:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->fax }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Designation:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->designation }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Relationship to Borrower:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $reference->relationship_to_borrower }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left"></td>
                                            <td class="border-black border py-1 px-2 font-bold text-left"></td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif

                            </table>


                            <br>

                            <table class="table-auto w-full border-collapse border border-black">

                                @if($borrower->finance_facility_many->isEmpty())
                                    <p>No references available.</p>
                                @else
                                    @foreach($borrower->finance_facility_many as $facility)
                                        <thead class="border-black uppercase">
                                        <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                            <th class="border-black border py-1 px-2 text-center" colspan="4">Finance Facility Information # {{ $loop->iteration }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-black" style="font-size: 12px!important;">
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Institution Name:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->institution_name }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Repayment Status:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->repayment_status }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Facility Type:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->facility_type }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Amount:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->amount }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Loan Limit:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->loan_limit }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Outstanding Amount:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->outstanding_amount }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Monthly Installment:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->monthly_installment }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Interest Rate (%):</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->interest_rate }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Term (Months):</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->term_months }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Start Date:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->start_date }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">End Date:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->end_date }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Purpose of Loan:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->purpose_of_loan }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Status:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->status }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Remarks:</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $facility->remarks }}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif

                            </table>


                            <br>


                            <table class="table-auto w-full border-collapse border border-black">

                                @if($borrower->documents_uploaded->isEmpty())
                                    <p>No references available.</p>
                                @else
                                    <thead class="border-black uppercase">
                                    <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                        <th class="border-black border py-1 px-2 text-center" colspan="4">Documents</th>
                                    </tr>
                                    </thead>
                                    @foreach($borrower->documents_uploaded as $doc)

                                        <tbody class="text-black" style="font-size: 12px!important;">

                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Document Name</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $doc->document_type }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Uploaded</td>
                                            <td class="border-black border py-1 px-2 text-left">@if(!empty($doc->path_attachment)) Yes @else No @endif</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif

                            </table>



                            <br>

                            <table class="table-auto w-full border-collapse border border-black">

                                @if($borrower->listHouseHoldItems->isEmpty())
                                    <p>No references available.</p>
                                @else
                                    <thead class="border-black uppercase">
                                        <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                            <th class="border-black border py-1 px-2 text-center" colspan="4">Household Items</th>
                                        </tr>
                                        <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                            <th class="border-black border py-1 px-2 text-center" >Description of Items</th>
                                            <th class="border-black border py-1 px-2 text-center" >Quantity</th>
                                            <th class="border-black border py-1 px-2 text-center" >Market Value</th>
                                            <th class="border-black border py-1 px-2 text-center" >Amount</th>
                                        </tr>
                                        </thead>
                                    @foreach($borrower->listHouseHoldItems as $item)

                                        <tbody class="text-black" style="font-size: 12px!important;">
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-center">{{ $item->description_of_items }}</td>
                                                <td class="border-black border py-1 px-2 text-center">{{ $item->quantity }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-center">{{ $item->market_value }}</td>
                                                <td class="border-black border py-1 px-2 text-center">{{ $item->amount }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif

                            </table>



                            <br>

                            <table class="table-auto w-full border-collapse border border-black">

                                @if($borrower->guarantor->isEmpty())
                                    <p>No references available.</p>
                                @else
                                    @foreach($borrower->guarantor as $guarantor)
                                        <thead class="border-black uppercase">
                                        <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                            <th class="border-black border py-1 px-2 text-center" colspan="4">Guarantor Details # {{ $loop->iteration }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-black" style="font-size: 12px!important;">

                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Guarantor Type</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->guarantor_type }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Title</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->title }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Name</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->name }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Father/Husband</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->father_husband }}</td>
                                            </tr>

                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">National ID</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->national_id }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Phone Number</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->phone_number }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Phone Number Two</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->phone_number_two }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Email</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->email }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Present Address</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->present_address }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Permanent Address</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->permanent_address }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Department</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->department }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Designation</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->designation }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Employer Name</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->employer_name }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Employee Personal Number</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->employee_personal_number }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Employment Status</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->employment_status }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Monthly Gross Salary</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->monthly_gross_salary }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Date of Retirement</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->date_of_retirement }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Relationship to Borrower</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->relationship_to_borrower }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Date of Birth</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->dob }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">NTN</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->ntn }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Nature of Business</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->nature_of_business }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Title of Business</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->title_of_business }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Major Business Activities</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->major_business_activities }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Exact Location of Business Place</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->exact_location_of_business_place }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Business Bank Account Maintained</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->business_bank_account_maintained }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Statement of Account Attachment</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->statement_of_account_attachment }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Net Worth</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->net_worth }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Business Registration Number</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->business_registration_number }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Annual Revenue</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->annual_revenue }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Annual Expenses</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->annual_expenses }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Net Annual Income</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->net_annual_income }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">BPS/SPS No</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->bps_sps_no }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Date of Joining</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->date_of_joining }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Remaining Service (25 Years)</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->remaining_service_25_years }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Remaining Service (60 Years)</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->remaining_service_60_years }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">DDO Title</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->ddo_title }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Monthly Salary</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->monthly_salary }}</td>
                                                <td class="border-black border py-1 px-2 font-bold text-left">Other Monthly Income</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->other_monthly_income }}</td>
                                            </tr>
                                            <tr class="border-b border-black hover:bg-yellow-100">
                                                <td class="border-black border py-1 px-2 font-bold text-left">Number of Dependents</td>
                                                <td class="border-black border py-1 px-2 text-left">{{ $guarantor->no_of_dependents }}</td>
                                                <td class="border-black border py-1 px-2 text-left"></td>
                                                <td class="border-black border py-1 px-2 text-left"></td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif

                            </table>


                            <br>



                            <table class="table-auto w-full border-collapse border border-black">

                                @if($borrower->vehicles->isEmpty())
                                    <p>No references available.</p>
                                @else
                                    @foreach($borrower->vehicles as $vehicle)
                                        <thead class="border-black uppercase">
                                        <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                            <th class="border-black border py-1 px-2 text-center" colspan="4">Vehicle Details # {{ $loop->iteration }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-black" style="font-size: 12px!important;">

                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Vehicle Type</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->vehicle_type }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Price of Vehicle</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->price_of_vehicle }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Down Payment Percentage</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->down_payment_percentage }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Finance Amount</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->finance_amount }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Model Year</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->model_year }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Year of Manufacturing</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->year_of_manufacturing }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Make</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->make }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Model</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->model }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Cost of Vehicle</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->cost_of_vehicle }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Equity Down Payment</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->equity_dawn_payment }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Financial Institute Contribution</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->financial_institute_contribution }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Name of Authorized Dealer/Seller</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->name_authorized_dealer_seller }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Repayment Mode</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->repayment_mode }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Tenure in Years</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->tenure_in_years }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Tenure in Months</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->tenure_in_month }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Markup Rate Type</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $vehicle->markup_rate_type }}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif

                            </table>

                            <br>



                            <table class="table-auto w-full border-collapse border border-black">

                                @if($borrower->securities->isEmpty())
                                    <p>No references available.</p>
                                @else
                                    @foreach($borrower->securities as $vehicle)
                                        <thead class="border-black uppercase">
                                        <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                            <th class="border-black border py-1 px-2 text-center" colspan="4">Security Details # {{ $loop->iteration }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-black" style="font-size: 12px!important;">
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Security Type</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->security_type }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Value of Gold Ornaments</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->value_of_gold_ornaments_value }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Gross Weight of Gold</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->gross_weight_of_gold }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Gold Bag Seal No</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->gold_bag_seal_no }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Market Value</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->market_value }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Forced Sales Value (FSV)</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->forced_sales_value_fsv }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Ownership</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->ownership }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Lien Account No</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->lien_ac_no }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Lien Title</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->lien_title }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Lien Bank Branch</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->lien_bank_branch }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Lien Amount</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->lien_amount }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Pledge TDR/SSC/DSC Certificate No</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->pledge_tdr_ssc_dsc_cert_no }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Pledge Date of Issuance</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->pledge_date_of_issuance }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Pledge Issuing Office</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->pledge_issuing_office }}</td>
                                        </tr>
                                        <tr class="border-b border-black hover:bg-yellow-100">
                                            <td class="border-black border py-1 px-2 font-bold text-left">Pledge Amount</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->pledge_amount }}</td>
                                            <td class="border-black border py-1 px-2 font-bold text-left">Remarks</td>
                                            <td class="border-black border py-1 px-2 text-left">{{ $borrower->security?->remarks }}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>