<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Document List
        </h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-2 lg:pb-2 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')




                    <div class="relative overflow-x-auto">

                        @if($documents->isNotEmpty())
                            <h2 class="text-2xl mt-1 text-center my-2 uppercase underline font-bold text-red-700">Attachments</h2>

                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-bank-green text-white uppercase text-sm">
                                    <th class="py-2 px-2 text-center">ID</th>
                                    <th class="py-2 px-2 text-center">Document Type</th>
                                    <th class="py-2 px-2 text-center">Description</th>
                                    <th class="py-2 px-2 text-center">Attachment</th>
                                    <th class="py-2 px-2 text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-black text-sm leading-normal">
                                @foreach ($documents as $document)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-1 px-2 text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            {{ $document->document_type }}
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            {{ $document->description }}
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <a class="inline-flex" href="{{ asset('storage/' . $document->path_attachment) }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                                </svg>

                                            </a>
                                        </td>
                                        <td class="py-1 px-2 text-center">
{{--                                            <a href="{{ route('document.edit', [$document->borrower_id, $document->id]) }}" class="inline-flex ">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />--}}
{{--                                                </svg>--}}
{{--                                            </a>--}}
                                            <form action="{{ route('document.destroy', [$document->borrower_id, $document->id]) }}" method="post" class="inline-block" onsubmit="return confirm('Do you really want to delete the record?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                        <a href="{{ route('document.create', $borrower->id) }}" class="inline-flex mt-2 mr-2 items-center float-right px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                            Add New Document
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
