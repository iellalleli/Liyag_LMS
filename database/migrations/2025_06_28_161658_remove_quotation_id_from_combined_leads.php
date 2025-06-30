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
            if (Schema::hasColumn('combined_leads', 'quotation_id')) {
                $table->dropColumn('quotation_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('combined_leads', function (Blueprint $table) {
            $table->unsignedBigInteger('quotation_id')->nullable()->unique(); // or drop `unique()` if unnecessary
        });
    }
};
