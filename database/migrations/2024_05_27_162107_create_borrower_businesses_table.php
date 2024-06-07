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
        Schema::create('borrower_businesses', function (Blueprint $table) {
            $table->id(); // Primary key for the borrower businesses table
            $table->foreignId('borrower_id')->constrained('borrowers')->onDelete('cascade'); // Foreign key to borrowers table
            $table->string('name')->nullable(); // Business name
            $table->string('type')->nullable(); // Business type
            $table->date('start_date')->nullable(); // Commencement date
            $table->date('acquisition_date')->nullable(); // Takeover date
            $table->integer('experience_years')->nullable(); // Years of experience
            $table->string('address')->nullable(); // Business address
            $table->string('designation')->nullable(); // if a person apply for a car loan on behalf of business
            $table->integer('number_of_employees')->nullable(); // Number of employees
            $table->string('tax_number')->nullable(); // National Tax Number (NTN)
            $table->string('landline')->nullable(); // Landline number
            $table->string('mobile')->nullable(); // Mobile number
            $table->decimal('initial_investment', 10, 2)->nullable(); // Initial investment
            $table->string('investment_source')->nullable(); // Investment source
            $table->enum('premises_status', ['owned', 'rented', 'leased'])->nullable(); // Premises status
            $table->decimal('monthly_rent', 10, 2)->nullable(); // Monthly rent
            $table->decimal('security_deposit', 10, 2)->nullable(); // Security deposit
            $table->string('bank_accounts')->nullable(); // Bank accounts
            $table->decimal('average_monthly_balance', 10, 2)->nullable(); // Avg monthly balance
            $table->date('account_opening_date')->nullable(); // Account opening date
            $table->decimal('average_balance_six_months', 10, 2)->nullable(); // Avg balance last six months
            $table->string('account_number')->nullable(); // Account number
            $table->string('bank_name')->nullable(); // Bank name
            $table->decimal('net_worth', 10, 2)->nullable(); // Business net worth
            $table->string('business_plan')->nullable(); // Business plan
            $table->string('business_type')->nullable(); // Entity type
            $table->string('new_venture')->nullable(); // New business venture
            $table->decimal('total_investment_needed', 10, 2)->nullable(); // Total investment needed
            $table->decimal('self_financed_amount', 10, 2)->nullable(); // Self-financing amount
            $table->decimal('monthly_revenue', 10, 2)->nullable(); // Monthly revenue
            $table->decimal('monthly_expenses', 10, 2)->nullable(); // Monthly expenses
            $table->decimal('net_monthly_income', 10, 2)->nullable(); // Net monthly income
            $table->enum('status', ['active', 'inactive'])->nullable(); // Business status
            $table->text('product_description')->nullable(); // Product description

            // Additional columns for detailed loan and business information
            $table->integer('credit_score')->nullable(); // Credit score
            $table->decimal('loan_amount', 10, 2)->nullable(); // Loan amount
            $table->decimal('loan_interest_rate', 5, 2)->nullable(); // Loan interest rate
            $table->integer('loan_term')->nullable(); // Loan term in months or years
            $table->date('loan_start_date')->nullable(); // Loan start date
            $table->date('loan_end_date')->nullable(); // Loan end date
            $table->string('collateral_description')->nullable(); // Collateral description
            $table->decimal('collateral_value', 10, 2)->nullable(); // Collateral value
            $table->decimal('annual_revenue', 10, 2)->nullable(); // Annual revenue
            $table->decimal('annual_expenses', 10, 2)->nullable(); // Annual expenses
            $table->decimal('net_annual_income', 10, 2)->nullable(); // Net annual income
            $table->string('alternate_contact_name')->nullable(); // Alternate contact name
            $table->string('alternate_contact_phone')->nullable(); // Alternate contact phone

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrower_businesses');
    }
};
