<?php

namespace Database\Seeders;

use App\Models\Checklist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loan_sub_category = [
            ['loan_sub_category_id' => 1, 'sequence_no' => 1, 'name' => 'BFU Documents', 'status' => 'active'],
        ];

        foreach($loan_sub_category as $lsc){
            Checklist::create($lsc);
        }
    }
}
