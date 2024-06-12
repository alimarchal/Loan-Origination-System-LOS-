<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // For Salary Loan
            $table->foreignId('user_id')->constrained();
            $table->unsignedInteger('authorizer_id')->nullable();
            $table->foreignId('region_id')->nullable()->constrained();
            $table->foreignId('branch_id')->nullable()->constrained();
            $table->string('borrower_type')->nullable();
            $table->timestamp('date_registered')->useCurrent();
            $table->foreignId('loan_category_id')->nullable()->constrained();
            $table->foreignId('loan_sub_category_id')->nullable()->constrained();
            // Personal information
            $table->string('name')->nullable(); // Borrower name
            $table->string('relationship_status')->nullable(); // Relationship status (optional)
            $table->string('parent_spouse_name')->nullable(); // Parent/spouse name (optional)
            $table->string('gender')->nullable(); // Gender (optional)
            $table->string('national_id_cnic')->nullable(); // National ID/CNIC (optional)
            $table->string('parent_spouse_national_id_cnic')->nullable(); // National ID/CNIC (optional)
            $table->string('number_of_dependents')->nullable(); // Number of dependents (optional)
            $table->string('education_qualification')->nullable(); // Education qualification (optional)
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            // Contact information
            $table->string('residence_phone_number')->nullable(); // Residence phone number (optional)
            $table->string('office_phone_number')->nullable(); // Office phone number (optional)
            $table->string('mobile_number')->nullable(); // Mobile number (optional)
            $table->string('present_address')->nullable(); // Present address (optional)
            $table->string('permanent_address')->nullable(); // Permanent address (optional)
            // Employment information
            $table->string('occupation_title')->nullable(); // Occupation title (optional)
            $table->date('date_of_birth')->nullable(); // Date of birth (optional)
            $table->string('age')->nullable(); // Age (optional)
            // Additional personal information
            $table->string('marital_status')->nullable(); // Marital status (optional)
            $table->string('home_ownership_status')->nullable(); // Home ownership status (optional)
            $table->string('nationality')->nullable(); // Nationality (optional)
            $table->string('next_of_kin_name')->nullable(); // Next of kin name (optional)
            $table->string('next_of_kin_mobile_number')->nullable(); // Next of kin mobile number (optional)

            $table->string('nadra_verification_for_signature')->nullable();
            $table->date('signature_date')->nullable();
            $table->string('nadra_verification_scanned_attachment')->nullable();
            $table->string('digital_signature_scanned_attachment')->nullable();

            $table->softDeletes();
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
