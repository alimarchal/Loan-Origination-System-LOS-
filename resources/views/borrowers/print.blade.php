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


                        @if($borrower->applicant_business_many->isNotEmpty())
                            Yes

                        @endif




                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')

    @endpush
</x-app-layout>