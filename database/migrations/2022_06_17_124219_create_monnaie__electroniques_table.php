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
        Schema::create('monnaie__electroniques', function (Blueprint $table) {
            $table->id();
            $table->string('codeOperateur')->unique();
            $table->string('numTel');
            $table->double('soldeUSD');
            $table->double('soldeCDF');
            $table->foreign('codeStructure')->references('id')->on('structures');
            $table->string('GLMonnaieE');
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
        Schema::dropIfExists('monnaie__electroniques');
    }
};
