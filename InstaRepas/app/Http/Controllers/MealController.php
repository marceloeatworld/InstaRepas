<?php

namespace App\Http\Controllers;

use App\Models\Food;
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
        $days = $request->input('days', 1);

        $foods = Food::query();

        // Filter foods based on restrictions
        foreach ($restrictions as $restriction) {
            $foods->whereDoesntHave('restrictions', function ($query) use ($restriction) {
                $query->where('name', $restriction);
            });
        }

        // Filter foods based on seasons
        if ($seasonal) {
            $currentMonth = Carbon::now()->month;
            $currentSeason = Season::getSeasonByMonth($currentMonth);

            if ($currentSeason) {
                $foods->whereHas('seasons', function ($query) use ($currentSeason) {
                    $query->where('seasons.id', $currentSeason->id);

                });
            }
        }

        $foods = $foods->get();

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
        ]);
    }

    private function generateBreakfast($foods)
    {
        return [
            'protein' => $foods->where('category.name', 'Dairy')->random(),
            'carbohydrate' => $foods->where('category.name', 'Bread')->where('nutritional_type', 'carbohydrates')->random(),
            'fruit' => $foods->where('category.name', 'Fruits')->random(),
        ];
    }

    private function generateLunchOrDinner($foods)
    {
        return [
            'protein' => $foods->whereIn('category.name', ['Meat', 'Fish', 'Eggs'])->random(),
            'carbohydrate' => $foods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')->random(),
            'vegetable' => $foods->where('category.name', 'Vegetables')->random(),
            'lipid' => $foods->where('category.name', 'Oils')->random(),
        ];
    }

    private function generateSnack($foods)
    {
        return [
            'snack' => $foods->whereIn('category.name', ['Fruits', 'Nuts'])->random(),
        ];
    }
}
