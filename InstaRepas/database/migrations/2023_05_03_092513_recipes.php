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
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('preparation_steps')->nullable();
            $table->integer('preparation_time')->nullable();
            $table->integer('cooking_time')->nullable();
            $table->integer('servings')->nullable();
            $table->unsignedInteger('recipe_category_id');
            $table->dateTime('creation_date');
            $table->string('image_url')->nullable();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('recipe_category_id')->references('id')->on('recipe_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
