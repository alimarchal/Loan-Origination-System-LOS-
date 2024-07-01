<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PersonalNetWorthForma;

class PersonalNetWorthFormaForm extends Component
{
    public $personalNetWorthStatId;
    public $showForm = false;
    public $particulars;
    public $inNameOf;
    public $selfAcquiredFamilyProperty;
    public $encumberDToAsterisk;
    public $marketValue;

    public $formas = [];
    public $totalMarketValue = 0;

    public function mount($personalNetWorthStatId)
    {
        $this->personalNetWorthStatId = $personalNetWorthStatId;
        $this->loadFormas();
    }

    public function loadFormas()
    {
        $this->formas = PersonalNetWorthForma::where('personal_net_worth_stat_id', $this->personalNetWorthStatId)->get();
        $this->calculateTotalMarketValue();
    }

    public function calculateTotalMarketValue()
    {
        $this->totalMarketValue = $this->formas->sum('market_value');
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->resetForm();
    }

    public function addForma()
    {
        $this->validate([
            'particulars' => 'required',
            'inNameOf' => 'required',
            'selfAcquiredFamilyProperty' => 'required',
            'encumberDToAsterisk' => 'required',
            'marketValue' => 'required|numeric',
        ]);

        PersonalNetWorthForma::create([
            'personal_net_worth_stat_id' => $this->personalNetWorthStatId,
            'particulars' => $this->particulars,
            'in_name_of' => $this->inNameOf,
            'self_acquired_family_property' => $this->selfAcquiredFamilyProperty,
            'encumber_d_to_asterisk' => $this->encumberDToAsterisk,
            'market_value' => $this->marketValue,
        ]);

        $this->resetForm();
        $this->loadFormas();
        $this->showForm = false;
    }

    public function deleteForma($id)
    {
        PersonalNetWorthForma::destroy($id);
        $this->loadFormas();
        $this->dispatch('formaUpdated', $this->totalMarketValue);
    }

    private function resetForm()
    {
        $this->particulars = '';
        $this->inNameOf = '';
        $this->selfAcquiredFamilyProperty = '';
        $this->encumberDToAsterisk = '';
        $this->marketValue = '';
    }

    public function render()
    {
        return view('livewire.personal-net-worth-forma-form');
    }
}