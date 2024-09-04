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
        Schema::create('basic_borrower_fact_sheet_consumers', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->enum('is_authorize',['Yes','No'])->default('No');
            $table->foreignId('authorizer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->unsignedInteger('reference_id_first');
            $table->unsignedInteger('reference_id_second');
            $table->string('nature_of_business');
            // existing_limits_and_status
            $table->string('fund_based_amount');
            $table->string('fund_based_expiry_date');
            $table->string('fund_based_status_regular');
            $table->string('fund_based_status_amount_overdue_if_any');
            $table->string('fund_based_status_amount_rescheduled_or_restructured_if_any');
            // existing_limits_and_status
            $table->string('non_fund_based_amount');
            $table->string('non_fund_based_expiry_date');
            $table->string('non_fund_based_status_regular');
            $table->string('non_fund_based_status_amount_overdue_if_any');
            $table->string('non_fund_based_status_amount_rescheduled_or_restructured_if_any');

            // requested_limits
            $table->string('requested_limit_fund_based_amount');
            $table->string('requested_limit_fund_based_tenure');
            $table->string('requested_limit_non_fund_based_amount');
            $table->string('requested_limit_non_fund_based_tenure');
            // details of payment schedule if term loan sought
            $table->string('detail_of_term_loan_sougnt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_borrower_fact_sheet_consumers');
    }
};
