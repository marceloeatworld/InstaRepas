<?php
namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCategory;
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
        $currentSeason = Season::whereHas('months', function ($query) use ($currentMonth) {
            $query->where('month', $currentMonth);
        })->first();
        if ($currentSeason) {
            $foods = $foods->filter(function ($food) use ($currentSeason) {
                return $food->seasons->contains('id', $currentSeason->id);
            });
        }
    }
    $foods = $foods->get();

    $meatCategoryId = FoodCategory::where('name', 'Meat')->first()->id;
    $grainsCategoryId = FoodCategory::where('name', 'Grains')->first()->id;
    $fruitsCategoryId = FoodCategory::where('name', 'Fruits')->first()->id;
    $vegetablesCategoryId = FoodCategory::where('name', 'Vegetables')->first()->id;
    $oilsCategoryId = FoodCategory::where('name', 'Oils')->first()->id;

    $breakfasts = [];
    $lunches = [];
    $dinners = [];
    $snacks = [];
    
        // Generate meals for the specified number of days
        for ($day = 0; $day < $days; $day++) {
            // Generate breakfast using available foods
$breakfast_protein = $foods->where('category_id', $meatCategoryId)
        ->reject(function ($food) {
            return $food->restrictions->where('name', 'contains_fish')->count() > 0
                || $food->restrictions->where('name', 'contains_meat')->count() > 0;
        })
        ->random();
    
            $breakfasts[] = [
                'protein' => $breakfast_protein,
                'carbohydrate' => $foods->where('category_id', FoodCategory::where('name', 'Grains')->first()->id)
                    ->where('nutritional_type', 'carbohydrates')
                    ->random(),
                'fruit' => $foods->where('category_id', FoodCategory::where('name', 'Fruits')->first()->id)->random(),
            ];
    
            // Generate lunch
            $lunch_protein = $foods->where('category_id', $meatCategoryId)
            ->reject(function ($food) {
                return $food->restrictions->where('name', 'contains_lactose')->count() > 0;
            })
            ->random();
    
    
            $lunches[] = [
                'protein' => $lunch_protein,
                'carbohydrate' => $foods->where('category_id', FoodCategory::where('name', 'Grains')->first()->id)
                    ->where('nutritional_type', 'carbohydrates')
                    ->random(),
                'vegetable' => $foods->where('category_id', FoodCategory::where('name', 'Vegetables')->first()->id)->random(),
                'lipid' => $foods->where('category_id', FoodCategory::where('name', 'Oils')->first()->id)->random(),
            ];
    
            if ($include_snacks) {
                            // Generate snacks using available foods
            for ($snack = 0; $snack < $days; $snack++) {
                $snacks[] = [
                    'snack' => $foods->random(),
                ];
            }
        }

        // Generate dinner
        $dinner_protein = $foods->where('category_id', $meatCategoryId)
        ->reject(function ($food) {
            return $food->restrictions->where('name', 'contains_fish')->count() > 0;
        })
        ->random();


        $dinners[] = [
            'protein' => $dinner_protein,
            'carbohydrate' => $foods->where('category_id', FoodCategory::where('name', 'Grains')->first()->id)
                ->where('nutritional_type', 'carbohydrates')
                ->random(),
            'vegetable' => $foods->where('category_id', FoodCategory::where('name', 'Vegetables')->first()->id)->random(),
            'lipid' => $foods->where('category_id', FoodCategory::where('name', 'Oils')->first()->id)->random(),
        ];
    }

    return view('meals', [
        'breakfasts' => $breakfasts,
        'lunches' => $lunches,
        'dinners' => $dinners,
        'snacks' => $snacks,
        'include_snacks' => $include_snacks,
    ]);
    
}
}
    