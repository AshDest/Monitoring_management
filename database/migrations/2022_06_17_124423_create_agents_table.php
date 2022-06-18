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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('noms');
            $table->enum('sexe', ['M', 'F']);
            $table->enum('etatcivil', ['Marie', 'Celibataire']);
            $table->string('adresse');
            $table->integer('codeStructure')->index();
            $table->foreign('codeStructure')->references('id')->on('structure');
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
        Schema::dropIfExists('agents');
    }
};
