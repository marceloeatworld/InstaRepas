<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('combinations_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('combination_id');
            $table->unsignedInteger('food_id');
        
            $table->foreign('combination_id')->references('id')->on('meal_combinations')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combinations_foods');
    }
};
