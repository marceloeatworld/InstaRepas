<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\MealCombination;
use App\Models\CombinationFood;
use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function generate(Request $request)
    {
        $restrictions = $request->input('restrictions', []);
        $seasonal = $request->input('seasonal', false);
        $include_snacks = $request->input('include_snacks', false);
        $days = max(1, min($request->input('days', 1), 60));
        $currentMonth = Carbon::now()->month;
        $currentSeason = null;
    
        $foods = Food::query();
    
        // Filter foods based on restrictions
        foreach ($restrictions as $restriction) {
            $foods->whereDoesntHave('restrictions', function ($query) use ($restriction) {
                $query->where('name', $restriction);
            });
        }
    
        // Filter foods based on seasons
        if ($seasonal) {
            $currentSeason = Season::getSeasonByMonth($currentMonth);
            if ($currentSeason) {
                $foods->where(function ($query) use ($currentSeason) {
                    $query->whereHas('seasons', function ($query) use ($currentSeason) {
                        $query->where('seasons.id', $currentSeason->id);
                    })->orWhereDoesntHave('seasons');
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
            $breakfasts[] = $this->generateBreakfast($foods);
            $lunches[] = $this->generateLunchOrDinner($foods);
            $dinners[] = $this->generateLunchOrDinner($foods);

            if ($include_snacks) {
                $snacks[] = $this->generateSnack($foods);
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

    private function generateBreakfast($foods)
    {
        $breakfastCombination = MealCombination::where('meal_type', 'Breakfast')->first();
        $breakfastFoods = CombinationFood::where('combination_id', $breakfastCombination->id)->get();

        if (!$breakfastCombination) {
            return abort(500, 'There are no breakfast combinations available that match your criteria.');
        }

        $breakfastFoods = $breakfastCombination->foods()->whereIn('foods.id', $foods->pluck('id'))->get();

        return [
            'protein' => $breakfastFoods->where('category.name', 'Dairy')->random(),
            'carbohydrate' => $breakfastFoods->where('category.name', 'Bread')->where('nutritional_type', 'carbohydrates')->random(),
            'fruit' => $breakfastFoods->where('category.name', 'Fruits')->random(),
        ];
    }

    private function generateLunchOrDinner($foods)
    {
        $lunchOrDinnerCombination = MealCombination::where('meal_type', 'other_meals')->inRandomOrder()->first();
        $lunchOrDinnerFoods = CombinationFood::where('combination_id', $lunchOrDinnerCombination->id)->get();
        $lunchOrDinnerFoods = $lunchOrDinnerCombination->foods()->whereIn('foods.id', $foods->pluck('id'))->get();
    
        return [
            'protein' => $lunchOrDinnerFoods->whereIn('category.name', ['Meat', 'Fish', 'Eggs'])->random(),
            'carbohydrate' => $lunchOrDinnerFoods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')->random(),
            'vegetable' => $lunchOrDinnerFoods->where('category.name', 'Vegetables')->random(),
            'lipid' => $lunchOrDinnerFoods->where('category.name', 'Oils')->random(),
        ];
    }
    

    private function generateSnack($foods)
    {
        $snackCombination = MealCombination::where('meal_type', 'snack')->inRandomOrder()->first();
        $snackFoods = CombinationFood::where('combination_id', $snackCombination->id)->get();
        $snackFoods = $snackCombination->foods->whereIn('id', $foods->pluck('id'));

        return [
            'snack' => $snackFoods->whereIn('category.name', ['Fruits', 'Nuts'])->random(),
        ];
    }
}

