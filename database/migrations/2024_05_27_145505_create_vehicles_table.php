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
            $table->foreignId('requested_loan_amount_id')->constrained(); // Foreign key to requested loan amounts table
            $table->enum('vehicle_type', ['New', 'Used'])->nullable(); // Vehicle type
            $table->string('model_year')->nullable(); // Model year
            $table->string('year_of_manufacturing')->nullable(); // Model year
            $table->string('make')->nullable(); // Vehicle make
            $table->string('model')->nullable(); // Vehicle model
            $table->decimal('cost_of_vehicle')->nullable(); // Vehicle cost
            $table->decimal('equity_dawn_payment')->nullable(); // Vehicle model
            $table->decimal('financial_institute_contribution')->nullable();
            $table->string('name_authorized_dealer_seller')->nullable();
            $table->string('repayment')->nullable();
            $table->string('tenure')->nullable();
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
