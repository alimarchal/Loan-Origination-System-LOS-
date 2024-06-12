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
        Schema::create('securities', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->string('security_type')->nullable(); // primary or secondary
            $table->decimal('market_value',14,2)->nullable();
            $table->decimal('fsv',14,2)->nullable();
            $table->string('ownership')->nullable();
            $table->string('lien_ac_no')->nullable();
            $table->string('lien_title')->nullable();
            $table->string('lien_bank_branch')->nullable();
            $table->string('lien_amount')->nullable();
            $table->string('pledge_tdr_ssc_dsc_cert_no')->nullable();
            $table->date('pledge_date_of_issuance')->nullable();
            $table->string('pledge_issuing_office')->nullable();
            $table->string('pledge_amount')->nullable();
            $table->string('lease_reg_book_veh_obtained')->nullable();
            $table->string('lease_duplicate_keys_veh_obrained')->nullable();
            $table->date('lease_date_obtained')->nullable();
            $table->string('lease_reg_book_veh_received');
            $table->string('lease_duplicate_keys_veh_received')->nullable();
            $table->date('lease_date_receipt')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('securities');
    }
};
