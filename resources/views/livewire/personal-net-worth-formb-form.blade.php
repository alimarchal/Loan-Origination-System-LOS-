<div>
    <span class="font-bold">B. Movable Assets/ Securities etc.</span>
    <table style="font-size: 12px!important;margin-top: 3px;">
        <thead>
        <th style="width: 50%">Particular</th>
        <th>Description</th>
        <th>Current Value</th>
        </thead>
        <tbody>
        @foreach($formbs as $index => $formb)
            <tr>
                <td>{{ $formb['particulars'] }}</td>
                @if($editing)
                    <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" wire:model="formbs.{{ $index }}.description"></td>
                    <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" step="0.01" wire:model="formbs.{{ $index }}.current_value"></td>
                @else
                    <td>{{ $formb['description'] }}</td>
                    <td>{{ number_format($formb['current_value'], 2) }}</td>
                @endif
            </tr>
        @endforeach
        <tr>
            <td>Total Current Value</td>
            <td></td>
            <td>{{ number_format($totalCurrentValue, 2) }}</td>
        </tr>
        </tbody>
    </table>

    @if($editing)
        <button wire:click="save" class="print:hidden mt-2 mb-2 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">Save</button>
    @else
        <button wire:click="edit" class="print:hidden mt-2 mb-2 inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 disabled:opacity-50 transition ease-in-out duration-150">Edit</button>
    @endif
</div>