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
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('name')->nullable();
            $table->string('father_husband')->nullable();
            $table->string('national_id')->nullable(); // National ID or equivalent
            $table->string('ntn')->nullable(); // National ID or equivalent
            $table->date('date_of_birth')->nullable();
            $table->string('present_address')->nullable(); // Address
            $table->string('permanent_address')->nullable(); // Address
            $table->string('phone_number')->nullable(); // Contact phone number
            $table->string('phone_number_two')->nullable(); // Contact phone number
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('designation')->nullable();
            $table->string('relationship_to_borrower')->nullable(); // Relationship to the borrower
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references');
    }
};
