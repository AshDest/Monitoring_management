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
        Schema::create('g_l_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->double('balance')->default('0');
            $table->string('isAccount_system')->default('0');
            $table->unsignedBigInteger('account_type_id');
            $table->unsignedBigInteger('account_level_id');
            $table->string('currency_id')->nullable();
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_type_id')->references('id')->on('account_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('account_level_id')->references('id')->on('account_levels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('g_l_accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('g_l_accounts');
    }
};