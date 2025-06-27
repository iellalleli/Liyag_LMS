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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_id'); // Link to quotation
            $table->enum('stage', ['Not Started', 'Contacted', 'Booked', 'In Planning', 'Event Completed'])->default('Not Started');
            $table->unsignedBigInteger('assigned_rep')->nullable(); // sales rep (user_id)
            $table->date('wedding_date')->nullable();
            $table->enum('lead_source', ['Website', 'Personal Contact', 'Facebook', 'Instagram'])->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');
            $table->foreign('assigned_rep')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
