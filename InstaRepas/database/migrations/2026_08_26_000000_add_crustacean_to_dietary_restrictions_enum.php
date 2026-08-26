<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Production already contains the contains_crustacean restriction; this
     * aligns the schema so fresh installs and tests accept it too.
     */
    public function up(): void
    {
        Schema::table('dietary_restrictions', function (Blueprint $table) {
            $table->enum('name', [
                'contains_meat',
                'contains_pork',
                'contains_gluten',
                'contains_animal_products',
                'contains_lactose',
                'contains_fish',
                'contains_crustacean',
            ])->change();
        });
    }

    public function down(): void
    {
        Schema::table('dietary_restrictions', function (Blueprint $table) {
            $table->enum('name', [
                'contains_meat',
                'contains_pork',
                'contains_gluten',
                'contains_animal_products',
                'contains_lactose',
                'contains_fish',
            ])->change();
        });
    }
};
