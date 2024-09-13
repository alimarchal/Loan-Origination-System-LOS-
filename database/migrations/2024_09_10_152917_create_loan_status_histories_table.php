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
        Schema::create('loan_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submit_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('submit_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignUuid('borrower_id')->constrained();

            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('placement')->nullable();
            $table->string('employee_no')->nullable();

            $table->text('description')->nullable();
            $table->foreignId('loan_status_id')->nullable()->constrained();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_status_histories');
    }
};
