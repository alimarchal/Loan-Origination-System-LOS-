<?php

namespace Database\Seeders;

use App\Models\LoanCategory;
use App\Models\LoanSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loan_sub_category = [
            ['loan_category_id' => 1, 'name' => 'Advance Salary', 'status' => 'active'],
            ['loan_category_id' => 1, 'name' => 'Gold Loan', 'status' => 'active'],
        ];

        foreach($loan_sub_category as $lsc){
            LoanSubCategory::create($lsc);
        }

    }
}
