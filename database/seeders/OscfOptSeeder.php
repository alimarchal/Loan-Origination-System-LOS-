<?php

namespace Database\Seeders;

use App\Models\ObligorScoreCardFactorOpt;
use App\Models\OscfOpt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OscfOptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $osfo = [
            ['obligor_score_card_factor_id' => '1', 'options' => 'Age 18 Years - 10 Years', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '1', 'options' => '18 Years - 40 Years', 'score_available' => '5'],
            ['obligor_score_card_factor_id' => '1', 'options' => '41 Years - 50 Years', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '1', 'options' => '51 Years - 55 Years', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '1', 'options' => 'Above 55 Years', 'score_available' => '2'],
            ['obligor_score_card_factor_id' => '2', 'options' => 'Post Graduate: Masters & Above', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '2', 'options' => 'Graduate', 'score_available' => '5'],
            ['obligor_score_card_factor_id' => '2', 'options' => 'Intermediate', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '2', 'options' => 'SSC level', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '2', 'options' => 'Below Metric & Upto Middle', 'score_available' => '2'],
            ['obligor_score_card_factor_id' => '2', 'options' => 'Illiterate', 'score_available' => '1'],
            ['obligor_score_card_factor_id' => '3', 'options' => 'Salaried (Permanent Employee of AJK Govt)', 'score_available' => '7'],
            ['obligor_score_card_factor_id' => '3', 'options' => 'Salaried Employee (Autonomous bodies/semi govt.)', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '4', 'options' => '16 and above', 'score_available' => '7'],
            ['obligor_score_card_factor_id' => '4', 'options' => '11 to 15', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '4', 'options' => '5 to 10', 'score_available' => '5'],
            ['obligor_score_card_factor_id' => '4', 'options' => 'Below 5 grade', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '5', 'options' => 'More than Rs. 100,000/- per month', 'score_available' => '7'],
            ['obligor_score_card_factor_id' => '5', 'options' => '71,000 -- 100,000/- per month', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '5', 'options' => '51,000 -- 70,000/- per month', 'score_available' => '5'],
            ['obligor_score_card_factor_id' => '5', 'options' => '31,000 -- 50,000/- per month', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '5', 'options' => '20,000 -- 10,000/- per month', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '6', 'options' => 'More than 15 Years', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '6', 'options' => '11 Years -- 15 Years', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '6', 'options' => '06 Years -- 10 Years', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '6', 'options' => '03 Years -- 05 Years', 'score_available' => '2'],
            ['obligor_score_card_factor_id' => '7', 'options' => 'More than 10 Years', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '7', 'options' => '06 Years -- 10 Years', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '7', 'options' => '03 Years -- 05 Years', 'score_available' => '2'],
            ['obligor_score_card_factor_id' => '7', 'options' => 'Less than 01 Years', 'score_available' => '1'],
            ['obligor_score_card_factor_id' => '7', 'options' => 'No land line Number', 'score_available' => '0'],
            ['obligor_score_card_factor_id' => '8', 'options' => 'Owned', 'score_available' => '7'],
            ['obligor_score_card_factor_id' => '8', 'options' => 'Company Provided', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '8', 'options' => 'Rental', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '8', 'options' => 'Other', 'score_available' => '2'],
            ['obligor_score_card_factor_id' => '9', 'options' => 'Completely Verifiable', 'score_available' => '5'],
            ['obligor_score_card_factor_id' => '9', 'options' => 'Partially Verifiable', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '10', 'options' => 'Timely Payment', 'score_available' => '5'],
            ['obligor_score_card_factor_id' => '10', 'options' => 'Late Payment 01 time arrears', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '10', 'options' => 'Late Payment 02 time arrears', 'score_available' => '3'],
            ['obligor_score_card_factor_id' => '10', 'options' => 'Late Payment 04 time arrears', 'score_available' => '2'],
            ['obligor_score_card_factor_id' => '10', 'options' => 'More than 04 time arrears', 'score_available' => '0'],
            ['obligor_score_card_factor_id' => '11', 'options' => 'Multiple source of Income', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '11', 'options' => 'Salary / Rentals /any other verifiable', 'score_available' => '5'],
            ['obligor_score_card_factor_id' => '11', 'options' => 'Salary', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '12', 'options' => 'No overdue', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '12', 'options' => '10 Days (Days Past Due)', 'score_available' => '0'],
            ['obligor_score_card_factor_id' => '12', 'options' => '60 Days (Days Past Due)', 'score_available' => '-6'],
            ['obligor_score_card_factor_id' => '13', 'options' => 'No loan outstanding', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '13', 'options' => '01-02 loan outstanding', 'score_available' => '1'],
            ['obligor_score_card_factor_id' => '14', 'options' => 'Salary directly transfers in his/her account with BAJK', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '14', 'options' => 'Salary transfers through BAJK account with other bank', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '15', 'options' => '> 1 -- 3 Years', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '15', 'options' => '> 3 -- 5 Years', 'score_available' => '5'],
            ['obligor_score_card_factor_id' => '16', 'options' => '> 10% to 40%', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '16', 'options' => '> 41% to 50%', 'score_available' => '4'],
            ['obligor_score_card_factor_id' => '17', 'options' => 'Not a routine practice of transfer to other department / stations', 'score_available' => '6'],
            ['obligor_score_card_factor_id' => '17', 'options' => 'Routinely transfer to other department/stations', 'score_available' => '0'],
        ];

        foreach($osfo as $lsc){
            OscfOpt::create($lsc);
        }
    }
}
