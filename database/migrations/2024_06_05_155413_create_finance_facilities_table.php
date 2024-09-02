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
        Schema::create('finance_facilities', function (Blueprint $table) {
            $table->id(); // Primary key
            // Existing Financial Facilities FROM BAJK/OTHER BANKS
            $table->foreignUuid('borrower_id')->constrained();
            $table->string('institution_name'); // Name of the bank or financial institution
            $table->string('repayment_status'); // Name of the bank or financial institution
            $table->string('facility_type')->nullable(); // Type of finance facility
            $table->decimal('sanctioned_amount', 14, 2); // Amount of the facility availed
//            $table->decimal('loan_limit', 15, 2);
            $table->decimal('outstanding_amount', 15, 2);
            $table->decimal('monthly_installment', 15, 2);
            $table->decimal('interest_rate', 5, 2)->nullable(); // Interest rate of the facility
            $table->integer('term_months')->nullable(); // Term of the facility in months
            $table->date('start_date')->nullable(); // Start date of the facility
            $table->date('end_date')->nullable(); // End date of the facility
            $table->string('purpose_of_loan'); // Name of the bank or financial institution
            $table->text('remarks')->nullable(); // Additional remarks or notes
            $table->decimal('amount_rescheduled', 15, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_facilities');
    }
};
