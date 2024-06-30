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
        Schema::create('personal_net_worth_statements', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->foreignId('pnws_real_state_owned_personal_capacity_id')->nullable()->constrained();
            $table->foreignId('pnws_moveable_assets_owned_id')->nullable()->constrained();
            $table->foreignId('pnws_liabilities_id')->nullable()->constrained();
            $table->foreignId('pnws_assigned_guarantees_sureties_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_net_worth_statements');
    }
};
