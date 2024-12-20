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
            $table->foreignUuid('borrower_id')->constrained();
            $table->enum('is_authorize',['Yes','No'])->default('No');
            $table->foreignId('authorizer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('next_of_kin')->nullable(); // Name of the borrower's next of kin
            $table->string('mobile_next_of_kin')->nullable(); // Mobile number of the borrower's next of kin
            $table->string('relation_with_next_of_kin')->nullable(); // relation of borrower's with next of kin

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