<div>
    <h2 class="text-2xl font-bold mb-4">Personal Net Worth Calculator</h2>

    <table class="w-full mb-4">
        <tr>
            <th class="w-1/2 text-left">LIABILITIES</th>
            <th class="w-1/2 text-left">ASSETS</th>
        </tr>
        <tr>
            <td class="align-top">
                <table class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                    <tr>
                        <th class="w-1/2">Description</th>
                        <th class="w-1/3">Value (PKR)</th>
                        <th class="w-1/6">Action</th>
                    </tr>
                    @foreach($liabilities as $index => $liability)
                        <tr>
                            <td>
                                <input type="text" wire:model="liabilities.{{ $index }}.description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" placeholder="Description">
                            </td>
                            <td>
                                <input type="number" wire:model="liabilities.{{ $index }}.value" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" placeholder="Value" step="0.01">
                            </td>
                            <td>
                                <button wire:click="removeLiability({{ $index }})" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <button wire:click="addLiability" class="bg-blue-500 text-white p-2 rounded mt-2">Add Liability</button>
            </td>
            <td class="align-top">
                <table class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                    <tr>
                        <th class="w-1/2">Description</th>
                        <th class="w-1/3">Value (PKR)</th>
                        <th class="w-1/6">Action</th>
                    </tr>
                    @foreach($assets as $index => $asset)
                        <tr>
                            <td>
                                <input type="text" wire:model="assets.{{ $index }}.description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" placeholder="Description">
                            </td>
                            <td>
                                <input type="number" wire:model="assets.{{ $index }}.value" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" placeholder="Value" step="0.01">
                            </td>
                            <td>
                                <button wire:click="removeAsset({{ $index }})" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <button wire:click="addAsset" class="bg-blue-500 text-white p-2 rounded mt-2">Add Asset</button>
            </td>
        </tr>
        <tr>
            <td>
                <strong>TOTAL LIABILITIES: PKR {{ number_format($totalLiabilities, 2) }}</strong>
            </td>
            <td>
                <strong>TOTAL ASSETS: PKR {{ number_format($totalAssets, 2) }}</strong>
            </td>
        </tr>
    </table>

    <table class="w-full mb-4">
        <tr>
            <th class="text-left">PERSONAL NET WORTH (ASSETS MINUS LIABILITIES)</th>
            <td class="font-bold">PKR {{ number_format($personalNetWorth, 2) }}</td>
        </tr>
    </table>

    <button wire:click="save" class="bg-green-500 text-white p-2 rounded mt-4">Save</button>

    @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif
</div>