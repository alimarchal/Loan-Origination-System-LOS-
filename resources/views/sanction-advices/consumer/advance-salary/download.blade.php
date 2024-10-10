<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanction Advice</title>


    <style>
        body {
            /*font-family: "Roboto", sans-serif;*/
            /*font-family: "Calibri" !important;*/
            font-size: 14px;
            line-height: 1.3;
            margin-bottom: 15px;
            /*padding: 0;*/
            padding: 20px;
        }

        /*body {*/
        /*    font-family: calibri, sans-serif;*/
        /*}*/

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
</head>
<body>

<div class="text-center mb-4">

   @if($base64Image)
       <img src="{{ $base64Image }}" alt="Logo" style="width: 200px">
 @else
        <p>Logo could not be loaded</p>
  @endif

</div>


<div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

        <h4 class="text-xl font-bold text-center mt-4 uppercase">THE BANK OF AZAD JAMMU & KASHMIR</h4>
        <h4 class="text-lg font-bold text-center uppercase">REGIONAL OFFICE {{ $borrower->region->name }}</h4>

        <div class="mb-4">
         <p class="font-bold">No: BAJK/HO/CMD/2024/228</p>
         <p class="font-bold">Dated: {{ $sanctionAdvice->created_at }}</p>



        </div>

        <h4 class="text-xl font-bold text-center"><u>OFFICE NOTE</u></h4>
        <h4 class="text-lg font-bold text-center">
            <u>APPROVAL CUM SANCTION ADVICE - {{ $borrower->loan_sub_category->name }} ({{ $borrower->applicant_requested_loan_information->status }})</u>
        </h4>

        <h4 class="text-base font-bold text-center underline uppercase">
          <u>  {{ $borrower->branch->name }}</u>
        </h4>

        <p class="mb-4 mt-2">
            As recommended by CRBD, vide letter No. BAJK/BR/001/2024/SALARY dated 12-07-2024, following Credit limit of {{ $borrower->loan_sub_category->name }} finance favoring
         <strong>   {{ $borrower->gender == 'Male' ? 'Mr.' : ($borrower->gender == 'Female' ? 'Ms.' : 'M/s.') }}{{ $borrower->name }}
            {{ $borrower->relationship_status }} {{ $borrower->parent_spouse_name }}</strong>
            is submitted for sanction on terms and conditions mentioned below:
        </p>
    </div>
</div>



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
        <td class="font-bold">Type Of Finance:</td>
        <td>
            {!! $sanctionAdvice->type_of_finance !!}
        </td>
        <td class="font-bold">SGL Code:</td>
        <td>
           {!! $sanctionAdvice->sgl_code !!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Nature Of Finance:</td>
        <td>
            {!! $sanctionAdvice->nature_of_finance !!}
        </td>
        <td class="font-bold">Purpose Of Finance:</td>
        <td>
            {!! $sanctionAdvice->purpose_of_finance !!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Tenure:</td>
        <td>
            {!! $sanctionAdvice->tenure !!}
        </td>
        <td class="font-bold">Take Home Salary:</td>
        <td>
            {!! $sanctionAdvice->take_home_salary !!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">DSR (Required):</td>
        <td>
            {!! $sanctionAdvice->dsr_required!!}
        </td>
        <td class="font-bold">DSR (Actual):</td>
        <td>
            {!! $sanctionAdvice->dsr_actual !!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Status:</td>
        <td>
            {!! $sanctionAdvice->requested_amount_status!!}
        </td>
        <td class="font-bold">Amount of Finance / Limit:</td>
        <td>
            {!! $sanctionAdvice->amount_of_finance_limit!!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Previous Outstanding:</td>
        <td>
            {!! $sanctionAdvice->previous_outstanding!!}
        </td>
        <td class="font-bold">Enhancement Amount:</td>
        <td>
            {!! $sanctionAdvice->enhancement_amount!!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Total Enhancement:</td>
        <td>
            {!! $sanctionAdvice->total_amount !!}
        </td>
        <td class="font-bold">Repayment History:</td>
        <td>
            {!! $sanctionAdvice->repayment_history!!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Rate of Markup:</td>
        <td colspan="3">
            {!! $sanctionAdvice->rate_of_markup!!}
        </td>
    </tr>d
    <tr>
        <td class="font-bold">Repayment Schedule (Monthly Installment):</td>
        <td colspan="3">

            {!! $sanctionAdvice->repayment_schedule_monthly_installment!!}
        </td>


    </tr>
    <tr>
        <td class="font-bold">Insurance Treatment:</td>
        <td colspan="3">

            {!! $sanctionAdvice->insurance_treatment!!}

        </td>
    </tr>
    <tr>
        <td class="font-bold">Life Insurance-SGL:</td>
        <td colspan="3">
            {!! $sanctionAdvice->life_insurance_sgl!!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Recovery Mode of Installment:</td>
        <td colspan="3">
            {!! $sanctionAdvice->recovery_mode_of_installment!!}

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
            {!! $sanctionAdvice->security_primary!!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Secondary:</td>
        <td colspan="3">

            {!! $sanctionAdvice->security_secondary !!}
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
            {!! $sanctionAdvice->borrower_pgs_no_issued!!}
        </td>
        <td class="font-bold">Repayment Status</td>
        <td>
            {!! $sanctionAdvice->borrower_rp_status!!}
        </td>
    </tr>
    <tr>
        <td class="font-bold">Guarantor</td>
        <td>
            {!! $sanctionAdvice->guarantor_pgs_no_issued!!}
        </td>
        <td class="font-bold">Repayment Status</td>
        <td>
            {{ $sanctionAdvice->guarantor_rp_status }}
        </td>
    </tr>
    </tbody>
</table>

     <div>
       {!! $sanctionAdvice->documents_required_before_disbursement !!}

<div>

        {!! $sanctionAdvice->general_terms_of_service !!}
    </div>
            <div class="flex justify-between mt-8">
    <div style="text-align: left;">
        <br><br>  __________________<br>
        <strong>Credit Officer</strong>
    </div>

    <div style="text-align: right;">
        __________________<br>
        <strong>Credit Manager</strong>
    </div>
</div>

<p class="font-bold text-center mt-10">APPROVED</p>

<div style="text-align: center;">
    <br>  __________________
    <p class="font-bold text-center mt-10">Regional Head</p>
</div>


<div class="page-break"></div>

<div class="text-center mb-4">

    @if($base64Image)
        <img src="{{ $base64Image }}" alt="Logo" style="width: 200px">
  @else
         <p>Logo could not be loaded</p>
   @endif

 </div>


 <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
     <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

         <h4 class="text-xl font-bold text-center mt-4 uppercase">THE BANK OF AZAD JAMMU & KASHMIR</h4>
         <h5 class="text-lg font-bold text-center uppercase">REGIONAL OFFICE {{ $borrower->region->name }}</h5>

         <div class="container">

            <p style="text-align: right; font-weight: bold;">No: BAJK/HO/CMD/2024/228</p>
            <p style="text-align: right; font-weight: bold;">Dated:  {!! $sanctionAdvice->created_at!!}</p>

            <h4 style="text-align: left; font-weight: bold;">The Manager,</h4>
            <h4 style="text-align: left; font-weight: bold;">Bank of Azad Jammu & Kashmir</h4>
            <h4 style="text-align: left; font-weight: bold;">Main Branch Muzaffarabad</h4>


         <h3 class="text-xl font-bold text-left underline">

           <u>  APPROVAL CUM SANCTION ADVICE - {{ $borrower->loan_sub_category->name }} ({{ $borrower->applicant_requested_loan_information->status }})
           </u> </h3>

         <p class="mb-4 mt-2">Dear Sir,<br>
            with reference to your letter,  BAJK/BR/001/2024/SALARY dated 12-07-2024, wherein you recommended sanctioning of  {{ $borrower->loan_sub_category->name }} favoring
           <strong>  {{ $borrower->gender == 'Male' ? 'Mr.' : ($borrower->gender == 'Female' ? 'Ms.' : 'M/s.') }}{{ $borrower->name }}
             {{ $borrower->relationship_status }} {{ $borrower->parent_spouse_name }} </strong>. We are pleased to inform that the Competent Authority has approved the limit vide
             sanction advice <strong>No: BAJK/HO/CMD/2024/228</strong> dated
             is submitted for sanction on terms and conditions mentioned below:
         </p>
     </div>
 </div>



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
         <td class="font-bold">Type Of Finance:</td>
         <td>
             {!! $sanctionAdvice->type_of_finance !!}
         </td>
         <td class="font-bold">SGL Code:</td>
         <td>
            {!! $sanctionAdvice->sgl_code !!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Nature Of Finance:</td>
         <td>
             {!! $sanctionAdvice->nature_of_finance !!}
         </td>
         <td class="font-bold">Purpose Of Finance:</td>
         <td>
             {!! $sanctionAdvice->purpose_of_finance !!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Tenure:</td>
         <td>
             {!! $sanctionAdvice->tenure !!}
         </td>
         <td class="font-bold">Take Home Salary:</td>
         <td>
             {!! $sanctionAdvice->take_home_salary !!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">DSR (Required):</td>
         <td>
             {!! $sanctionAdvice->dsr_required!!}
         </td>
         <td class="font-bold">DSR (Actual):</td>
         <td>
             {!! $sanctionAdvice->dsr_actual !!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Status:</td>
         <td>
             {!! $sanctionAdvice->requested_amount_status!!}
         </td>
         <td class="font-bold">Amount of Finance / Limit:</td>
         <td>
             {!! $sanctionAdvice->amount_of_finance_limit!!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Previous Outstanding:</td>
         <td>
             {!! $sanctionAdvice->previous_outstanding!!}
         </td>
         <td class="font-bold">Enhancement Amount:</td>
         <td>
             {!! $sanctionAdvice->enhancement_amount!!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Total Enhancement:</td>
         <td>
             {!! $sanctionAdvice->total_amount !!}
         </td>
         <td class="font-bold">Repayment History:</td>
         <td>
             {!! $sanctionAdvice->repayment_history!!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Rate of Markup:</td>
         <td colspan="3">
             {!! $sanctionAdvice->rate_of_markup!!}
         </td>
     </tr>d
     <tr>
         <td class="font-bold">Repayment Schedule (Monthly Installment):</td>
         <td colspan="3">

             {!! $sanctionAdvice->repayment_schedule_monthly_installment!!}
         </td>


     </tr>
     <tr>
         <td class="font-bold">Insurance Treatment:</td>
         <td colspan="3">

             {!! $sanctionAdvice->insurance_treatment!!}

         </td>
     </tr>
     <tr>
         <td class="font-bold">Life Insurance-SGL:</td>
         <td colspan="3">
             {!! $sanctionAdvice->life_insurance_sgl!!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Recovery Mode of Installment:</td>
         <td colspan="3">
             {!! $sanctionAdvice->recovery_mode_of_installment!!}

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
             {!! $sanctionAdvice->security_primary!!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Secondary:</td>
         <td colspan="3">
             {!! $sanctionAdvice->security_secondary !!}
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
             {!! $sanctionAdvice->borrower_pgs_no_issued!!}
         </td>
         <td class="font-bold">Repayment Status</td>
         <td>
             {!! $sanctionAdvice->borrower_rp_status!!}
         </td>
     </tr>
     <tr>
         <td class="font-bold">Guarantor</td>
         <td>
             {!! $sanctionAdvice->guarantor_pgs_no_issued!!}
         </td>
         <td class="font-bold">Repayment Status</td>
         <td>
             {{ $sanctionAdvice->guarantor_rp_status }}
         </td>
     </tr>
     </tbody>
 </table>

      <div>
        {!! $sanctionAdvice->documents_required_before_disbursement !!}

 <div>

         {!! $sanctionAdvice->general_terms_of_service !!}
     </div>
     <div class="flex justify-between mt-8">
        <br> <div style="text-align: left;">
          <br><br>     __________________<br>
                <strong>Manager credit</strong>
         </div>

         <div style="text-align: right;">
             __________________<br>
             <strong>Senior Credit Manager</strong>
         </div>



</body>
</html>
