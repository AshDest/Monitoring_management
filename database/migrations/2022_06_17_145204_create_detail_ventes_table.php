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
        Schema::create('detail_ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('idVente')->index();
            $table->foreign('idVente')->references('id')->on('ventes');
            $table->integer('quantite');
            $table->double('montant');
            $table->integer('idArticle')->index();
            $table->foreign('idArticle')->references('id')->on('articles');
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
        Schema::dropIfExists('detail_ventes');
    }
};
