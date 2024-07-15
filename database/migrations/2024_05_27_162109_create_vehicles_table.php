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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->foreignId('requested_loan_amount_id')->constrained();
            $table->enum('vehicle_type', ['New', 'Used'])->nullable(); // Vehicle type
            $table->string('model_year')->nullable(); // Model year
            $table->string('year_of_manufacturing')->nullable(); // Model year
            $table->decimal('cost_of_vehicle')->nullable(); // Vehicle cost
            $table->string('make')->nullable(); // Vehicle make
            $table->string('model')->nullable(); // Vehicle model
            $table->decimal('price_of_vehicle')->nullable(); // Vehicle model
            $table->decimal('equity_dawn_payment')->nullable(); // Vehicle model
            $table->decimal('down_payment_percentage',14,2)->nullable(); // Vehicle model
            $table->decimal('finance_amount',14,2)->nullable();
            $table->string('name_authorized_dealer_seller')->nullable();
            $table->string('repayment_mode')->nullable(); // monthly quarterly, etc
            $table->string('tenure_in_years')->nullable();
            $table->string('tenure_in_month')->nullable();
            $table->string('markup_rate_type')->nullable(); // fixed, kobor
            // rest fields remaining
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
