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
        Schema::create('recipes_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recipe_id'); // Change this line
            $table->unsignedInteger('food_id'); // Assuming that `foods.id` is also an unsigned integer
            $table->decimal('quantity', 10, 2)->nullable();
            $table->unsignedInteger('unit_of_measure_id')->nullable(); // Assuming that `units_of_measure.id` is also an unsigned integer

            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('unit_of_measure_id')->references('id')->on('units_of_measure')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes_foods');
    }
};
