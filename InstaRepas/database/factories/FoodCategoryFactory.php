<?php

namespace Database\Factories;

use App\Models\FoodCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
