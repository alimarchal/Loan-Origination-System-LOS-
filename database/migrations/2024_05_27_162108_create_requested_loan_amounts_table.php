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
        Schema::create('requested_loan_amounts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignUuid('borrower_id')->constrained();
            $table->foreignId('user_id')->constrained(); // Foreign key to users table
            $table->foreignId('loan_category_id')->constrained(); // Foreign key to loan categories table
            $table->foreignId('loan_sub_category_id')->constrained(); // Foreign key to loan sub-categories table

            $table->date('request_date')->useCurrent(); // Date the loan was requested
            $table->decimal('requested_amount', 10, 2)->nullable(); // Requested loan amount
            $table->decimal('margin_on_gold_limit', 10, 2)->nullable(); // required for gold actual not less than 20

            $table->string('currency')->nullable(); // Currency of the loan
            $table->string('loan_purpose')->nullable(); // Purpose of the loan
//            $table->enum('loan_type', ['Personal', 'Business', 'Other'])->nullable(); // Type of loan
            $table->enum('status', ['Fresh', 'Enhancement', 'Renewal', 'Reduction'])->nullable(); // Loan status
            $table->string('tenure_in_years')->nullable(); // Loan tenure in years
            $table->string('tenure_in_months')->nullable(); // Loan tenure in months
            // salary bar to 12 to 48 months
            $table->enum('repayment_frequency', ['Monthly', 'Quarterly', 'Bi-Annually','Annually','Principal','Lumpsum','Markup Quarterly'])->nullable(); // Repayment frequency
            $table->string('salary_account_no')->nullable(); // Loan tenure in months
            $table->string('salary_account_branch_name')->nullable();
            $table->string('salary_account_bank_name')->nullable();

            $table->string('account_with_bajk')->nullable();
            $table->string('account_with_other_banks')->nullable();
            $table->string('markup_rate_type')->nullable(); // fixed, kobor
            $table->string('is_insured')->nullable(); // always yes

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_loan_amounts');
    }
};
