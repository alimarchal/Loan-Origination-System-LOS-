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
            $table->foreignId('borrower_id')->nullable()->constrained(); // Foreign key to borrowers table
            $table->foreignId('user_id')->constrained(); // Foreign key to users table
            $table->foreignId('loan_category_id')->nullable()->constrained(); // Foreign key to loan categories table
            $table->foreignId('loan_sub_category_id')->nullable()->constrained(); // Foreign key to loan sub-categories table
            $table->timestamp('request_date')->useCurrent(); // Date the loan was requested
            $table->decimal('requested_amount', 10, 2)->nullable(); // Requested loan amount
            $table->string('currency')->nullable(); // Currency of the loan
            $table->string('loan_purpose')->nullable(); // Purpose of the loan
            $table->enum('loan_type', ['Personal', 'Business', 'Other'])->nullable(); // Type of loan
            $table->enum('status', ['Fresh', 'Enhancement', 'Approved', 'Rejected', 'Pending'])->nullable(); // Loan status
            $table->string('tenure_in_months')->nullable(); // Loan tenure in months
            $table->enum('repayment_frequency', ['Monthly', 'Bi-Weekly', 'Weekly'])->nullable(); // Repayment frequency
            $table->decimal('repayment_amount', 10, 2)->nullable(); // Repayment amount

            // BBFS
            $table->string('requested_limits_fund_based_amount')->nullable();
            $table->string('requested_limits_non_fund_based_amount')->nullable();
            $table->string('requested_limits_fund_based_tenure')->nullable();
            $table->string('requested_limits_non_fund_based_tenure')->nullable();

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
