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
        Schema::create('foods_restrictions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('food_id');
            $table->unsignedInteger('restriction_id');
        
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('restriction_id')->references('id')->on('dietary_restrictions')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods_restrictions');
    }
};
