<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PersonalNetWorthFormb;

class PersonalNetWorthFormbForm extends Component
{
    public $personalNetWorthStatId;
    public $formbs = [];
    public $editing = false;
    public $totalCurrentValue = 0;

    public function mount($personalNetWorthStatId)
    {
        $this->personalNetWorthStatId = $personalNetWorthStatId;
        $this->loadFormbs();
    }

    public function loadFormbs()
    {
        $savedFormbs = PersonalNetWorthFormb::where('personal_net_worth_stat_id', $this->personalNetWorthStatId)->get();

        if ($savedFormbs->isNotEmpty()) {
            $this->formbs = $savedFormbs->toArray();
        } else {
            $this->formbs = [
                ['particulars' => 'Cash/ Prize Bonds/Deposits', 'description' => '', 'current_value' => 0],
                ['particulars' => 'Securities (Share scrips/National securities/NIT Units/Investment Bonds/mutual funds etc)', 'description' => '', 'current_value' => 0],
                ['particulars' => 'Jewelleries/Ornaments', 'description' => '', 'current_value' => 0],
                ['particulars' => 'Motor Vehicles', 'description' => '', 'current_value' => 0],
                ['particulars' => 'Agricultural equipments', 'description' => '', 'current_value' => 0],
                ['particulars' => 'Livestock', 'description' => '', 'current_value' => 0],
                ['particulars' => 'Furniture/Fixtures/Appliances', 'description' => '', 'current_value' => 0],
                ['particulars' => 'Others', 'description' => '', 'current_value' => 0],
            ];
        }

        $this->calculateTotalCurrentValue();
    }

    public function calculateTotalCurrentValue()
    {
        $this->totalCurrentValue = collect($this->formbs)->sum('current_value');
    }

    public function save()
    {
        PersonalNetWorthFormb::where('personal_net_worth_stat_id', $this->personalNetWorthStatId)->delete();

        foreach ($this->formbs as $formb) {
            PersonalNetWorthFormb::create([
                'personal_net_worth_stat_id' => $this->personalNetWorthStatId,
                'particulars' => $formb['particulars'],
                'description' => $formb['description'],
                'current_value' => $formb['current_value'] ?? 0,
            ]);
        }

        $this->editing = false;
        $this->loadFormbs();
        $this->dispatch('formbSaved', ['totalCurrentValue' => $this->totalCurrentValue]);
    }

    public function edit()
    {
        $this->editing = true;
    }

    public function render()
    {
        return view('livewire.personal-net-worth-formb-form');
    }
}