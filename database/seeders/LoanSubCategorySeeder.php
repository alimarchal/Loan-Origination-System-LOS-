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
            ['loan_category_id' => 1, 'name' => 'Advance Salary', 'status' => 'active'], // 1
            ['loan_category_id' => 1, 'name' => 'Gold Loan', 'status' => 'active'], // 2
            ['loan_category_id' => 1, 'name' => 'Car Finance', 'status' => 'active'], // 3
            ['loan_category_id' => 1, 'name' => 'Housing Finance', 'status' => 'active'], // 4
            ['loan_category_id' => 1, 'name' => 'Motor Cycle Finance', 'status' => 'active'], // 5
            ['loan_category_id' => 1, 'name' => 'Home Appliance Finance', 'status' => 'active'], // 6
            ['loan_category_id' => 1, 'name' => 'Personal Loan', 'status' => 'active'], // 7
            ['loan_category_id' => 2, 'name' => 'Demand Finance', 'status' => 'active'], // 8
            ['loan_category_id' => 2, 'name' => 'Health Care Finance', 'status' => 'active'], // 9
            ['loan_category_id' => 2, 'name' => 'Running Finance', 'status' => 'active'], // 10
            ['loan_category_id' => 2, 'name' => 'Tourism Promotion Finance', 'status' => 'active'], // 11
            ['loan_category_id' => 2, 'name' => 'Small Business Trade Finance', 'status' => 'active'], // 12
            ['loan_category_id' => 2, 'name' => 'House Finance Commerical', 'status' => 'active'], // 13
            ['loan_category_id' => 2, 'name' => 'Auto Finance Commerical', 'status' => 'active'], // 14
            ['loan_category_id' => 3, 'name' => 'Micro Enterprise', 'status' => 'active'], // 15
            ['loan_category_id' => 3, 'name' => 'Desi Murghbani', 'status' => 'active'], // 16
            ['loan_category_id' => 3, 'name' => 'Women Development', 'status' => 'active'], // 17
            ['loan_category_id' => 4, 'name' => 'Agri.Production Loan', 'status' => 'active'], // 18
            ['loan_category_id' => 4, 'name' => 'Agri.Development Loan', 'status' => 'active'], // 19

        ];

        foreach($loan_sub_category as $lsc){
            LoanSubCategory::create($lsc);
        }


    }
}
