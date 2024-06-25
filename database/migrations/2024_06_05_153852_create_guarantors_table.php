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
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->enum('guarantor_type', ['Individual', 'Business']); // Guarantor type (individual or business)
            // Common columns
            $table->string('title')->nullable();; // Guarantor's name (individual or business)
            $table->string('name')->nullable();; // Guarantor's name (individual or business)
            $table->string('father_husband')->nullable(); // Guarantor's name (individual or business)
            $table->string('national_id')->nullable(); // National ID or equivalent
            $table->string('phone_number')->nullable(); // Contact phone number
            $table->string('phone_number_two')->nullable(); // Contact phone number
            $table->string('email')->nullable(); // Contact email
            $table->string('present_address')->nullable(); // Address
            $table->string('permanent_address')->nullable(); // Address
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('employer_name')->nullable();
//            $table->string('reporting_to')->nullable();
            $table->string('employee_personal_number')->nullable();
            $table->string('employment_status')->nullable();
            $table->decimal('monthly_gross_salary', 10, 2)->nullable(); // Annual revenue
            $table->date('date_of_retirement')->nullable(); // Annual revenue

            // Individual-specific columns
            $table->string('relationship_to_borrower')->nullable(); // Relationship to the borrower
            $table->decimal('net_worth', 10, 2)->nullable(); // Net worth of the guarantor
            // Business-specific columns
            $table->string('business_registration_number')->nullable(); // Business registration number
            $table->decimal('annual_revenue', 10, 2)->nullable(); // Annual revenue
            $table->decimal('annual_expenses', 10, 2)->nullable(); // Annual expenses
            $table->decimal('net_annual_income', 10, 2)->nullable(); // Net annual income

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guarantors');
    }
};
