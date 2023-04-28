<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\MealCombination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MealController extends Controller
{
    private $restrictions = [];

    public function generate(Request $request)
    {
        $this->restrictions = $request->input('restrictions', []);
        $seasonal = $request->input('seasonal', false);
        $include_snacks = $request->input('include_snacks', false);
        $days = max(1, min($request->input('days', 1), 60));
        $currentMonth = Carbon::now()->month;
        $currentSeason = null;

        $foods = Food::query();

        // Filter foods based on restrictions
        foreach ($this->restrictions as $restriction) {
            $foods->whereDoesntHave('restrictions', function ($query) use ($restriction) {
                $query->where('name', $restriction);
            });
        }

        // Filter foods based on seasons
        if ($seasonal) {
            $currentSeason = Season::getSeasonByMonth($currentMonth);
            if ($currentSeason) {
                $foods->whereHas('seasons', function ($query) use ($currentSeason) {
                    $query->where('seasons.id', $currentSeason->id);
                });
            }
        }

        $foods = $foods->get();

        if ($foods->count() === 0) {
            return abort(500, 'There are no foods available that match your criteria.');
        }

        $breakfasts = [];
        $lunches = [];
        $dinners = [];
        $snacks = [];

        // Generate meals for the specified number of days
        for ($day = 0; $day < $days; $day++) {
            $breakfasts[] = $this->generateMeal('breakfast', $foods);
            $lunches[] = $this->generateMeal('other_meals', $foods);
            $dinners[] = $this->generateMeal('other_meals', $foods);

            if ($include_snacks) {
                $snacks[] = $this->generateMeal('snack', $foods);
            }
        }

        return view('meals', [
            'breakfasts' => $breakfasts,
            'lunches' => $lunches,
            'dinners' => $dinners,
            'snacks' => $snacks,
            'include_snacks' => $include_snacks,
            'current_date' => Carbon::now()->toFormattedDateString(),
            'current_season' => $currentSeason ? $currentSeason->season_name : 'Unknown',
        ]);
    }

    private function generateMeal($mealType, $foods)
    {
        $mealFoods = $foods->whereIn('meal_combinations.meal_type', [$mealType])->get();

        $result = [];

        if ($mealType === 'breakfast') {
            $result = $this->generateBreakfast($mealFoods);
        } elseif ($mealType === 'other_meals') {
            $result = $this->generateLunchOrDinner($mealFoods);
        } elseif ($mealType === 'snack') {
            $result = $this->generateSnack($mealFoods);
        }

        return $result;
    }

    private function generateBreakfast($foods)
    {
        $proteinFood = $foods->where('category.name', 'Dairy')->random();

        return [
            'protein' => $proteinFood,
            'carbohydrate' => $foods->where('category.name', 'Bread')->where('nutritional_type', 'carbohydrates')->random(),
            'fruit' => $foods->where('category.name', 'Fruits')->random(),
        ];
    }

    private function generateLunchOrDinner($foods)
    {
        $proteinCategory = in_array('contains_animal_products', $this->restrictions) ? 'Vegetables' : ['Meat', 'Fish', 'Eggs', 'Pork'];
        $proteinFood = $foods->whereIn('category.name', $proteinCategory)->count() > 0 ? $foods->whereIn('category.name', $proteinCategory)->random() : null;

        if (in_array('contains_animal_products', $this->restrictions)) {
            $carbohydrateFood = $foods->where('category.name', 'Vegetables')->where('nutritional_type', 'carbohydrates')->count() > 0 ? $foods->where('category.name', 'Vegetables')->where('nutritional_type', 'carbohydrates')->random() : null;
            $fiberFood = $foods->where('category.name', 'Vegetables')->where('nutritional_type', 'fibers')->count() > 0 ? $foods->where('category.name', 'Vegetables')->where('nutritional_type', 'fibers')->random() : null;
        } else {
            $carbohydrateFood = $foods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')->count() > 0 ? $foods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')->random() : null;
            $fiberFood = null;
        }

        return [
            'protein' => $proteinFood,
            'carbohydrate' => $carbohydrateFood,
            'fiber' => $fiberFood,
            'vegetable' => $foods->where('category.name', 'Vegetables')->count() > 0 ? $foods->where('category.name', 'Vegetables')->random() : null,
            'lipid' => $foods->where('category.name', 'Oils')->count() > 0 ? $foods->where('category.name', 'Oils')->random() : null,
        ];
    }

    private function generateSnack($foods)
    {
        $fruitFoods = $foods->where('category.name', 'Fruits');

        $fruit = $fruitFoods->count() > 0 ? $fruitFoods->random() : null;
        $otherSnack = $foods->where('category.name', '!=', 'Fruits')->count() > 0 ? $foods->where('category.name', '!=', 'Fruits')->random() : null;

        return [
            'fruit' => $fruit,
            'other_snack' => $otherSnack,
        ];
    }
}
