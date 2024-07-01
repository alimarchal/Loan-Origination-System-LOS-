<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PersonalNetWorthFormd;

class PersonalNetWorthFormdForm extends Component
{
    public $personalNetWorthStatId;
    public $formds = [];
    public $showForm = false;
    public $editing = false;
    public $editingId = null;

    public $bankInstitution;
    public $amount;
    public $expiryDate;
    public $natureOfGuaranteeSurety;

    protected $rules = [
        'bankInstitution' => 'required',
        'amount' => 'required|numeric',
        'expiryDate' => 'required|date',
        'natureOfGuaranteeSurety' => 'required',
    ];

    public function mount($personalNetWorthStatId)
    {
        $this->personalNetWorthStatId = $personalNetWorthStatId;
        $this->loadFormds();
    }

    public function loadFormds()
    {
        $this->formds = PersonalNetWorthFormd::where('personal_net_worth_stat_id', $this->personalNetWorthStatId)->get();
    }


    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->resetForm();
    }

    public function addFormd()
    {
        $this->validate();

        PersonalNetWorthFormd::create([
            'personal_net_worth_stat_id' => $this->personalNetWorthStatId,
            'bank_institution' => $this->bankInstitution,
            'amount' => $this->amount,
            'expiry_date' => $this->expiryDate,
            'nature_of_guarantee_surety' => $this->natureOfGuaranteeSurety,
        ]);

        $this->resetForm();
        $this->loadFormds();
        $this->showForm = false;
    }

    public function editFormd($id)
    {
        $formd = PersonalNetWorthFormd::find($id);
        $this->editingId = $id;
        $this->bankInstitution = $formd->bank_institution;
        $this->amount = $formd->amount;
        $this->expiryDate = $formd->expiry_date;
        $this->natureOfGuaranteeSurety = $formd->nature_of_guarantee_surety;
        $this->editing = true;
        $this->showForm = true;
    }

    public function updateFormd()
    {
        $this->validate();

        PersonalNetWorthFormd::find($this->editingId)->update([
            'bank_institution' => $this->bankInstitution,
            'amount' => $this->amount,
            'expiry_date' => $this->expiryDate,
            'nature_of_guarantee_surety' => $this->natureOfGuaranteeSurety,
        ]);

        $this->resetForm();
        $this->loadFormds();
        $this->editing = false;
        $this->showForm = false;
    }

    public function deleteFormd($id)
    {
        PersonalNetWorthFormd::destroy($id);
        $this->loadFormds();
    }

    private function resetForm()
    {
        $this->bankInstitution = '';
        $this->amount = '';
        $this->expiryDate = '';
        $this->natureOfGuaranteeSurety = '';
        $this->editingId = null;
    }

    public function render()
    {
        return view('livewire.personal-net-worth-formd-form');
    }
}