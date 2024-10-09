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
            font-size: 12px;
            line-height: 1.3;
            /*margin: 0;*/
            /*padding: 0;*/
            /*padding: 20px;*/
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
{{--<div class="text-center mb-4">--}}

{{--    @if($base64Image)--}}
{{--        <img src="{{ $base64Image }}" alt="Logo" style="width: 200px">--}}
{{--    @else--}}
{{--        <p>Logo could not be loaded</p>--}}
{{--    @endif--}}

{{--</div>--}}



<h1 style="text-align: center; margin-bottom: 0px; padding-bottom: 0px;">THE BANK OF AZAD JAMMU & KASHMIR</h1>
<h1 style="text-align: center; margin-top: 0px; padding-top: 0px;">
    REGIONAL OFFICE Muzaffarabad
</h1>



<div class="mb-4">
    <p class="font-semibold">No: BAJK/HO/CMD/2024/228</p>
    <p class="font-semibold">Dated: Month Date, 2024</p>
</div>

<h3 class="text-xl font-bold text-center underline">OFFICE NOTE</h3>
<h4 class="text-lg font-bold text-center underline uppercase">
    APPROVAL CUM SANCTION ADVICE - {{ $borrower->loan_sub_category->name }} ({{ $borrower->applicant_requested_loan_information->status }})
</h4>


<div>
    {!! $sanctionAdvice->recovery_mode_of_installment !!}
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
<div class="page-break"></div>

</body>
</html>