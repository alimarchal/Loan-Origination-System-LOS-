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
        Schema::create('pnws_assigned_guarantees_sureties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_net_worth_statement_id')->constrained();
            $table->string('bank_institution')->nullable();
            $table->decimal('amount',14,2)->default(0);
            $table->date('expiry_date')->nullable();
            $table->string('nature_of_guarantee_surety')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnws_assigned_guarantees_sureties');
    }
};
