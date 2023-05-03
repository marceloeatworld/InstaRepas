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
        Schema::create('dietary_restrictions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('name', [
                'contains_meat',
                'contains_pork',
                'contains_gluten',
                'contains_animal_products',
                'contains_lactose',
                'contains_fish',
            ])->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dietary_restrictions');
    }
};
