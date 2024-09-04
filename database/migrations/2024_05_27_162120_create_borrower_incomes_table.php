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
        Schema::create('borrower_incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->enum('is_authorize',['Yes','No'])->default('No');
            $table->foreignId('authorizer_id')->nullable()->constrained('users')->nullOnDelete();
            // Salary details
            $table->decimal('monthly_salary', 10, 2)->nullable(); // Monthly take-home salary
            $table->string('salary_receipt_mode')->nullable(); // Mode of salary receipt
            $table->string('salary_account_number')->nullable(); // Salary account number
            $table->string('salary_bank_name')->nullable(); // Salary bank name
            $table->string('salary_bank_branch_name')->nullable(); // Salary bank branch name

            // Service details
            $table->string('service_length')->nullable(); // Total length of service in years/months
            $table->integer('remaining_service_year')->nullable(); // Years remaining until retirement

            // Benefits and savings
            $table->decimal('family_personal_saving', 10, 2)->nullable(); // Total family or personal savings
            $table->string('terminal_benefits')->nullable(); // Expected terminal benefits upon retirement
            $table->string('other_benefits')->nullable(); // Any other benefits received apart from the salary

            // Other income
            $table->string('other_source_of_income')->nullable(); // Any other sources of income

            // Salary disbursement details
            $table->string('salary_disbursement_office_name')->nullable(); // Name of the office where the salary is disbursed
            $table->string('contact_disbursement')->nullable(); // Contact person for salary disbursement


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrower_incomes');
    }
};
