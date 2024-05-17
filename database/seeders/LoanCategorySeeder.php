<?php

namespace Database\Seeders;

use App\Models\LoanCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loan_category = [
            ['name' => 'Consumer Finance', 'status' => 'active'], // Changed 'active' to a key-value pair
            ['name' => 'Commercial / SME Finance', 'status' => 'active'],
            ['name' => 'Micro Finance', 'status' => 'active'],
            ['name' => 'Agriculture Finance', 'status' => 'active'],
        ];

        foreach($loan_category as $lc){
            LoanCategory::create($lc);
        }

    }
}
