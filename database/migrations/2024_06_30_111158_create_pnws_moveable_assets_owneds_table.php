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
        Schema::create('pnws_moveable_assets_owneds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_net_worth_statement_id')->constrained();
            $table->string('particulars')->nullable();
            $table->string('description')->nullable();
            $table->decimal('current_value',14,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnws_moveable_assets_owneds');
    }
};
