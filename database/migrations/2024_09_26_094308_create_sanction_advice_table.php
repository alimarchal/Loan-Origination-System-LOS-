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
        Schema::create('sanction_advice', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->foreignId('user_create_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('user_update_id')->nullable()->constrained('users')->nullOnDelete();

            // Fields directly related to the sanction advice
            $table->date('date_of_report')->nullable(); // Date of Report
            $table->string('type_of_finance')->nullable();
            $table->string('sgl_code')->nullable();
            $table->string('nature_of_finance')->nullable();
            $table->string('purpose_of_finance')->nullable();
            $table->decimal('take_home_salary', 14, 2)->nullable();
            $table->string('dsr_required')->nullable();
            $table->string('dsr_actual')->nullable();
            $table->string('requested_amount_status')->nullable();
            $table->decimal('amount_of_finance_limit', 14, 2)->nullable();
            $table->string('previous_outstanding')->nullable();
            $table->decimal('enhancement_amount', 14, 2)->nullable();
            $table->string('enhancement')->nullable();
            $table->decimal('total_amount', 14, 2)->nullable();
            $table->text('tenure')->nullable();
            $table->text('repayment_history')->nullable();
            $table->text('rate_of_markup')->nullable();
            $table->decimal('monthly_installment',14,2)->nullable();
            $table->text('repayment_schedule_monthly_installment')->nullable();
            $table->text('insurance_treatment')->nullable();
            $table->text('life_insurance_sgl')->nullable();
            $table->text('recovery_mode_of_installment')->nullable();
            $table->decimal('security_primary_amount',14,2)->nullable();
            $table->text('security_primary')->nullable();
            $table->text('security_secondary')->nullable();

            // Personal Guarantee(s) extended by Borrower / Guarantor
            $table->text('borrower_pgs_no_issued')->nullable();
            $table->text('borrower_rp_status')->nullable();
            $table->text('guarantor_pgs_no_issued')->nullable();
            $table->text('guarantor_rp_status')->nullable();

            // Documents Required Before Disbursement
            $table->text('documents_required_before_disbursement')->nullable();
            $table->text('general_terms_of_service')->nullable();
            $table->text('other_special_terms_of_service')->nullable();
            $table->text('note')->nullable();
            $table->enum('is_lock',['Yes','No'])->default('No');
            $table->enum('status',['Draft','Finalized'])->default('Draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanction_advice');
    }
};