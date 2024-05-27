<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedInteger('authorizer_id')->nullable();
            $table->foreignId('loan_category_id')->nullable()->constrained();
            $table->foreignId('loan_sub_category_id')->nullable()->constrained();
            $table->string('full_name');
            $table->string('parent_spouse_name')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('national_id')->nullable(); // CNIC - National Identity Card
            $table->integer('dependents_count')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->enum('housing_status', ['owned', 'rented', 'mortgaged', 'living_with_parents'])->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('occupation')->nullable();
            $table->string('department')->nullable();
            $table->string('work_address')->nullable();
            $table->string('work_mobile')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('job_title')->nullable();
            $table->string('employee_id')->nullable(); // Unique identifier at the workplace
            $table->string('employment_type')->nullable(); // Such as full-time, part-time, contractor
            $table->decimal('gross_monthly_income', 10, 2)->nullable();
            $table->decimal('monthly_deductions', 10, 2)->nullable();
            $table->decimal('net_monthly_income', 10, 2)->nullable();

            $table->timestamps();
        });


//
//        Schema::create('borrower_businesses', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('borrower_id')->constrained('borrowers')->onDelete('cascade');
//            $table->string('business_company_name')->nullable();
//            $table->string('business_nature')->nullable();
//            $table->date('business_commencement_date')->nullable();
//            $table->date('business_takeover_date')->nullable();
//            $table->integer('business_experience')->nullable();
//            $table->string('business_address')->nullable();
//            $table->integer('no_of_employees')->nullable();
//            $table->string('national_tax_ntn')->nullable();
//            $table->string('landline_no')->nullable();
//            $table->string('cell_no')->nullable();
//            $table->decimal('initial_investment', 10, 2)->nullable();
//            $table->string('initial_investment_fund_source')->nullable();
//            $table->enum('business_place_status', ['owned', 'rented', 'leased'])->nullable();
//            $table->decimal('monthly_rent', 10, 2)->nullable();
//            $table->decimal('security_advance_rent_paid', 10, 2)->nullable();
//            $table->string('banks_name_and_branches')->nullable();
//            $table->decimal('average_balance_per_month', 10, 2)->nullable();
//            $table->date('bajk_account_opening_date')->nullable();
//            $table->decimal('average_balance_last_6_month', 10, 2)->nullable();
//            $table->string('account_no')->nullable();
//            $table->string('bank_name')->nullable();
//            $table->decimal('business_total_net_worth', 10, 2)->nullable();
//            $table->string('proposed_business')->nullable();
//            $table->enum('individual_proprietorship_status', ['proprietorship', 'partnership', 'limited_liability'])->nullable();
//            $table->string('new_business_name')->nullable();
//            $table->decimal('total_investment_required', 10, 2)->nullable();
//            $table->decimal('self_financing_amount', 10, 2)->nullable();
//
//            $table->decimal('monthly_income', 10, 2)->nullable();
//            $table->decimal('expenses', 10, 2)->nullable();
//            $table->decimal('net_monthly_income', 10, 2)->nullable();
//            $table->enum('business_status', ['active', 'inactive'])->nullable();
//
//            $table->text('product_detail')->nullable();
//
//
//
//
//
//
//
//            $table->timestamps();
//        });
//
//        Schema::create('borrower_incomes', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('borrower_id')->constrained('borrowers')->onDelete('cascade');
//            $table->decimal('carry_home_salary', 10, 2)->nullable();
//            $table->decimal('family_personal_saving', 10, 2)->nullable();
//            $table->string('service_length')->nullable();
//            $table->integer('remaining_service_year')->nullable();
//            $table->enum('salary_receipt_mode', ['bank_transfer', 'cash', 'cheque'])->nullable();
//            $table->string('salary_disbursement_office_name')->nullable();
//            $table->string('contact_disbursement')->nullable();
//            $table->string('terminal_benefits')->nullable();
//            $table->string('other_benefits')->nullable();
//            $table->string('other_source_of_income')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::create('borrower_kin', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('borrower_id')->constrained('borrowers')->onDelete('cascade');
//            $table->string('next_of_kin')->nullable();
//            $table->string('mobile_next_of_kin')->nullable();
//            $table->timestamps();
//        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers');
    }
};
