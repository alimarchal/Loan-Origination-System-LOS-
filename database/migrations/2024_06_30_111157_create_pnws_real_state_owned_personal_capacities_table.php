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
        Schema::create('pnws_real_state_owned_personal_capacities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_net_worth_statement_id')->constrained();
            $table->string('particulars')->nullable();
            $table->string('in_name_of')->nullable();
            $table->string('self_acquired_family_property')->nullable();
            $table->string('encumber_d_to_asterisk')->nullable();
            $table->decimal('market_value',14,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnws_real_state_owned_personal_capacities');
    }
};
