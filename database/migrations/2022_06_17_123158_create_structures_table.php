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
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->string('codeStructure')->unique();
            $table->string('designation');
            $table->foreign('adresse_id')->references('id')->on('quartier__villages');
            $table->string('avenu');
            $table->string('numParcelle');
            $table->string('long');
            $table->string('lat');
            $table->string('numTel1');
            $table->string('numTel2');
            $table->string('email');
            $table->string('siteWeb');
            $table->string('rccm');
            $table->string('idNational');
            $table->string('numImpot');
            $table->string('numCNSS');
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
        Schema::dropIfExists('structures');
    }
};
