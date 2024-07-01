<div>
    <table style="font-size: 12px!important;margin-top: 3px;">
        <thead>
        <th style="width: 35%">Particular</th>
        <th>Description</th>
        <th>Amount</th>
        </thead>
        <tbody>
        @foreach($formcs as $index => $formc)
            <tr>
                <td>{{ $formc['particulars'] }}</td>
                @if($editing)
                    <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" wire:model="formcs.{{ $index }}.description"></td>
                    <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" wire:model="formcs.{{ $index }}.amount"></td>
                @else
                    <td>{{ $formc['description'] }}</td>
                    <td>{{ number_format($formc['amount'], 2) }}</td>
                @endif
            </tr>
        @endforeach
        <tr>
            <td>Total Liabilities</td>
            <td></td>
            <td>{{ number_format($totalLiabilities, 2) }}</td>
        </tr>
        </tbody>
    </table>

    @if($editing)
        <button class="print:hidden mt-2 mb-2 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150" wire:click="save">Save</button>
    @else
        <button class="print:hidden mt-2 mb-2 inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 disabled:opacity-50 transition ease-in-out duration-150" wire:click="edit">Edit</button>
    @endif
</div>