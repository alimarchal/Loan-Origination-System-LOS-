<x-app-layout>'

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Users') }}
        </h2>

        <div class="flex justify-center items-center float-right">

            <a href="{{ route('users.create') }}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2">
                <svg data-slot="icon" fill="none" class="h-6 w-6" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                </svg>
            </a>



            <a href="javascript:;" id="toggle"
               class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2"
               title="Members List">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
            </a>

        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-2 lg:px-8 print:hidden " style="display: none" id="filters">
        <div class="rounded-xl p-4 bg-white shadow-lg">
            <form method="GET" action="{{ route('users.index') }}">
                <div class="mt-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="filter[name]" value="{{ request('filter.name') }}" />
                    </div>

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="text" name="filter[email]" value="{{ request('filter.email') }}" />
                    </div>

                    <div>
                        <x-label for="designation" value="{{ __('Designation') }}" />
                        <x-input id="designation" class="block mt-1 w-full" type="text" name="filter[designation]" value="{{ request('filter.designation') }}" />
                    </div>

                    <div>
                        <x-label for="status" value="{{ __('Status') }}" />
                        <select name="filter[status]" id="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="" selected>None</option>
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>



                </div>

                <div class="mt-4">
                    <x-button class="bg-indigo-500 text-white">
                        {{ __('Apply Filters') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-status-message class="ml-4 mt-4"/>
                <x-validation-errors class="ml-4 mt-4"/>
                @if($users->isNotEmpty())
                    <div class="relative overflow-x-auto rounded-lg ">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-white bank-green-bg uppercase text-sm" >
                                <th class="py-2 px-2 text-center">ID</th>
                                <th class="py-2 px-2 text-left">Name</th>
                                <th class="py-2 px-2 text-left">Email</th>
                                <th class="py-2 px-2 text-left">Designation</th>
                                <th class="py-2 px-2 text-center">Role</th>
                                <th class="py-2 px-2 text-center">Status</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                                <tbody class="text-black text-md leading-normal ">
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-1 px-2 text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-1 px-2 text-left">
                                        <a href="{{ route('users.edit', $user->id) }}" class="hover:underline text-blue-600">
                                            {{ $user->name }}
                                        </a>
                                    </td>

                                    <td class="py-1 px-2 text-left">
                                        {{ $user->email }}
                                    </td>

                                    <td class="py-1 px-2 text-left">
                                        {{ $user->designation }}
                                    </td>


                                    <td class="py-1 px-2 text-center">
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="py-1 px-2 text-center">
                                        {{ $user->status }}
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
                }
            };

            function redirectToLink(url) {
                window.location.href = url;
            }
        </script>
    @endpush
</x-app-layout>
