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
            $table->foreignUuid('borrower_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->enum('is_authorize',['Yes','No'])->default('No');
            $table->foreignId('authorizer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name')->nullable(); // Business name
            $table->string('type')->nullable(); // Business type
            $table->string('address')->nullable(); // Business address
            $table->string('landline')->nullable(); // Landline number
            $table->string('mobile')->nullable(); // Mobile number
            $table->string('designation')->nullable(); // if a person apply for a car loan on behalf of business
            $table->decimal('monthly_revenue', 10, 2)->nullable(); // Monthly revenue
            $table->decimal('monthly_expenses', 10, 2)->nullable(); // Monthly expenses
            $table->decimal('net_monthly_income', 10, 2)->nullable(); // Net monthly income
            $table->date('start_date')->nullable(); // Commencement date
            $table->date('acquisition_date')->nullable(); // Takeover date
            $table->integer('experience_years')->nullable(); // Exp Years
            $table->integer('number_of_employees')->nullable(); // Number of employees
            $table->string('tax_number')->nullable(); // National Tax Number (NTN)
            $table->decimal('initial_investment', 10, 2)->nullable(); // Initial investment
            $table->string('investment_source')->nullable(); // Investment source
            $table->enum('premises_status', ['owned', 'rented', 'leased'])->nullable(); // Premises status
            $table->decimal('monthly_rent', 10, 2)->nullable(); // Monthly rent
            $table->decimal('average_monthly_balance', 10, 2)->nullable(); // Avg monthly balance
            $table->date('account_opening_date')->nullable(); // Account opening date
            $table->decimal('average_balance_six_months', 10, 2)->nullable(); // Avg balance last six months
            $table->string('account_no')->nullable(); // Account number
            $table->string('bank_name')->nullable(); // Bank name
            $table->decimal('net_worth', 10, 2)->nullable(); // Business net worth
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
