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
        Schema::create('borrower_employment_information', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('borrower_id')->constrained()->nullable(); // Foreign key to borrowers table
            $table->string('job_title')->nullable(); // Job title (optional)
            $table->string('employment_status')->nullable(); // Employment status (optional)
            $table->string('employer_name')->nullable(); // Employer name (optional)
            $table->decimal('monthly_gross_salary', 10, 2)->nullable(); // Monthly gross salary (optional)
            $table->decimal('monthly_net_salary', 10, 2)->nullable(); // Monthly net salary (optional)
            $table->string('service_length')->nullable(); // Total length of service in years/months (optional)
            $table->decimal('remaining_service_years', 10, 2)->nullable(); // Years remaining until retirement (optional)
            $table->string('department')->nullable(); // Department (optional)
            $table->string('official_address')->nullable(); // Official address (optional)
            $table->string('legal_status')->nullable(); // Legal status (optional)
            $table->string('office_mobile_number')->nullable(); // Office mobile number (optional)
            $table->string('office_phone_number')->nullable(); // Office phone number (optional)
            $table->string('personal_number')->nullable(); // Personal number (optional)
            $table->string('grade')->nullable(); // Grade (optional)
            $table->string('service_status')->nullable(); // Service status (optional)
            $table->string('mode_of_salary_receipt')->nullable(); // Mode of salary receipt (optional)
            $table->string('salary_disbursement_office_name')->nullable(); // Name of the office where the salary is disbursed (optional)
            $table->string('contact_person_for_disbursement')->nullable(); // Contact person for salary disbursement (optional)
            $table->string('terminal_benefits')->nullable(); // Expected terminal benefits upon retirement (optional)
            $table->string('other_benefits')->nullable(); // Any other benefits received apart from the salary (optional)
            $table->string('other_sources_of_income')->nullable(); // Any other sources of income (optional)
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrower_employment_information');
    }
};
