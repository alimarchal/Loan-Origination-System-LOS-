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
        Schema::create('oscf_opts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obligor_score_card_factor_id')->nullable()->constrained();
            $table->string('options')->nullable();
            $table->string('score_available')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oscf_opts');
    }
};
