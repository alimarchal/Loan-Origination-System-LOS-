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
            $table->string('name')->nullable();
            $table->string('father_husband')->nullable();
            $table->string('address')->nullable();
            $table->string('OfficeAddress')->nullable();
            $table->string('occupation')->nullable();
            $table->string('contact')->nullable();
            $table->string('pp_no')->nullable();
            $table->string('cnic')->nullable();
            $table->date('dob')->nullable();
            $table->date('dor')->nullable();
            $table->string('TypeOfFinance')->nullable();
            $table->string('SglCode')->nullable();
            $table->string('NatureOfFinance')->nullable();
            $table->string('PurposeOfFinance')->nullable();
            $table->decimal('TakeHomeSalary',14,2)->nullable();
            $table->string('DSR_Required')->nullable();
            $table->string('DSR_Actual')->nullable();
            $table->string('RequestedAmountStatus')->nullable();
            $table->decimal('AmountOfFinanceLimit',14,2)->nullable();

            $table->string('Tenure')->nullable();
            $table->string('Purpose of the Finance')->nullable();

            $table->string('AmountOfFinanceLimit')->nullable();
            $table->string('AmountOfFinanceLimit')->nullable();
            $table->string('Enhancement')->nullable();
            $table->string('PreviousOutstanding')->nullable();
            $table->string('EnhancementAmount')->nullable();
            $table->string('TotalAmount')->nullable();
            $table->text('Repayment History')->nullable();
            $table->text('Rate of Markup')->nullable();
            $table->text('Repayment Schedule Monthly Installment')->nullable();
            $table->text('Insurance Treatment	')->nullable();
            $table->text('Life Insurance-SGL	')->nullable();
            $table->text('Recovery Mode of Installment')->nullable();
            $table->text('SecurityPrimary')->nullable();
            $table->text('SecuritySecondary')->nullable();
            // Personal Guarantee (s) extended by Borrower / Guarantor (if any):
            $table->text('BorrowerPGsNoIssued')->nullable();
            // Repayment Status
            $table->text('BorrowerRPStatus')->nullable();
            $table->text('BorrowerRPStatus')->nullable();
            $table->text('GuarantorPGsNoIssued')->nullable();
            $table->text('GuarantorRPStatus')->nullable();
            // DOCUMENTS REQUIRED BEFORE DISBURSEMENT:
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
