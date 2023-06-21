<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitsOfMeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units_of_measure')->insert([
            ['unit_name' => 'cuillère à café (càc)'],
            ['unit_name' => 'cuillère à soupe (càs)'],
            ['unit_name' => 'gramme (g)'],
            ['unit_name' => 'kilogramme (kg)'],
            ['unit_name' => 'litre (L)'],
            ['unit_name' => 'millilitre (mL)'],
            ['unit_name' => 'pincée'],
            ['unit_name' => 'tasse'],
            ['unit_name' => 'verre'],
        ]);
    }
}
