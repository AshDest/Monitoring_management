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
        Schema::create('compte__banques', function (Blueprint $table) {
            $table->id();
            $table->string('numeroCompte')->unique();
            $table->foreign('codeBanque')->references('id')->on('banques');
            $table->string('designation');
            $table->string('agence');
            $table->double('solde');
            $table->foreign('codeStructure')->references('id')->on('structures');
            $table->string('GLCompteBanque');
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
        Schema::dropIfExists('compte__banques');
    }
};
