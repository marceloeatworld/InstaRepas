<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietaryRestrictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dietary_restrictions', function (Blueprint $table) {
            $table->id();
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dietary_restrictions');
    }
}
