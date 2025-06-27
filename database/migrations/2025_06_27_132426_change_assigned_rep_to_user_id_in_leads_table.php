<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAssignedRepToUserIdInLeadsTable extends Migration
{
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            // Make sure foreign key doesn't already exist to avoid conflicts
            $table->dropForeign(['assigned_rep']);

            // Make the column nullable
            $table->unsignedBigInteger('assigned_rep')->nullable()->change();

            // Re-add foreign key with SET NULL on delete
            $table->foreign('assigned_rep')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropForeign(['assigned_rep']);
            $table->unsignedBigInteger('assigned_rep')->nullable(false)->change();
        });
    }
}

