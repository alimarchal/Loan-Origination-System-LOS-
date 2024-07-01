<div>
    <span class="font-bold">A. Immovable Assets/ Real Estates, owned in Personal Capacity.</span>
    <table style="font-size: 12px!important;margin-top: 3px;">
        <thead>
        <tr>
            <th>Particulars</th>
            <th>In the name of</th>
            <th>Self acquired Or Family property</th>
            <th>Encumbered d to (*)</th>
            <th>Market Value</th>
            <th class="print:hidden">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($formas as $forma)
            <tr>
                <td>{{ $forma->particulars }}</td>
                <td>{{ $forma->in_name_of }}</td>
                <td>{{ $forma->self_acquired_family_property }}</td>
                <td>{{ $forma->encumber_d_to_asterisk }}</td>
                <td>{{ number_format($forma->market_value, 2) }}</td>
                <td class="print:hidden">
                    <button wire:click="deleteForma({{ $forma->id }})" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4">Total Market Value</td>
            <td>{{ number_format($totalMarketValue, 2) }}</td>
            <td class="print:hidden"></td>
        </tr>
        </tbody>
    </table>

    <button wire:click="toggleForm" class="print:hidden mt-2 mb-2 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
        {{ $showForm ? 'Cancel' : 'Add New Entry' }}
    </button>

    @if($showForm)
        <form wire:submit.prevent="addForma" class="mt-4">
            <div class="grid grid-cols-5 md:grid-cols-5 lg:grid-cols-5 gap-4">
                <div class="mb-4">
                    <label for="particulars" class="block text-gray-700 text-sm font-bold mb-2">Particulars</label>
                    <input type="text" id="particulars" wire:model="particulars" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="inNameOf" class="block text-gray-700 text-sm font-bold mb-2">In the name of</label>
                    <input type="text" id="inNameOf" wire:model="inNameOf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="selfAcquiredFamilyProperty" class="block text-gray-700 text-sm font-bold mb-2">Self acquired Or Family property</label>
                    <input type="text" id="selfAcquiredFamilyProperty" wire:model="selfAcquiredFamilyProperty" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="encumberDToAsterisk" class="block text-gray-700 text-sm font-bold mb-2">Encumbered d to (*)</label>
                    <input type="text" id="encumberDToAsterisk" wire:model="encumberDToAsterisk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="marketValue" class="block text-gray-700 text-sm font-bold mb-2">Market Value</label>
                    <input type="number" step="0.01" id="marketValue" wire:model="marketValue" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded print:hidden">
                Add Entry
            </button>
        </form>
    @endif
</div>