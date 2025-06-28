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
        Schema::table('combined_leads', function (Blueprint $table) {
            // Drop the unique index first
            $table->dropUnique(['quotation_id']);
            // Drop the column itself
            $table->dropColumn('quotation_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('combined_leads', function (Blueprint $table) {
            // Re-add the column if you rollback
            $table->string('quotation_id')->unique()->nullable();
        });
    }
};
