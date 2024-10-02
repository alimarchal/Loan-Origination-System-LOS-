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

            // Fields directly related to the sanction advice
            $table->date('dor')->nullable(); // Date of Report
            $table->string('TypeOfFinance')->nullable();
            $table->string(column: 'SglCode')->nullable();
            $table->string('NatureOfFinance')->nullable();
            $table->string('PurposeOfFinance')->nullable();
            $table->decimal('TakeHomeSalary', 14, 2)->nullable();
            $table->string('DSR_Required')->nullable();
            $table->string('DSR_Actual')->nullable();
            $table->string('RequestedAmountStatus')->nullable();
            $table->decimal('AmountOfFinanceLimit', 14, 2)->nullable();
            $table->string('PreviousOutstanding')->nullable();
            $table->decimal('EnhancementAmount', 14, 2)->nullable();
            $table->string('Enhancement')->nullable();
            $table->decimal('TotalAmount', 14, 2)->nullable();
            $table->string('Tenure')->nullable();
            $table->text('RepaymentHistory')->nullable();
            $table->text('RateofMarkup')->nullable();
            $table->text('RepaymentScheduleMonthlyInstallment')->nullable();
            $table->text('InsuranceTreatment')->nullable();
            $table->text('LifeInsuranceSGL')->nullable();
            $table->text('RecoveryModeOfInstallment')->nullable();
            $table->text('SecurityPrimary')->nullable();
            $table->text('SecuritySecondary')->nullable();

            // Personal Guarantee (s) extended by Borrower / Guarantor
            $table->text('BorrowerPGsNoIssued')->nullable();
            $table->text('BorrowerRPStatus')->nullable();
            $table->text('GuarantorPGsNoIssued')->nullable();
            $table->text('GuarantorRPStatus')->nullable();

            // DOCUMENTS REQUIRED BEFORE DISBURSEMENT
            $table->text('DocReqBefDis')->nullable();
            $table->text('GeneralTos')->nullable();
            $table->text('Note')->nullable();

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