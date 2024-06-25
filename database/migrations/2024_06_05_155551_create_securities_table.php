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
            $table->decimal('value_of_gold_ornaments_value',14,2)->nullable(); // primary or secondary
            $table->decimal('gross_weight_of_gold',14,3)->nullable();
            $table->integer('gold_bag_seal_no')->nullable();

            $table->decimal('market_value',14,2)->nullable();
            $table->decimal('forced_sales_value_fsv',14,2)->nullable();
            $table->string('ownership')->nullable();
            $table->string('lien_ac_no')->nullable();
            $table->string('lien_title')->nullable();
            $table->string('lien_bank_branch')->nullable();
            $table->string('lien_amount')->nullable();
            $table->string('pledge_tdr_ssc_dsc_cert_no')->nullable();
            $table->date('pledge_date_of_issuance')->nullable();
            $table->string('pledge_issuing_office')->nullable();
            $table->string('pledge_amount')->nullable();
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
