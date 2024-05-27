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
        Schema::create('borrower_kin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrower_id')->constrained('borrowers')->onDelete('cascade'); // Foreign key linked to borrowers table with cascade on delete
            $table->string('next_of_kin')->nullable(); // Name of the borrower's next of kin
            $table->string('mobile_next_of_kin')->nullable(); // Mobile number of the borrower's next of kin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrower_kin');
    }
};
