<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PersonalNetWorthFormc;

class PersonalNetWorthFormcForm extends Component
{
    public $personalNetWorthStatId;
    public $formcs = [];
    public $editing = false;
    public $totalLiabilities = 0;

    public function mount($personalNetWorthStatId)
    {
        $this->personalNetWorthStatId = $personalNetWorthStatId;
        $this->loadFormcs();
    }

    public function loadFormcs()
    {
        $savedFormcs = PersonalNetWorthFormc::where('personal_net_worth_stat_id', $this->personalNetWorthStatId)->get();

        if ($savedFormcs->isNotEmpty()) {
            $this->formcs = $savedFormcs->toArray();
            $this->editing = false;
        } else {
            $this->formcs = [
                ['particulars' => 'Undertakings/ Guarantees/ Sureties', 'description' => '', 'amount' => 0],
                ['particulars' => 'Personal Liabilities (Loans/ Credits)', 'description' => '', 'amount' => 0],
                ['particulars' => 'Mortgages on Property', 'description' => '', 'amount' => 0],
            ];
            $this->editing = true;
        }

        $this->calculateTotalLiabilities();
    }

    public function calculateTotalLiabilities()
    {
        $this->totalLiabilities = collect($this->formcs)->sum('amount');
    }

    public function save()
    {
        PersonalNetWorthFormc::where('personal_net_worth_stat_id', $this->personalNetWorthStatId)->delete();

        foreach ($this->formcs as $formc) {
            PersonalNetWorthFormc::create([
                'personal_net_worth_stat_id' => $this->personalNetWorthStatId,
                'particulars' => $formc['particulars'],
                'description' => $formc['description'],
                'amount' => $formc['amount'] ?? 0,
            ]);
        }

        $this->editing = false;
        $this->loadFormcs();
        $this->dispatch('formcSaved', ['totalLiabilities' => $this->totalLiabilities]);
    }

    public function edit()
    {
        $this->editing = true;
    }

    public function render()
    {
        return view('livewire.personal-net-worth-formc-form', [
            'formcs' => $this->formcs,
            'totalLiabilities' => $this->totalLiabilities,
            'editing' => $this->editing,
        ]);
    }
}