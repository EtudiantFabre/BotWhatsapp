<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgronommesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agronommes', function (Blueprint $table) {
            $table->bigIncrements('num_agronomme');
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('niveau_etude');
            $table->bigInteger('num_personne');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('num_personne')->references('num_personne')->on('personnes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agronommes');
    }
}
