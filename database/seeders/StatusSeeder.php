<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $statues = [
            ['name' => 'S/O', 'status' => 'Relationship'],
            ['name' => 'W/O', 'status' => 'Relationship'],
            ['name' => 'D/O', 'status' => 'Relationship'],
            ['name' => 'Male', 'status' => 'Gender'],
            ['name' => 'Female', 'status' => 'Gender'],
            ['name' => 'Other', 'status' => 'Gender'],
            ['name' => 'Government', 'status' => 'Employer Legal Status'],
            ['name' => 'Semi Government', 'status' => 'Employer Legal Status'],
            ['name' => 'Autonomous', 'status' => 'Employer Legal Status'],
            ['name' => 'Permanent', 'status' => 'Employment Status'],
            ['name' => 'Contractual', 'status' => 'Employment Status'],
            ['name' => 'On Deputation', 'status' => 'Employment Status'],
            ['name' => 'Single', 'status' => 'Marital Status'],
            ['name' => 'Married', 'status' => 'Marital Status'],
            ['name' => 'Widow', 'status' => 'Marital Status'],
            ['name' => 'Divorced', 'status' => 'Marital Status'],
            ['name' => 'Self Owned', 'status' => 'Home Status'],
            ['name' => 'Wife House', 'status' => 'Home Status'],
            ['name' => 'Husband House', 'status' => 'Home Status'],
            ['name' => 'Parent House', 'status' => 'Home Status'],
            ['name' => 'Rented', 'status' => 'Home Status'],
            ['name' => 'Direct', 'status' => 'Salary Mode'],
            ['name' => 'Bank Transfer', 'status' => 'Salary Mode'],
            ['name' => 'Cash', 'status' => 'Salary Mode'],
            ['name' => 'Cheque', 'status' => 'Salary Mode'],
            ['name' => 'Via DDO', 'status' => 'Salary Mode'],
            ['name' => 'Consolidated cheque issued by DDO', 'status' => 'Salary Mode'],
            ['name' => 'Other', 'status' => 'Salary Mode'],
            ['name' => 'Fresh', 'status' => 'Status Request'],
            ['name' => 'Enhancement', 'status' => 'Status Request'],
            ['name' => 'Primary Security', 'status' => 'Security Type'],
            ['name' => 'Secondary Security', 'status' => 'Security Type'],
            ['name' => 'Industrial', 'status' => 'Business Nature'],
            ['name' => 'Commercial', 'status' => 'Business Nature'],
            ['name' => 'Agricultural', 'status' => 'Business Nature'],
            ['name' => 'Services', 'status' => 'Business Nature'],
            ['name' => 'Any Other', 'status' => 'Business Nature'],
            ['name' => '12 Months', 'status' => 'Loan Tenure'],
            ['name' => '24 Months', 'status' => 'Loan Tenure'],
            ['name' => '36 Months', 'status' => 'Loan Tenure'],
            ['name' => '48 Months', 'status' => 'Loan Tenure'],
            ['name' => '60 Months', 'status' => 'Loan Tenure'],
            ['name' => 'Pakistan', 'status' => 'Country'],
            ['name' => 'PKR', 'status' => 'Currency'],
            ['name' => 'Sole Proprietorship', 'status' => 'Business Type'],
            ['name' => 'Partnership', 'status' => 'Business Type'],
            ['name' => 'Joint-stock Company', 'status' => 'Business Type'],
            ['name' => 'Individual', 'status' => 'Business Type'],
            ['name' => 'New', 'status' => 'Vehicle Type'],
            ['name' => 'Used', 'status' => 'Vehicle Type'],
            ['name' => 'Individual', 'status' => 'Guarantor Type'],
            ['name' => 'Business', 'status' => 'Guarantor Type'],
            ['name' => 'Mr.', 'status' => 'Title'],
            ['name' => 'Ms.', 'status' => 'Title'],
            ['name' => 'Mrs.', 'status' => 'Title'],
            ['name' => 'Miss.', 'status' => 'Title'],
            ['name' => 'Loan', 'status' => 'Facility Type'],
            ['name' => 'Credit', 'status' => 'Facility Type'],
            ['name' => 'Mortgage', 'status' => 'Facility Type'],
            ['name' => 'Lease', 'status' => 'Facility Type'],
            ['name' => 'Other', 'status' => 'Facility Type'],
            ['name' => 'Active', 'status' => 'Finance Facility Status'],
            ['name' => 'Closed', 'status' => 'Finance Facility Status'],
            ['name' => 'Defaulted', 'status' => 'Finance Facility Status'],
            ['name' => 'Latest salary slip, stamped and signed by DDO ', 'status' => 'Document'],
            ['name' => 'Copy of CNIC Front Side', 'status' => 'Document'],
            ['name' => 'Copy of CNIC Back Side ', 'status' => 'Document'],
            ['name' => 'Guarantee Letter', 'status' => 'Document'],
            ['name' => 'Undertaking from DDO', 'status' => 'Document'],
        ];

        foreach ($statues as $status) {
            Status::create($status);
        }
    }
}
