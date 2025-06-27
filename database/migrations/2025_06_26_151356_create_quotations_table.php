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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_id')->unique(); 
            $table->string('cust_name');
            $table->string('cust_phone');
            $table->string('cust_email');
            $table->string('communication_method'); 
            $table->date('target_wedding_date');
            $table->string('budget_range'); 
            $table->integer('guest_count');
            $table->boolean('package_deal')->default(false);
            $table->boolean('catering')->default(false);
            $table->boolean('hair_makeup')->default(false);
            $table->boolean('live_band')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
