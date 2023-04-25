<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombinationsFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combinations_foods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('combination_id')->index();
            $table->unsignedBigInteger('food_id')->index();

            $table->foreign('combination_id')->references('id')->on('meal_combinations')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combinations_foods');
    }
}
