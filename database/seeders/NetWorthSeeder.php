<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NetWorthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $liabilities = [
            'Borrowings from Banks / DFIs',
            'Borrowings from Individuals',
            'Borrowings from Department / Government for Govt. officials only',
            'Payables against Stocks / Inventory',
            'No. & Amount of Guarantees Executed, excluding this case'
        ];

        $assets = [
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

        foreach ($liabilities as $liability) {
            DB::table('liabilities')->insert([
                'description' => $liability,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach ($assets as $asset) {
            DB::table('assets')->insert([
                'description' => $asset,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
