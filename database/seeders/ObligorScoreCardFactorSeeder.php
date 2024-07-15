<?php

namespace Database\Seeders;

use App\Models\ObligorScoreCardFactor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObligorScoreCardFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obsf = [
            ['factor' => 'Age of Customer'],
            ['factor' => 'Qualification of Customer'],
            ['factor' => 'Occupation of Customer'],
            ['factor' => 'Pay-scale'],
            ['factor' => 'Gross Income of Customer'],
            ['factor' => 'Job Duration (Length of existing continuous service)'],
            ['factor' => 'Residence Landline'],
            ['factor' => 'Residence Type'],
            ['factor' => 'Verifiable Income Status'],
            ['factor' => 'Utility Bills Repayment Behavior / History of 12 months'],
            ['factor' => 'Source of Income'],
            ['factor' => 'Repayment/overdue Status'],
            ['factor' => 'Number of loans outstanding'],
            ['factor' => 'Salary Routing arrangement'],
            ['factor' => 'Tenure of loan'],
            ['factor' => 'Monthly Debt Burden'],
            ['factor' => 'Departmental transfer/posting practices'],

        ];

        foreach($obsf as $lsc){
            ObligorScoreCardFactor::create($lsc);
        }

    }
}
