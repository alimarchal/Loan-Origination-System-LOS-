<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Student Logs
        </h2>


        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4"/>
                <div
                    class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div
                        class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <x-validation-errors class="mb-4 mt-4 "/>



                    @if($applied_for_certificate_history->isNotEmpty())
                        <h1 class="mt-2 mb-2 text-center text-red-950 text-2xl font-bold underline">Applied Certificates</h1>
                        <div class="relative overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                <tr class="bg-gray-200 text-black uppercase text-sm leading-normal"
                                    style="background-color: #0f0161;color: #fff;">
                                    <th class="py-1 px-2 text-center">#</th>
                                    <th class="py-1 px-2 text-center">Date</th>
                                    <th class="py-1 px-2 text-center">Certificate</th>
                                    <th class="py-1 px-2 text-center">Updated By</th>
                                    <th class="py-1 px-2 text-center">IS Deleted</th>
                                </tr>
                                </thead>
                                <tbody class="text-black text-sm font-bold">
                                @foreach ($applied_for_certificate_history as $sh)
                                    <tr class="border-b border-gray-200 hover:bg-yellow-100">

                                        <td class="py-1 px-2 text-center">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="py-1 px-2 text-center">
                                            {{ $sh->created_at }}
                                        </td>

                                        <td class="py-1 px-2 text-center">
                                            {{ \App\Models\CertificateCategory::find($sh->certificate_category_id)->name }}
                                        </td>

                                        <td class="py-1 px-2 text-center">
                                            {{ \App\Models\User::find($sh->created_by_id)->name }}
                                        </td>

                                        <td class="py-1 px-2 text-center">
                                            {{ $sh->deleted_at }}
                                        </td>



                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif



                    @if($student_status_history->isNotEmpty())
                            <h1 class="mt-2 mb-2 text-center text-red-950 text-2xl font-bold underline">Status</h1>
                            <div class="relative overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal"
                                        style="background-color: #0f0161;color: #fff;">
                                        <th class="py-1 px-2 text-center">#</th>
                                        <th class="py-1 px-2 text-center">Date</th>
                                        <th class="py-1 px-2 text-center">Session Year</th>
                                        <th class="py-1 px-2 text-center">Status</th>
                                        <th class="py-1 px-2 text-center">Updated By</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($student_status_history as $sh)
                                        <tr class="border-b border-gray-200 hover:bg-yellow-100">

                                            <td class="py-1 px-2 text-center">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ $sh->created_at }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \Carbon\Carbon::parse(\App\Models\SessionYear::find($sh->session_year_id)->start_year)->format('Y-') . \Carbon\Carbon::parse(\App\Models\SessionYear::find($sh->session_year_id)->end_year)->format('Y') }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \App\Models\Status::find($sh->status_id)->name }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \App\Models\User::find($sh->created_by_id)->name }}
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @endif



                        @if($student_session_history->isNotEmpty())
                            <h1 class="mt-2 mb-2 text-center text-red-950 text-2xl font-bold underline">Session History</h1>
                            <div class="relative overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal"
                                        style="background-color: #0f0161;color: #fff;">
                                        <th class="py-1 px-2 text-center">#</th>
                                        <th class="py-1 px-2 text-center">Date</th>
                                        <th class="py-1 px-2 text-center">Session Year</th>
                                        <th class="py-1 px-2 text-center">Updated By</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($student_session_history as $sh)
                                        <tr class="border-b border-gray-200 hover:bg-yellow-100">

                                            <td class="py-1 px-2 text-center">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ $sh->created_at }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \Carbon\Carbon::parse(\App\Models\SessionYear::find($sh->session_year_id)->start_year)->format('Y-') . \Carbon\Carbon::parse(\App\Models\SessionYear::find($sh->session_year_id)->end_year)->format('Y') }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \App\Models\User::find($sh->created_by_id)->name }}
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @endif



                        @if($student_deleted_fee_schedule->isNotEmpty())
                            <h1 class="mt-2 mb-2 text-center text-red-950 text-2xl font-bold underline">Deleted Fee Schedule History</h1>
                            <div class="relative overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-black uppercase text-sm leading-normal"
                                        style="background-color: #0f0161;color: #fff;">
                                        <th class="py-1 px-2 text-center">#</th>
                                        <th class="py-1 px-2 text-center">Date</th>
                                        <th class="py-1 px-2 text-center">Session Year</th>
                                        <th class="py-1 px-2 text-center">Status</th>
                                        <th class="py-1 px-2 text-center">Created By</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-bold">
                                    @foreach ($student_deleted_fee_schedule as $sh)
                                        <tr class="border-b border-gray-200 hover:bg-yellow-100">

                                            <td class="py-1 px-2 text-center">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ $sh->created_at }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \Carbon\Carbon::parse(\App\Models\SessionYear::find($sh->session_year_id)->start_year)->format('Y-') . \Carbon\Carbon::parse(\App\Models\SessionYear::find($sh->session_year_id)->end_year)->format('Y') }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \App\Models\Status::find($sh->status_id)->name }}
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                {{ \App\Models\User::find($sh->created_by_id)->name }}
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
