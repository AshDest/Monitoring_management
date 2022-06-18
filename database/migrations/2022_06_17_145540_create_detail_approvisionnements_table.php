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
        Schema::create('detail_approvisionnements', function (Blueprint $table) {
            $table->id();
            $table->foreign('idAppro')->references('id')->on('approvisionnements');
            $table->foreign('idArticle')->references('id')->on('articles');
            $table->integer('quantite');
            $table->double('prix_achat');
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
        Schema::dropIfExists('detail_approvisionnements');
    }
};
