<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'category_id' => \App\Models\FoodCategory::factory(),
            'user_id' => \App\Models\User::factory(),
            'is_valid' => 1,
            'nutritional_type' => $this->faker->randomElement(['proteins', 'carbohydrates', 'fibers', 'fruits', 'lipids']),
        ];
    }
}
