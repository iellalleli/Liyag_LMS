<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('combined_leads', function (Blueprint $table) {
            $table->id();

            // Quotation fields
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

            // Lead fields
            $table->enum('stage', [
                'Not Started',
                'Contacted',
                'Booked',
                'In Planning',
                'Event Completed'
            ])->default('Not Started');
            $table->unsignedBigInteger('assigned_rep')->nullable();
            $table->date('wedding_date')->nullable();
            $table->enum('lead_source', [
                'Website',
                'Personal Contact',
                'Facebook',
                'Instagram'
            ])->nullable();

            $table->timestamps();

            // Foreign key to users
            $table->foreign('assigned_rep')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combined_leads');
    }
};
