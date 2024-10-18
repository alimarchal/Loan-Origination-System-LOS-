<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Create List House Hold Item
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

                        <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">List House Hold Item Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('list-house-hold-item.store', $borrower->id) }}">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <div>
                                    <x-label for="description_of_items" value="Description of Items" />
                                    <x-input id="description_of_items" class="block mt-1 w-full" type="text" name="description_of_items" :value="old('description_of_items')" required />
                                </div>

                                <div>
                                    <x-label for="quantity" value="No Of Item" />
                                    <x-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" step="0.01" required />
                                </div>

                                <div>
                                    <x-label for="market_value" value="Market Value" />
                                    <x-input id="market_value" class="block mt-1 w-full" type="number" name="market_value" :value="old('market_value')" step="0.01" required />
                                </div>

                                <div>
                                    <x-label for="amount" value="Amount" />
                                    <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" step="0.01" required />
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
