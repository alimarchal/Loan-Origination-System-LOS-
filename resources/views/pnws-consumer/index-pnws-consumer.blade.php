<x-app-layout>
    @push('header')
        <style>
            table, td, th {
                border: 1px solid;
                padding-left: 5px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
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
                            <h2 class="text-sm text-center my-2 uppercase underline font-bold text-black">Personal Net Worth Statement (PNWS)</h2>
                            <h2 class="text-sm text-center my-2 uppercase font-bold text-black">ACCOUNT AT THE BANK OF AZAD JAMMU & KASHMIR {{ $borrower->branch?->name }}</h2>
                            <h2 class="text-sm text-center my-2 font-bold text-black">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>
                            <div class="relative overflow-x-auto px-2">
                                @livewire('personal-net-worth-stat-form', ['borrower' => $borrower])
                            </div>
                            <x-validation-errors class="mb-4 mt-4"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--    <div class="py-6">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg print:shadow-none print:px-none px-2">--}}

{{--                <x-status-message class="mb-4"/>--}}
{{--                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent ">--}}
{{--                    @include('tabs')--}}
{{--                    <div class="mb-4  bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">--}}
{{--                        <h2 class="text-sm text-center my-2 uppercase underline font-bold text-black">Personal Net Worth Statement (PNWS)</h2>--}}
{{--                        <h2 class="text-sm text-center my-2 uppercase  font-bold text-black">ACCOUNT AT THE BANK OF AZAD JAMMU & KASHMIR {{ $borrower->branch?->name }}</h2>--}}
{{--                        <h2 class="text-sm text-center my-2 font-bold text-black">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>--}}
{{--                        <div class="relative overflow-x-auto px-2">--}}

{{--                            <table style="font-size: 12px!important;margin-bottom: 3px;">--}}
{{--                                <tr>--}}
{{--                                    <td>Name: {{ strtoupper($borrower->name) }} </td>--}}
{{--                                    <td>NIC No: {{ $borrower->national_id_cnic }}</td>--}}
{{--                                </tr>--}}

{{--                                <tr>--}}
{{--                                    <td>Father's Name: {{ $borrower->parent_spouse_name }} </td>--}}
{{--                                    <td>NTN No: {{ $borrower->ntn }}</td>--}}
{{--                                </tr>--}}

{{--                                <tr>--}}
{{--                                    <td>Business Address:--}}
{{--                                        @if(!empty($borrower->applicant_business))--}}
{{--                                            {{ $borrower->applicant_business?->address }}--}}
{{--                                        @elseif(!empty($borrower->employment_information))--}}
{{--                                            {{ $borrower->employment_information?->official_address }}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>Tele: (Office):--}}
{{--                                        @if(!empty($borrower->applicant_business))--}}
{{--                                            {{ $borrower->applicant_business?->landline }}--}}
{{--                                        @elseif(!empty($borrower->employment_information))--}}
{{--                                            {{ $borrower->employment_information?->office_phone_number }}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        Residential address:--}}
{{--                                        {{ $borrower->permanent_address }}--}}
{{--                                    </td>--}}
{{--                                    <td style="width: 50%">--}}
{{--                                        Tele: (Residence):--}}
{{--                                        {{ $borrower->residence_phone_number }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}

{{--                                <tr>--}}
{{--                                    <td>Qualification: Educational:</td>--}}
{{--                                    <td>Professional:</td>--}}
{{--                                </tr>--}}
{{--                            </table>--}}

{{--                            @livewire('personal-net-worth-forma-form', ['personalNetWorthStatId' => $borrower->personalNetWorthStat->id])--}}
{{--                            @livewire('personal-net-worth-formb-form', ['personalNetWorthStatId' => $borrower->personalNetWorthStat->id])--}}
{{--                            @livewire('personal-net-worth-formc-form', ['personalNetWorthStatId' => $borrower->personalNetWorthStat->id])--}}
{{--                            <table style="font-size: 12px!important;margin-top: 3px;">--}}
{{--                                <thead>--}}
{{--                                <th style="width: 35%">NET WORTH = (A+B+C)</th>--}}
{{--                                <th></th>--}}
{{--                                <th id="netWorthTotal"></th>--}}
{{--                                </thead>--}}
{{--                            </table>--}}

{{--                            @livewire('personal-net-worth-formd-form', ['personalNetWorthStatId' => $borrower->personalNetWorthStat->id])--}}

{{--                            <script>--}}
{{--                                let totalA = 0;--}}
{{--                                let totalB = 0;--}}
{{--                                let totalC = 0;--}}

{{--                                document.addEventListener('livewire:initialized', function () {--}}
{{--                                    Livewire.on('formaUpdated', function (total) {--}}
{{--                                        totalA = parseFloat(total);--}}
{{--                                        updateNetWorthTotal();--}}
{{--                                    });--}}

{{--                                    Livewire.on('formbSaved', function (event) {--}}
{{--                                        totalB = parseFloat(event.detail.totalCurrentValue);--}}
{{--                                        updateNetWorthTotal();--}}
{{--                                    });--}}

{{--                                    Livewire.on('formcSaved', function (event) {--}}
{{--                                        totalC = parseFloat(event.detail.totalLiabilities);--}}
{{--                                        updateNetWorthTotal();--}}
{{--                                    });--}}
{{--                                });--}}

{{--                                function updateNetWorthTotal() {--}}
{{--                                    const netWorth = totalA + totalB - totalC;--}}
{{--                                    document.getElementById('netWorthTotal').textContent = netWorth.toFixed(2);--}}
{{--                                }--}}
{{--                            </script>--}}

{{--                        </div>--}}
{{--                        <x-validation-errors class="mb-4 mt-4"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>