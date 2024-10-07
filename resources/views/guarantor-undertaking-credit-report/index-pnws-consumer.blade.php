<x-app-layout>
    @push('header')
        <style>
            table, td, th {
                border: 1px solid;
                padding: 5px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            .personal-net-worth-calculator input {
                width: 100%;
                padding: 5px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                background-color: #f8f8f8;
            }

            .personal-net-worth-calculator button {
                margin: 5px;
            }

            .personal-net-worth-calculator th {
                background-color: #f0f0f0;
                font-weight: bold;
            }

            .personal-net-worth-calculator td {
                padding: 5px;
            }

            .personal-net-worth-calculator input[type="number"] {
                text-align: right;
            }

            .heading {
                font-size: 1.5em;
                font-weight: bold;
                margin: 10px 0;
            }

            .sub-heading {
                font-size: 1.2em;
                font-weight: bold;
                margin: 5px 0;
                background-color: #f0f0f0;
                padding: 5px;
            }

            .section-title {
                font-weight: bold;
                font-size: 18px;
                background-color: #d3d3d3;
                padding: 5px;
            }

            .field-label {
                width: 40%;
                font-weight: bold;
            }

            .field-value {
                width: 60%;
            }

        </style>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block print:hidden"></h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg print:shadow-none print:px-none px-2">
                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent">
                    @include('tabs')
                    <div class="mb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <h2 class="text-sm text-center my-2 uppercase underline font-bold text-black">Guarantor Undertaking Credit Report</h2>
                        <h2 class="text-sm text-center my-2 uppercase font-bold text-black"> THE BANK OF AZAD JAMMU & KASHMIR {{ $borrower->branch?->name }}</h2>
                        <h2 class="text-sm text-center my-2 font-bold text-black">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>
                        <div class="relative overflow-x-auto px-2">
                            <p style="font-size: 18px;">
                                I intend to stand Guarantor for
                                @if($borrower->gender === 'Male')
                                    <strong>Mr.</strong>
                                @elseif($borrower->gender === 'Female')
                                    <strong>Ms.</strong>
                                @else
                                    <strong>Mrs.</strong>
                                @endif
                                <strong><u>{{ strtoupper($borrower->name) }}</u></strong>
                               {{($borrower->relationship_status)}}


                                <strong><u>{{ strtoupper($borrower->parent_spouse_name) }}</u></strong>
                                R/O <strong><u>{{ strtoupper($borrower->permanent_address) }}</u></strong>

                            </p>

                            <p style="font-size: 18px;">
                                Who desires to obtain a loan of Rs. <strong>{{ strtoupper($borrower->applicant_requested_loan_information->requested_amount) }}</strong> from your branch.
                            </p>

                            <p style="font-size: 18px;">
                                <strong>My particulars are as follows:</strong>
                            </p>

                            @foreach($borrower?->guarantor as $gur)
                                @if($loop->iteration == 1)
                                    <table class="personal-net-worth-calculator">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="section-title">A: PERSONAL INFORMATION</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Guarantor Type:</td>
                                                <td class="field-value">{{ $gur->guarantor_type }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Name:</td>
                                                <td class="field-value">{{ $gur->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Father/Husband's Name:</td>
                                                <td class="field-value">{{ $gur->father_husband }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">National ID:</td>
                                                <td class="field-value">{{ $gur->national_id }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Phone Number:</td>
                                                <td class="field-value">{{ $gur->phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Date of Birth:</td>
                                                <td class="field-value">{{ $gur->dob }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">NTN:</td>
                                                <td class="field-value">{{ $gur->ntn }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Permanent Address:</td>
                                                <td class="field-value">{{ $gur->permanent_address }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Present Address:</td>
                                                <td class="field-value">{{ $gur->present_address}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="section-title">B:Business Information (if not a government servant)</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Nature of Business:</td>
                                                <td class="field-value">{{ $gur->nature_of_business }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Title of Business:</td>
                                                <td class="field-value">{{ $gur->title_of_business }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Major Business Activities:</td>
                                                <td class="field-value">{{ $gur->major_business_activities }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Exact Location of Business Place:</td>
                                                <td class="field-value">{{ $gur->exact_location_of_business_place }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Business Bank Account Maintained:</td>
                                                <td class="field-value">{{ $gur->business_bank_account_maintained }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Statement of Account Attachment:</td>
                                                <td class="field-value">{{ $gur->statement_of_account_attachment }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="section-title">C: Government/Semi-Government Officials</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Designation:</td>
                                                <td class="field-value">{{ $gur->designation }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Employer Name:</td>
                                                <td class="field-value">{{ $gur->employer_name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">BPS/SPS No:</td>
                                                <td class="field-value">{{ $gur->bps_sps_no }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Date of Joining:</td>
                                                <td class="field-value">{{ $gur->date_of_joining }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Remaining Service (25 years):</td>
                                                <td class="field-value">{{ $gur->remaining_service_25_years }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Remaining Service (60 years):</td>
                                                <td class="field-value">{{ $gur->remaining_service_60_years }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">DDO Title:</td>
                                                <td class="field-value">{{ $gur->ddo_title }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Monthly Salary:</td>
                                                <td class="field-value">{{ $gur->monthly_salary }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">Other Monthly Income:</td>
                                                <td class="field-value">{{ $gur->other_monthly_income }}</td>
                                            </tr>
                                            <tr>
                                                <td class="field-label">No of Dependents:</td>
                                                <td class="field-value">{{ $gur->no_of_dependents}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            @endforeach

                  <td colspan="2" class="section-title"><b>D: DETAILS OF LIABILITIES & ASSETS</b></td>

                            <div class="relative overflow-x-auto px-2 personal-net-worth-calculator">
                                <livewire:personal-net-worth-calculator :borrower-id="$borrower->id" />
                            </div>
                        </div>
                        <x-validation-errors class="mb-4 mt-4"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
