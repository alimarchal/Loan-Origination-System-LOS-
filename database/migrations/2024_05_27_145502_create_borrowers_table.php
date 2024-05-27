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
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers');
    }
};
