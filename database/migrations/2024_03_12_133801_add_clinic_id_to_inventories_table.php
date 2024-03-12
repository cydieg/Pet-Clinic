<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClinicIdToInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventories', function (Blueprint $table) {
            // Add the foreign key column
            $table->unsignedBigInteger('clinic_id');

            // Add foreign key constraint
            $table->foreign('clinic_id')
                  ->references('id')
                  ->on('clinics')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventories', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['clinic_id']);

            // Drop the foreign key column
            $table->dropColumn('clinic_id');
        });
    }
}
