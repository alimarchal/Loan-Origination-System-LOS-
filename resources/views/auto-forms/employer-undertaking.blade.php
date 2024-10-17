<x-app-layout>
    @push('header')
        <style>
            body {
                font-size: 12px;
                /*padding: 20px;*/
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 5px;
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
                margin-bottom: 5px;
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
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block print:hidden"></h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg print:shadow-none print:px-none px-2">
                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent">
                    @include('tabs')
                    <div class="mb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700 p-4">
                        <h1 class="text-xl font-bold text-center mb-8 uppercase print:hidden">
                            Department Letter Head (Where available)
                        </h1>

                        <div class="flex justify-between mb-8">
                            <div>
                                <span class="font-semibold">No. ______________________</span>
                            </div>
                            <div>
                                <span class="font-semibold">Date:______________________ </span>
                            </div>
                        </div>

                        <div class="mb-8">
                            <p>Manager,</p>
                            <p>Bank of Azad Jammu & Kashmir,</p>
                            <p>{{ $borrower->branch?->name }} - {{ $borrower->branch?->code }} ,  {{ $borrower->branch?->address}}</p>
                        </div>

                        <h2 class="text-lg font-bold text-center mb-6 underline uppercase">EMPLOYER UNDERTAKING</h2>

                        <div class="text-sm">
                            <span class="font-semibold">{{ $borrower->gender == "Male" ? "Mr." : "Ms." }}</span>
                            <span class="font-semibold">{{ $borrower->name }}</span>
                            <span>{{ $borrower->relationship_status }}</span>
                            <span class="font-semibold">{{ $borrower->parent_spouse_name }}</span>,
                            <span class="font-semibold">BPS: {{ $borrower->employment_information?->grade }}</span>
                            <span>is a permanent employee of</span>
                            <span class="font-semibold">{{ $borrower->employment_information?->department }}</span>
                            <span>Department,</span>
                            <span>drawing Take Home Salary of</span>
                            <span class="font-semibold">Rs. {{ $borrower->employment_information?->monthly_net_salary }}</span>
                            <span>{{ $borrower->gender == "Male" ? "His" : "Her" }} date of appointment is</span>
                            <span class="inline-block w-32 border-b border-black mx-1"></span>
                            <span>and date of retirement is</span>
                            <span class="inline-block w-32 border-b border-black mx-1"></span>
                            <span>and remaining period for</span>
                            <span class="inline-block w-32 border-b border-black mx-1"></span>
                            <span>retirement from service is</span>
                            <span class="inline-block w-32 border-b border-black mx-1"></span>
                        </div>
                        <p class="mb-4 text-justify">
                            The Department hereby irrevocably undertake that <strong> {{ $borrower->gender == "Male"? "his ": "her" }} salary will be routed through account #</strong>
                            <span class="inline-block w-32 border-b border-black"></span>
                            <strong>maintained at your</strong>
                            <span class="inline-block w-32 border-b border-black"></span>
                            <strong>branch</strong> and no direct payment of salary will be made to him/her or through any other Bank till the loan facility sanctioned by you to him along with markup thereon is fully adjusted/ repaid to you and <strong>lien is marked on {{ $borrower->gender == "Male"? "his ": "her" }}  terminal benefits (exiting & future)</strong> till full adjustment of the Bank's entire dues.
                        </p>

                        <p class="mb-4 text-justify">
                            We also undertake that {{ $borrower->gender == "Male"? "his ": "her" }}  salary will not be transferred to any other Banks / Branch and these will only be paid through above-mentioned salary account and no other mode of payment/method will be allowed by us unless prior N.O.C is obtained from BAJK branch manager/authorized signatory.
                        </p>

                        <p class="mb-4 text-justify">
                            In case of termination/resignation from service/death/transfer, the Department shall intimate to the BAJK which will advise {{ $borrower->gender == "Male"? "his ": "her" }}  outstanding dues (principal + mark-up +other charges) relating to the subject loan facility and the Department shall adjust the amount fully from {{ $borrower->gender == "Male"? "his ": "her" }}  GP Fund/CP Fund/Group Insurance/Pension/Gratuity etc and remit the amount to the Bank for adjustment of the loan and relating dues.
                        </p>

                        <p class="mb-8">Thanking you,</p>

                        <p class="mb-16">Yours truly,</p>



                        <div class="mb-4">
                            <p>DDO Signature/Stamp: </p>
                            <br>
                            <br>
                            <div class="w-64 border-b border-black"></div>


                            <br>
                        </div>

                        <div class="mb-4 flex items-baseline">

                            <span>Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________________</span>
                            <br><br>
                            <span class="inline-block flex-grow border-b border-black ml-2"></span>
                        </div>

                        <div class="flex items-baseline">
                            <span>Designation: ____________________________________________</span>
                            <span class="inline-block flex-grow border-b border-black ml-2"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
