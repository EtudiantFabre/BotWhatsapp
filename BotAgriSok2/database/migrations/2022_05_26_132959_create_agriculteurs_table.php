<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgriculteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculteurs', function (Blueprint $table) {
            $table->bigIncrements('num_agriculteur');
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->bigInteger('num_personne');
            $table->foreign('num_personne')->references('num_personne')->on('personnes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agriculteurs');
    }
}
