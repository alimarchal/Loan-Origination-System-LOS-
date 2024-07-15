<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\NetWorth;
use App\Models\Liability;
use App\Models\Asset;

class PersonalNetWorthCalculator extends Component
{
    public $netWorth;
    public $liabilities = [];
    public $assets = [];
    public $totalLiabilities = 0;
    public $totalAssets = 0;
    public $personalNetWorth = 0;
    public $borrowerId;

    protected $rules = [
        'liabilities.*.description' => 'required|string',
        'liabilities.*.value' => 'nullable|numeric',
        'assets.*.description' => 'required|string',
        'assets.*.value' => 'nullable|numeric',
    ];

    public function mount($borrowerId = null)
    {
        $this->borrowerId = $borrowerId ?? auth()->id();

        $this->netWorth = NetWorth::where('borrower_id', $this->borrowerId)->latest()->first();

        if ($this->netWorth) {
            $this->liabilities = $this->netWorth->liabilities->map(function ($liability) {
                return [
                    'id' => $liability->id,
                    'description' => $liability->description,
                    'value' => $liability->value,
                ];
            })->toArray();

            $this->assets = $this->netWorth->assets->map(function ($asset) {
                return [
                    'id' => $asset->id,
                    'description' => $asset->description,
                    'value' => $asset->value,
                ];
            })->toArray();
        }

        if (empty($this->liabilities)) {
            $this->initializeLiabilities();
        }
        if (empty($this->assets)) {
            $this->initializeAssets();
        }

        $this->calculate();
    }

    private function initializeLiabilities()
    {
        $defaultLiabilities = [
            'Borrowings from Banks / DFIs.',
            'Borrowings from Individuals',
            'Borrowings from Department / Government for Govt. officials only',
            'Payables against Stocks / Inventory',
            'No. & Amount of Guarantees Executed, excluding this case',
            'Miscellaneous Liabilities 1',
            'Miscellaneous Liabilities 2',
            'Miscellaneous Liabilities 3',
            'Miscellaneous Liabilities 4',
        ];

        foreach ($defaultLiabilities as $description) {
            $this->liabilities[] = ['description' => $description, 'value' => 0];
        }
    }

    private function initializeAssets()
    {
        $defaultAssets = [
            'Cash on Hand',
            'Bank Balance',
            'Value of house hold items',
            'Receivables',
            'Land / Buildings (self-owned / share in family property)',
            'Investments, if any in stocks, funds and DSCs etc,',
            'Vehicles',
            'General Provident Fund Balance',
            'Stocks in Trade & Furniture / Fittings'
        ];

        foreach ($defaultAssets as $description) {
            $this->assets[] = ['description' => $description, 'value' => 0];
        }
    }

    public function addLiability()
    {
        $this->liabilities[] = ['description' => '', 'value' => 0];
    }

    public function addAsset()
    {
        $this->assets[] = ['description' => '', 'value' => 0];
    }

    public function removeLiability($index)
    {
        unset($this->liabilities[$index]);
        $this->liabilities = array_values($this->liabilities);
        $this->calculate();
    }

    public function removeAsset($index)
    {
        unset($this->assets[$index]);
        $this->assets = array_values($this->assets);
        $this->calculate();
    }

    public function calculate()
    {
        $this->totalLiabilities = array_sum(array_column($this->liabilities, 'value'));
        $this->totalAssets = array_sum(array_column($this->assets, 'value'));
        $this->personalNetWorth = $this->totalAssets - $this->totalLiabilities;
    }

    public function save()
    {
        $this->validate();

        DB::transaction(function () {
            $netWorth = $this->netWorth ?? new NetWorth();
            $netWorth->borrower_id = $this->borrowerId;
            $netWorth->total_liabilities = $this->totalLiabilities;
            $netWorth->total_assets = $this->totalAssets;
            $netWorth->personal_net_worth = $this->personalNetWorth;
            $netWorth->date_calculated = now();
            $netWorth->save();

            // Update or create liabilities
            foreach ($this->liabilities as $liability) {
                $netWorth->liabilities()->updateOrCreate(
                    ['id' => $liability['id'] ?? null],
                    [
                        'borrower_id' => $this->borrowerId,
                        'description' => $liability['description'],
                        'value' => $liability['value'] ?? 0,
                    ]
                );
            }

            // Update or create assets
            foreach ($this->assets as $asset) {
                $netWorth->assets()->updateOrCreate(
                    ['id' => $asset['id'] ?? null],
                    [
                        'borrower_id' => $this->borrowerId,
                        'description' => $asset['description'],
                        'value' => $asset['value'] ?? 0,
                    ]
                );
            }

            // Remove any liabilities or assets that were deleted by the user
            $netWorth->liabilities()->whereNotIn('id', collect($this->liabilities)->pluck('id'))->delete();
            $netWorth->assets()->whereNotIn('id', collect($this->assets)->pluck('id'))->delete();

            $this->netWorth = $netWorth;
        });

        session()->flash('message', 'Net worth information saved successfully.');
    }

    public function updatedLiabilities()
    {
        $this->calculate();
    }

    public function updatedAssets()
    {
        $this->calculate();
    }

    public function render()
    {
        return view('livewire.personal-net-worth-calculator');
    }


}
