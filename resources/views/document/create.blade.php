<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Create Document
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

                        <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">Document Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('document.store', $borrower->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <!-- Form fields for Document -->
                                <div>
                                    <x-label for="document_type" value="Document Type" />
                                    <x-input id="document_type" class="block mt-1 w-full" type="text" name="document_type" :value="old('document_type')" />
                                </div>

                                <div>
                                    <x-label for="description" value="Description" />
                                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
                                </div>

                                <div>
                                    <x-label for="path_attachment" value="Attachment" />
                                    <x-input id="path_attachment" class="block mt-1 w-full" type="file" name="path_attachment" :value="old('path_attachment')" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">Save</x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
