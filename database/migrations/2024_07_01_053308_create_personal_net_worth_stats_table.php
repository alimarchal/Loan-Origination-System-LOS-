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
        Schema::create('personal_net_worth_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('borrower_id')->constrained();
            $table->string('name')->nullable();
            $table->string('nic_no')->nullable();
            $table->string('father_name')->nullable();
            $table->string('ntn_no')->nullable();
            $table->string('business_address')->nullable();
            $table->string('tel_office')->nullable();
            $table->string('res_address')->nullable();
            $table->string('tel_res')->nullable();
            $table->string('qualification')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->unsignedInteger('personal_net_worth_forma_id')->nullable()->constrained();
            $table->unsignedInteger('personal_net_worth_formb_id')->nullable()->constrained();
            $table->unsignedInteger('personal_net_worth_formc_id')->nullable()->constrained();
            $table->unsignedInteger('personal_net_worth_formd_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_net_worth_stats');
    }
};
