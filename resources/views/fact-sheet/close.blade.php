<x-app-layout>
    @push('header')
        <style>
            table, td, th {
                border: 1px solid;
                padding-left: 5px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }
        </style>
    @endpush

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden ">
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent ">
                    <div class="mb-4 px-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <h2 class="text-sm text-center mt-2 my-2 underline font-bold text-black">{{ ucwords(strtolower("BASIC BORROWER'S FACT SHEET – FOR INDIVIDUALS / CONSUMERS has been stored please close this windows and refresh old window.")) }}</h2>
                        <span class="block text-center">
                            <a id="btnPrint" class="hidden-print  inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150" onclick="window.close()">Close</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>