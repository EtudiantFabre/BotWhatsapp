<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelles', function (Blueprint $table) {
            $table->bigIncrements('num_parcelle');
            $table->string('nature');
            $table->bigInteger('surface');
            $table->json('localisation');
            $table->bigInteger('num_culture');
            $table->bigInteger('num_agriculteur');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('num_culture')->references('num_culture')->on('cultures')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('num_agriculteur')->references('num_agriculteur')->on('agriculteurs')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelles');
    }
}
