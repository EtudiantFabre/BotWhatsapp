<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propositions', function (Blueprint $table) {
            $table->bigIncrements('num_proposition');
            $table->date('date_proposition');
            $table->bigInteger('num_culture');
            $table->bigInteger('num_agronomme');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('num_culture')->references('num_culture')->on('cultures')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('num_agronomme')->references('num_agronomme')->on('agronommes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propositions');
    }
}
