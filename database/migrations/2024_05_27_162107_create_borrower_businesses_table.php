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
            $table->foreignId('borrower_id')->constrained('borrowers')->onDelete('cascade'); // Foreign key linked to borrowers table with cascade on delete
            $table->string('business_company_name')->nullable(); // Official name of the business
            $table->string('business_nature')->nullable(); // Nature or type of business
            $table->date('business_commencement_date')->nullable(); // Date the business commenced operations
            $table->date('business_takeover_date')->nullable(); // Date the business was taken over, if applicable
            $table->integer('business_experience')->nullable(); // Years of experience in the business
            $table->string('business_address')->nullable(); // Physical address of the business
            $table->integer('no_of_employees')->nullable(); // Number of employees in the business
            $table->string('national_tax_ntn')->nullable(); // National Tax Number (NTN)
            $table->string('landline_no')->nullable(); // Landline number of the business
            $table->string('cell_no')->nullable(); // Mobile number associated with the business
            $table->decimal('initial_investment', 10, 2)->nullable(); // Initial investment made in the business
            $table->string('initial_investment_fund_source')->nullable(); // Source of funds for the initial investment
            $table->enum('business_place_status', ['owned', 'rented', 'leased'])->nullable(); // Status of the business premises
            $table->decimal('monthly_rent', 10, 2)->nullable(); // Monthly rent expense, if applicable
            $table->decimal('security_advance_rent_paid', 10, 2)->nullable(); // Security or advance rent paid
            $table->string('banks_name_and_branches')->nullable(); // Names and branches of banks where the business holds accounts
            $table->decimal('average_balance_per_month', 10, 2)->nullable(); // Average monthly balance in the business bank account
            $table->date('bajk_account_opening_date')->nullable(); // Date of opening the business account with BAJK
            $table->decimal('average_balance_last_6_month', 10, 2)->nullable(); // Average balance over the last six months
            $table->string('account_no')->nullable(); // Business bank account number
            $table->string('bank_name')->nullable(); // Name of the bank where the business account is held
            $table->decimal('business_total_net_worth', 10, 2)->nullable(); // Total net worth of the business
            $table->string('proposed_business')->nullable(); // Proposed business plan or project
            $table->enum('individual_proprietorship_status', ['proprietorship', 'partnership', 'limited_liability'])->nullable(); // Legal status of the business entity
            $table->string('new_business_name')->nullable(); // Name of any new business venture being considered
            $table->decimal('total_investment_required', 10, 2)->nullable(); // Total investment required for the business
            $table->decimal('self_financing_amount', 10, 2)->nullable(); // Amount of self-financing available

            $table->decimal('monthly_income', 10, 2)->nullable(); // Monthly income from the business
            $table->decimal('expenses', 10, 2)->nullable(); // Monthly expenses of the business
            $table->decimal('net_monthly_income', 10, 2)->nullable(); // Net monthly income after expenses
            $table->enum('business_status', ['active', 'inactive'])->nullable(); // Current status of the business

            $table->text('product_detail')->nullable(); // Detailed description of products offered by the business

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
