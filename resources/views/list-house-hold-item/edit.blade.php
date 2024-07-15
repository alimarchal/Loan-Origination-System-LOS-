<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Edit List House Hold Item
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
                        <form method="POST" action="{{ route('list-house-hold-item.update', [$borrower->id, $listHouseHoldItem->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <div>
                                    <x-label for="description_of_items" value="Description of Items" />
                                    <x-input id="description_of_items" class="block mt-1 w-full" type="text" name="description_of_items" :value="old('description_of_items', $listHouseHoldItem->description_of_items)" required />
                                </div>

                                <div>
                                    <x-label for="quantity" value="Quantity" />
                                    <x-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity', $listHouseHoldItem->quantity)" step="0.01" required />
                                </div>

                                <div>
                                    <x-label for="market_value" value="Market Value" />
                                    <x-input id="market_value" class="block mt-1 w-full" type="number" name="market_value" :value="old('market_value', $listHouseHoldItem->market_value)" step="0.01" required />
                                </div>

                                <div>
                                    <x-label for="amount" value="Amount" />
                                    <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount', $listHouseHoldItem->amount)" step="0.01" required />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">Update</x-button>
                            </div>
                        </form>

                        <a href="{{ route('list-house-hold-item.index', $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
