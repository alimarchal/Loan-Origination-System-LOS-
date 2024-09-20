<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($editing)
        <form wire:submit.prevent="save">
            <table style="font-size: 12px!important;margin-bottom: 3px;">
                <tr>
                    <td>Name: <input name="name" type="text" wire:model.defer="editableData.name" class="w-full"></td>
                    <td>NIC No: <input name="nic_no" type="text" wire:model.defer="editableData.nic_no" class="w-full"></td>
                </tr>
                <tr>
                    <td>Father's Name: <input type="text" wire:model.defer="editableData.father_name" class="w-full"></td>
                    <td>NTN No: <input type="text" wire:model.defer="editableData.ntn_no" class="w-full"></td>
                </tr>
                <tr>
                    <td>Business Address: <input type="text" wire:model.defer="editableData.business_address" class="w-full"></td>
                    <td>Tele: (Office): <input type="text" wire:model.defer="editableData.tel_office" class="w-full"></td>
                </tr>
                <tr>
                    <td>Residential address: <input type="text" wire:model.defer="editableData.res_address" class="w-full"></td>
                    <td>Tele: (Residence): <input type="text" wire:model.defer="editableData.tel_office" class="w-full"></td>
                </tr>
                <tr>
                    <td>Qualification: <input type="text" wire:model.defer="editableData.qualification" class="w-full"></td>
                    <td>
                        Educational: <input type="text" wire:model.defer="editableData.education" class="w-full">
                        Professional: <input type="text" wire:model.defer="editableData.profession" class="w-full">
                    </td>
                </tr>
            </table>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ $personalNetWorthStat->exists ? 'Update' : 'Save' }}
                </button>
            </div>
        </form>
    @else
        <table style="font-size: 12px!important;margin-bottom: 3px;">
            <tr>
                <td>Name: {{ $personalNetWorthStat->name }}</td>
                <td>NIC No: {{ $personalNetWorthStat->nic_no }}</td>
            </tr>
            <tr>
                <td>Father's Name: {{ $personalNetWorthStat->father_name }}</td>
                <td>NTN No: {{ $personalNetWorthStat->ntn_no }}</td>
            </tr>
            <tr>
                <td>Business Address: {{ $personalNetWorthStat->business_address }}</td>
                <td>Tele: (Office): {{ $personalNetWorthStat->tel_office }}</td>
            </tr>
            <tr>
                <td>Residential address: {{ $personalNetWorthStat->res_address }}</td>
                <td>Tele: (Residence): {{ $personalNetWorthStat->tel_res }}</td>
            </tr>
            <tr>
                <td>Qualification: {{ $personalNetWorthStat->qualification }}</td>
                <td>
                    Educational: {{ $personalNetWorthStat->education }}
                    Professional: {{ $personalNetWorthStat->profession }}
                </td>
            </tr>
        </table>

        <div class="mt-4 print:hidden">
            <button wire:click="edit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit
            </button>
        </div>
    @endif

    @if($personalNetWorthStat->exists)
        <div class="mt-2">
            @livewire('personal-net-worth-forma-form', ['personalNetWorthStatId' => $personalNetWorthStat->id])
            @livewire('personal-net-worth-formb-form', ['personalNetWorthStatId' => $personalNetWorthStat->id])
            @livewire('personal-net-worth-formc-form', ['personalNetWorthStatId' => $personalNetWorthStat->id])
            @livewire('personal-net-worth-formd-form', ['personalNetWorthStatId' => $personalNetWorthStat->id])
        </div>
    @endif
</div>
