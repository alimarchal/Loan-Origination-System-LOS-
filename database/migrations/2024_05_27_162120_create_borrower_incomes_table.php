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
            $table->foreignId('borrower_id')->constrained('borrowers')->onDelete('cascade'); // Foreign key to borrowers table with cascade on delete
            $table->decimal('carry_home_salary', 10, 2)->nullable(); // Net salary that the borrower takes home
            $table->decimal('family_personal_saving', 10, 2)->nullable(); // Total family or personal savings
            $table->string('service_length')->nullable(); // Total length of service in years/months
            $table->integer('remaining_service_year')->nullable(); // Years remaining until retirement
            $table->enum('salary_receipt_mode', ['bank_transfer', 'cash', 'cheque'])->nullable(); // Mode of salary receipt
            $table->string('salary_disbursement_office_name')->nullable(); // Name of the office where the salary is disbursed
            $table->string('contact_disbursement')->nullable(); // Contact person for salary disbursement
            $table->string('terminal_benefits')->nullable(); // Expected terminal benefits upon retirement
            $table->string('other_benefits')->nullable(); // Any other benefits received apart from the salary
            $table->string('other_source_of_income')->nullable(); // Any other sources of income
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
