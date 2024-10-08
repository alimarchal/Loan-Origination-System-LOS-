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
        Schema::create('borrower_existing_limit_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->enum('is_authorize',['Yes','No'])->default('No');
            $table->foreignId('authorizer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('type',['Funded','Non Funded'])->nullable(); // funded or non funded
            $table->decimal('amount')->nullable();
            $table->decimal('expiry_date')->nullable();
            $table->string('regular')->nullable();
            $table->decimal('amount_overdue_if_any')->nullable();
            $table->decimal('amount_rescheduled_restructured_if_any')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrower_existing_limit_statuses');
    }
};
