<x-app-layout>
    @push('header')
            <style>
                table, td, th {
                    /*border: 1px solid;*/
                    /*padding-left: 5px;*/
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                }
            </style>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            {{--            {{ $student->gender === 'Male' ? 'Mr.' : ($student->gender === 'Female' ? 'Miss' : '') }}--}}
            {{--            {{ $student->firstname . ' ' . $student->lastename }} - {{ $student->id }}--}}
            {{--            ::--}}
            {{--            <span class="text-red-700 font-extrabold">Contact: {{ $student->mobile_number_for_sms_alert }} / {{ $student->guardian_emergency_contact }}</span>--}}
        </h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-black">The Bank of Azad Jammu & Kashmir</h2>
                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-black">Check list for {{ $borrower->loan_sub_category->name }}</h2>

                        <div class="relative overflow-x-auto">
                            <table class="table-auto w-full border-collapse border border-black">
                                <thead class="border-black uppercase">
                                <tr class="bg-gray-200 text-black  text-sm font-bold" style="font-size: 12px!important;">
                                    <th class="border-black border py-1 px-2 text-center">Sr.No</th>
                                    <th class="border-black border py-1 px-2 text-center">Details of documents</th>
                                    <th class="border-black border py-1 px-2 text-center">attached</th>
                                </tr>
                                </thead>
                                <tbody class="text-black text-sm font-bold">
                                @foreach (\App\Models\Checklist::where('loan_sub_category_id',$borrower->loan_sub_category->id)->get() as $item)
                                    <tr class="border-b border-black hover:bg-yellow-100" style="font-size: 12px!important;">

                                        <td class="border-black border py-1 px-1 text-center">
                                            {{ $item->sequence_no }}
                                        </td>

                                        <td class="border-black border py-1 px-1 text-left">
                                            {{ $item->name }}
                                        </td>

                                        <td class="border-black border py-1 px-1 text-center">

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <x-validation-errors class="mb-4 mt-4" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>