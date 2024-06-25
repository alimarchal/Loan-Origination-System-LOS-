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
            ['name' => 'CEO', 'status' => 'Relationship'],
            ['name' => 'Director', 'status' => 'Relationship'],
            ['name' => 'Partner', 'status' => 'Relationship'],
            ['name' => 'Managing Partner', 'status' => 'Relationship'],
            ['name' => 'Male', 'status' => 'Gender'],
            ['name' => 'Female', 'status' => 'Gender'],
            ['name' => 'Company', 'status' => 'Gender'],

            ['name' => 'Government', 'status' => 'Employer Legal Status'],
            ['name' => 'Semi Government', 'status' => 'Employer Legal Status'],
            ['name' => 'Autonomous', 'status' => 'Employer Legal Status'],
            ['name' => 'Private', 'status' => 'Employer Legal Status'],
            ['name' => 'Others', 'status' => 'Employer Legal Status'],

            ['name' => 'Government', 'status' => 'Occupation Title'],
            ['name' => 'Semi Government', 'status' => 'Occupation Title'],
            ['name' => 'Autonomous Body', 'status' => 'Occupation Title'],
            ['name' => 'Business Men', 'status' => 'Occupation Title'],
            ['name' => 'Self Employed', 'status' => 'Occupation Title'],
            ['name' => 'Professional', 'status' => 'Occupation Title'],

            ['name' => 'Permanent', 'status' => 'Employment Status'],
            ['name' => 'Contractual (Private)', 'status' => 'Employment Status'],
            ['name' => 'On Deputation (Private)', 'status' => 'Employment Status'],

            ['name' => 'Regular', 'status' => 'Service Status'],
            ['name' => 'None', 'status' => 'Service Status'],
            ['name' => 'Single', 'status' => 'Marital Status'],
            ['name' => 'Married', 'status' => 'Marital Status'],
            ['name' => 'Widow', 'status' => 'Marital Status'],
            ['name' => 'Divorced', 'status' => 'Marital Status'],
            ['name' => 'None/Company', 'status' => 'Marital Status'],
            ['name' => 'Self Owned', 'status' => 'Home Status'],
            ['name' => 'Wife House', 'status' => 'Home Status'],
            ['name' => 'Husband House', 'status' => 'Home Status'],
            ['name' => 'Parent House', 'status' => 'Home Status'],
            ['name' => 'Rented', 'status' => 'Home Status'],
            ['name' => 'None/Company', 'status' => 'Home Status'],
            ['name' => 'Direct', 'status' => 'Salary Mode'],
            ['name' => 'Bank Transfer', 'status' => 'Salary Mode'],
            ['name' => 'Cash', 'status' => 'Salary Mode'],
            ['name' => 'Cheque', 'status' => 'Salary Mode'],
            ['name' => 'Via DDO', 'status' => 'Salary Mode'],
            ['name' => 'Consolidated cheque issued by DDO', 'status' => 'Salary Mode'],
            ['name' => 'Other', 'status' => 'Salary Mode'],
            ['name' => 'Fresh', 'status' => 'Status Request'],
            ['name' => 'Enhancement', 'status' => 'Status Request'],
            ['name' => 'Renewal', 'status' => 'Status Request'],
            ['name' => 'Reduction', 'status' => 'Status Request'],
            ['name' => 'Primary Security', 'status' => 'Security Type'],
            ['name' => 'Secondary Security', 'status' => 'Security Type'],
            ['name' => 'Industrial', 'status' => 'Business Nature'],
            ['name' => 'Commercial', 'status' => 'Business Nature'],
            ['name' => 'Agricultural', 'status' => 'Business Nature'],
            ['name' => 'Services', 'status' => 'Business Nature'],
            ['name' => 'Any Other', 'status' => 'Business Nature'],
            ['name' => 'Salaried Person', 'status' => 'Business Nature'],
            ['name' => '12 Months', 'status' => 'Loan Tenure'],
            ['name' => '24 Months', 'status' => 'Loan Tenure'],
            ['name' => '36 Months', 'status' => 'Loan Tenure'],
            ['name' => '48 Months', 'status' => 'Loan Tenure'],
            ['name' => '60 Months', 'status' => 'Loan Tenure'],
            ['name' => 'Pakistan', 'status' => 'Country'],
            ['name' => 'PKR', 'status' => 'Currency'],
            ['name' => 'Company', 'status' => 'Business Type'],
            ['name' => 'Sole Proprietorship', 'status' => 'Business Type'],
            ['name' => 'Partnership', 'status' => 'Business Type'],

            ['name' => 'CEO', 'status' => 'Business Designation'],
            ['name' => 'Director', 'status' => 'Business Designation'],
            ['name' => 'Managing Partner', 'status' => 'Business Designation'],
            ['name' => 'Partner', 'status' => 'Business Designation'],
//            ['name' => 'Individual', 'status' => 'Business Type'],
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
            ['name' => 'Profile Picture', 'status' => 'Document'],
            ['name' => 'Yes', 'status' => 'Nadra Verification'],
            ['name' => 'No', 'status' => 'Nadra Verification'],
            ['name' => 'Secondary School Certificate / Matriculation / O - level', 'status' => 'Education Qualification'],
            ['name' => 'Higher Secondary School Certificate / Intermediate/ A - level', 'status' => 'Education Qualification'],
            ['name' => 'Bachelor (14 Years) Degree', 'status' => 'Education Qualification'],
            ['name' => 'Bachelor (16 Years) Degree', 'status' => 'Education Qualification'],
            ['name' => 'Master (16 Years) Degree', 'status' => 'Education Qualification'],
            ['name' => 'Master/ MS (18 Years) Degree', 'status' => 'Education Qualification'],
            ['name' => 'M-Phil (18 Years) Degree', 'status' => 'Education Qualification'],
            ['name' => 'Doctorate Degree', 'status' => 'Education Qualification'],
            ['name' => 'MS leading to PhD', 'status' => 'Education Qualification'],
            ['name' => 'Post Doctorate', 'status' => 'Education Qualification'],
            ['name' => 'PGD', 'status' => 'Education Qualification'],
            ['name' => 'None/Company', 'status' => 'Education Qualification'],
            ['name' => 'Monthly', 'status' => 'Repayment Frequency'],
            ['name' => 'Quarterly', 'status' => 'Repayment Frequency'],
            ['name' => 'Bi-Annually', 'status' => 'Repayment Frequency'],
            ['name' => 'Annually', 'status' => 'Repayment Frequency'],
            ['name' => 'Principal', 'status' => 'Repayment Frequency'],
            ['name' => 'Lumpsum', 'status' => 'Repayment Frequency'],
            ['name' => 'Markup Quarterly', 'status' => 'Repayment Frequency'],
            ['name' => 'New', 'status' => 'Vehicle Type'],
            ['name' => 'Used', 'status' => 'Vehicle Type'],

        ];

        foreach ($statues as $status) {
            Status::create($status);
        }
    }
}
