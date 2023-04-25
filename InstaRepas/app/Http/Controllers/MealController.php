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
    $currentSeason = Season::getSeasonByMonth($currentMonth);
    
    if ($currentSeason) {
        $foods->whereHas('seasons', function ($query) use ($currentSeason) {
            $query->where('id', $currentSeason->id);
        });
    }
}


    $foods = $foods->get();

    $meatCategoryId = FoodCategory::where('name', 'Meat')->first()->id;
    $fishCategoryId = FoodCategory::where('name', 'Fish')->first()->id;
    $grainsCategoryId = FoodCategory::where('name', 'Grains')->first()->id;
    $fruitsCategoryId = FoodCategory::where('name', 'Fruits')->first()->id;
    $vegetablesCategoryId = FoodCategory::where('name', 'Vegetables')->first()->id;
    $oilsCategoryId = FoodCategory::where('name', 'Oils')->first()->id;
    $dairyCategoryId = FoodCategory::where('name', 'Dairy')->first()->id;
    $nutsCategoryId = FoodCategory::where('name', 'Nuts')->first()->id; 
    $eggsCategoryId = FoodCategory::where('name', 'Eggs')->first()->id;
    $breadCategoryId = FoodCategory::where('name', 'Bread')->first()->id;

    $breakfasts = [];
    $lunches = [];
    $dinners = [];
    $snacks = [];
    
        // Generate meals for the specified number of days
        for ($day = 0; $day < $days; $day++) {
            // Generate breakfast using available foods
            $breakfast_protein = $foods->where('category_id', $dairyCategoryId)->random();
            $breakfast_carbohydrate = $foods->where('category_id', $breadCategoryId)
                ->where('nutritional_type', 'carbohydrates')
                ->random();
        
            $breakfasts[] = [
                'protein' => $breakfast_protein,
                'carbohydrate' => $breakfast_carbohydrate,
                'fruit' => $foods->where('category_id', $fruitsCategoryId)->random(),
            ];
    
            // Generate lunch
            $lunch_protein = $foods->whereIn('category_id', [$meatCategoryId, $fishCategoryId, $eggsCategoryId])
            ->reject(function ($food) {
                return $food->restrictions->where('name', 'contains_lactose')->count() > 0;
            })
            ->random();

            $lunch_carbohydrate = $foods->where('category_id', $grainsCategoryId)
            ->where('nutritional_type', 'carbohydrates')
            ->where('id', '!=', $breadCategoryId)
            ->random();

            $lunches[] = [
            'protein' => $lunch_protein,
            'carbohydrate' => $lunch_carbohydrate,
            'vegetable' => $foods->where('category_id', $vegetablesCategoryId)->random(),
            'lipid' => $foods->where('category_id', $oilsCategoryId)->random(),
            ];

            // Generate dinner (similar to lunch)
            $dinner_protein = $foods->whereIn('category_id', [$meatCategoryId, $fishCategoryId, $eggsCategoryId])
            ->reject(function ($food) {
                return $food->restrictions->where('name', 'contains_fish')->count() > 0;
            })
            ->random();

            $dinner_carbohydrate = $foods->where('category_id', $grainsCategoryId)
            ->where('nutritional_type', 'carbohydrates')
            ->where('id', '!=', $breadCategoryId)
            ->random();

            $dinners[] = [
            'protein' => $dinner_protein,
            'carbohydrate' => $dinner_carbohydrate,
            'vegetable' => $foods->where('category_id', $vegetablesCategoryId)->random(),
            'lipid' => $foods->where('category_id', $oilsCategoryId)->random(),
            ];

            if ($include_snacks) {
            // Generate snacks using available foods
            for ($snack = 0; $snack < $days; $snack++) {
                $snack_food = $foods->whereIn('category_id', [$fruitsCategoryId, $nutsCategoryId])->random();
                $snacks[] = [
                    'snack' => $snack_food,
                ];
            }
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
}
    