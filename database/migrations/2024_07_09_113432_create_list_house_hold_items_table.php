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
        Schema::create('list_house_hold_items', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->enum('is_authorize',['Yes','No'])->default('No');
            $table->foreignId('authorizer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('description_of_items')->nullable();
            $table->decimal('quantity',14,2)->default(0);
            $table->decimal('market_value',14,2)->default(0);
            $table->decimal('amount',14,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_house_hold_items');
    }
};
