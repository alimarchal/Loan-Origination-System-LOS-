<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PersonalNetWorthStat;
use Illuminate\Support\Facades\Log;

class PersonalNetWorthStatForm extends Component
{
    public $borrower;
    public $personalNetWorthStat;
    public $editing = false;
    public $editableData = [];

    protected $rules = [
        'editableData.name' => 'required|string|max:255',
        'editableData.nic_no' => 'required|string|max:255',
        'editableData.father_name' => 'required|string|max:255',
        'editableData.ntn_no' => 'nullable|string|max:255',
        'editableData.business_address' => 'nullable|string|max:255',
        'editableData.tel_office' => 'nullable|string|max:255',
        'editableData.res_address' => 'nullable|string|max:255',
        'editableData.tel_res' => 'nullable|string|max:255',
        'editableData.qualification' => 'nullable|string|max:255',
        'editableData.education' => 'nullable|string|max:255',
        'editableData.profession' => 'nullable|string|max:255',
    ];

    public function mount($borrower)
    {
        $this->borrower = $borrower;
        $this->personalNetWorthStat = $borrower->personalNetWorthStat ?? new PersonalNetWorthStat();
        $this->editing = !$this->personalNetWorthStat->exists;
        $this->initializeEditableData();
    }

    public function initializeEditableData()
    {
        $this->editableData = [
            'name' => $this->personalNetWorthStat->name ?: strtoupper($this->borrower->name),
            'nic_no' => $this->personalNetWorthStat->nic_no ?: $this->borrower->national_id_cnic,
            'father_name' => $this->personalNetWorthStat->father_name ?: $this->borrower->parent_spouse_name,
            'ntn_no' => $this->personalNetWorthStat->ntn_no ?: $this->borrower->ntn,
            'business_address' => $this->personalNetWorthStat->business_address ?: ($this->borrower->applicant_business?->address ?? $this->borrower->employment_information?->official_address ?? ''),
            'tel_office' => $this->personalNetWorthStat->tel_office ?: ($this->borrower->applicant_business?->landline ?? $this->borrower->employment_information?->office_phone_number ?? ''),
            'res_address' => $this->personalNetWorthStat->res_address ?: $this->borrower->permanent_address,
            'tel_res' => $this->personalNetWorthStat->tel_res ?: $this->borrower->residence_phone_number,
            'qualification' => $this->borrower->education_qualification,
            'education' => $this->borrower->education_qualification,
            'profession' => $this->personalNetWorthStat->profession,
        ];
    }

    public function render()
    {
        return view('livewire.personal-net-worth-stat-form');
    }

    public function edit()
    {
        $this->editing = true;
        $this->initializeEditableData();
    }

    public function save()
    {
        $validatedData = $this->validate();

        try {
            if (!$this->personalNetWorthStat->exists) {
                $this->personalNetWorthStat->borrower_id = $this->borrower->id;
            }

            $this->personalNetWorthStat->fill($validatedData['editableData']);
            $saved = $this->personalNetWorthStat->save();

            if ($saved) {
                $this->editing = false;
                $this->dispatch('personalNetWorthStatSaved');
                $message = $this->personalNetWorthStat->wasRecentlyCreated
                    ? 'Personal Net Worth Statement created successfully.'
                    : 'Personal Net Worth Statement updated successfully.';
                session()->flash('message', $message);
            } else {
                session()->flash('error', 'Failed to save Personal Net Worth Statement.');
            }

            Log::info('PersonalNetWorthStat save attempt', [
                'success' => $saved,
                'data' => $this->personalNetWorthStat->toArray()
            ]);
        } catch (\Exception $e) {
            Log::error('Error saving PersonalNetWorthStat', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            session()->flash('error', 'An error occurred while saving: ' . $e->getMessage());
        }
    }
}