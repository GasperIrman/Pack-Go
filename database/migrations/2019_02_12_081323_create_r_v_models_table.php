<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRVModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_v_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('horse_power');
            $table->timestamp('year');
            $table->integer('affordability_rating');
            $table->integer('luxury');
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
        Schema::dropIfExists('r_v_models');
    }
}
