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
                            <h2 class="text-sm text-center my-2 uppercase font-bold text-black">ACCOUNT AT THE BANK OF AZAD JAMMU & KASHMIR {{ $borrower->branch?->name }}</h2>
                            <h2 class="text-sm text-center my-2 font-bold text-black">DATE OF REQUEST: {{ \Carbon\Carbon::parse($borrower->created_at)->format('d-m-Y') }}</h2>
                            <div class="relative overflow-x-auto px-2">


                                @foreach($borrower?->guarantor as $gur)
                                    @if($loop->iteration == 1)
                                        {{ $gur->name }}
                                    @endif

                                @endforeach
<br>
                                C: Deatils
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