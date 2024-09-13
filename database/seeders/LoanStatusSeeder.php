<?php

namespace Database\Seeders;

use App\Models\LoanStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //'Draft' ,'Returned With Observation','Submitted','In Process', 'Approved','Declined',
        $loan_status = [
            ['name' => 'Draft'],
            ['name' => 'Returned With Observation'],
            ['name' => 'Submitted'],
            ['name' => 'In Process'],
            ['name' => 'Approved'],
            ['name' => 'Declined'],
        ];

        foreach($loan_status as $ls){
            LoanStatus::create($ls);
        }
    }
}
