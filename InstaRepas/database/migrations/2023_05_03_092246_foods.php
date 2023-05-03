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
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('is_valid')->default(false);
            $table->enum('nutritional_type', [
                'proteins',
                'carbohydrates',
                'fibers',
                'fruits',
                'lipids',
            ]);
        
            $table->foreign('category_id')->references('id')->on('food_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
