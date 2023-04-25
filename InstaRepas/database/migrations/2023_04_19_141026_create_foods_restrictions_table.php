<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsRestrictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_restrictions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('restriction_id');

            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('restriction_id')->references('id')->on('dietary_restrictions')->onDelete('cascade');

            $table->index('food_id');
            $table->index('restriction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods_restrictions');
    }
}
