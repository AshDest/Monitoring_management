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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->string('codeVente');
            $table->dateTime('dateVente');
            $table->double('montantTotal');
            $table->unsignedBigInteger('codeClient');
            $table->foreign('codeClient')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_structure');
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
        Schema::dropIfExists('ventes');
    }
};
