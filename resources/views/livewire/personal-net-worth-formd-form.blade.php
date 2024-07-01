<div>
    <table style="font-size: 12px!important;margin-top: 3px;">
        <thead>
        <th>Bank Institution</th>
        <th>Amount</th>
        <th>Expiry Date</th>
        <th>Nature of Guarantee/ Surety</th>
        <th class="print:hidden">Actions</th>
        </thead>
        <tbody>
        @foreach($formds as $formd)
            <tr>
                <td>{{ $formd->bank_institution }}</td>
                <td>{{ number_format($formd->amount, 2) }}</td>
                <td>{{ $formd->expiry_date }}</td>
                <td>{{ $formd->nature_of_guarantee_surety }}</td>
                <td class="text-center print:hidden">
                    <button wire:click="editFormd({{ $formd->id }})" class="print:hidden text-blue-600 hover:text-blue-900 hover:underline hover:font-extrabold">Edit</button>
                    <button wire:click="deleteFormd({{ $formd->id }})" class="print:hidden text-red-600 hover:text-red-900 hover:underline hover:font-extrabold">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <button wire:click="toggleForm" class="print:hidden mt-2 mb-2 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
        {{ $showForm ? 'Cancel' : 'Add New Entry' }}
    </button>

    @if($showForm)
        <form wire:submit.prevent="{{ $editing ? 'updateFormd' : 'addFormd' }}" class="mt-4">
            <div class="grid grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-4">
                <div class="mb-4">
                    <label for="bankInstitution" class="block text-gray-700 text-sm font-bold mb-2">Bank Institution</label>
                    <input type="text" id="bankInstitution" wire:model="bankInstitution" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                    <input type="number" step="0.01" id="amount" wire:model="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="expiryDate" class="block text-gray-700 text-sm font-bold mb-2">Expiry Date</label>
                    <input type="date" id="expiryDate" wire:model="expiryDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="natureOfGuaranteeSurety" class="block text-gray-700 text-sm font-bold mb-2">Nature of Guarantee/ Surety</label>
                    <input type="text" id="natureOfGuaranteeSurety" wire:model="natureOfGuaranteeSurety" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
            <button type="submit" class="print:hidden bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                {{ $editing ? 'Update Entry' : 'Add Entry' }}
            </button>
        </form>
    @endif
</div>