<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('g_l_accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('structure_id')->nullable();
            $table->foreign('structure_id')->references('id')->on('structures')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('g_l_accounts', function (Blueprint $table) {
            $table->dropColumn('structure_id');
        });
    }
};