<x-app-layout>
    @push('header')
        <link rel="stylesheet" href="{{ url('jsandcss/daterangepicker.min.css') }}">
        <script src="{{ url('jsandcss/moment.min.js') }}"></script>
        <script src="{{ url('jsandcss/knockout-3.5.1.js') }}" defer></script>
        <script src="{{ url('jsandcss/daterangepicker.min.js') }}" defer></script>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
        </h2>
        <div class="flex justify-center items-center float-right">
            <div class="flex justify-center items-center float-right print:hidden">

                @can('credit report create')
                <a href="{{ route('credit-reporting.create') }}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2">
                    <svg data-slot="icon" fill="none" class="h-5 w-5" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                    </svg>
                </a>

                @endcan
                <button id="toggle" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"
                        />
                    </svg>

                </button>

                <button onclick="window.print()" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2"
                        title="Members List">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                </button>



                <a href="#" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4 mt-6 shadow-lg rounded-lg" style="display: none" id="filters">
        <form action="{{ route('credit-reporting.index') }}" method="GET" class="mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label for="filter[id]" class="block text-sm font-medium text-gray-700">Credit Report ID</label>
                    <input type="text" name="filter[id]" id="filter[id]" value="{{ request('filter.id') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="filter[branch_id]" class="block text-sm font-medium text-gray-700">Branch ID</label>
                    <input type="text" name="filter[branch_id]" id="filter[branch_id]" value="{{ request('filter.branch_id') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="filter[name]" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="filter[name]" id="filter[name]" value="{{ request('filter.name') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="filter[national_id_cnic]" class="block text-sm font-medium text-gray-700">CNIC</label>
                    <input type="text" name="filter[national_id_cnic]" id="filter[national_id_cnic]" value="{{ request('filter.national_id_cnic') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="filter[status]" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="filter[status]" id="filter[status]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="">Select Status</option>
                        <option value="InProcess" {{ request('filter.status') == 'InProcess' ? 'selected' : '' }}>InProcess</option>
                        <option value="Completed" {{ request('filter.status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div></div>

                <div class="mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Apply Filters
                    </button>
                    <a href="{{ route('credit-reporting.index') }}" class="ml-2 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Clear Filters
                    </a>
                </div>
            </div>
        </form>
    </div>



        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl print:shadow-none sm:rounded-lg">
                    <x-status-message class="ml-4 mt-4" />
                    <x-validation-errors class="ml-4 mt-4" />
                    @if($credit_reporting->isNotEmpty())
                        <div class="relative overflow-x-auto rounded-lg ">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-gray-200 text-white bg-bank-green uppercase print:border-b print:border-black  text-sm print:text-black">
                                    <th class="py-2 px-2 text-center">#</th>
                                    <th class="py-2 px-2 text-center">Branch Code</th>
                                    <th class="py-2 px-2 text-center">Name</th>
                                    <th class="py-2 px-2 text-center">CNIC</th>
                                    <th class="py-2 px-2 text-center">Comments</th>
                                    <th class="py-2 px-2 text-center">Attachment</th>
                                    <th class="py-2 px-2 text-center">Status</th>
                                    <th class="py-2 px-2 text-center">Updated At</th>
                                    @canany(['credit report edit', 'credit report update'])
                                            <th class="py-2 px-2 text-center print:hidden">Action</th>
                                    @endcanany
                                </tr>
                                </thead>
                                @foreach ($credit_reporting as $cr)
                                    <tbody class="text-black text-md leading-normal font-extrabold">
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-1 px-2 text-center">
                                            {{ $cr->id }}
                                        </td>


                                        <td class="py-1 px-2 text-center">
                                            {{ $cr->branch?->code }}

                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            {{ $cr->name }}
                                        </td>

                                        <td class="py-1 px-2 text-center">
                                            {{ $cr->national_id_cnic }}
                                        </td>

                                        <td class="py-1 px-2 text-center">
                                            {{ $cr->comments }}
                                        </td>

                                        <td class="py-1 px-2 text-center">
                                            @if(!empty($cr->path_attachment))
                                                <a href="{{ \Illuminate\Support\Facades\Storage::url($cr->path_attachment) }}" class="text-blue-500 hover:underline">
                                                    Download
                                                </a>
                                            @endif

                                        </td>




                                        <td class="py-1 px-2 text-center ">
                                            {{ $cr->status }}
                                        </td>


                                        <td class="py-1 px-2 text-center ">
                                            {{ \Carbon\Carbon::parse($cr->updated_at)->format('d M, y H:i:s') }}
                                        </td>

                                        @canany(['credit report edit', 'credit report update'])
                                        <td class="py-1 px-2 text-center print:hidden">

                                            @if($cr->status != "Completed")
                                                <a href="{{ route('credit-reporting.edit', $cr->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                                    View
                                                </a>
                                            @endif

                                        @endcanany
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @push('modals')
            <script>
                const targetDiv = document.getElementById("filters");
                const btn = document.getElementById("toggle");
                btn.onclick = function () {
                    if (targetDiv.style.display !== "none") {
                        targetDiv.style.display = "none";
                    } else {
                        targetDiv.style.display = "block";
                        // btn.innerHTML = "Hide";
                    }
                };

            </script>
        @endpush
</x-app-layout>
