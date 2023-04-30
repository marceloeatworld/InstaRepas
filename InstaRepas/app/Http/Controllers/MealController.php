<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\MealCombination;
use App\Models\CombinationFood;
use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserPreference;
use App\Models\DietaryRestriction;

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
        $availableDietaryRestrictions = DietaryRestriction::all();


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
                $foods->where(function ($query) use ($currentSeason) {
                    $query->whereHas('seasons', function ($query) use ($currentSeason) {
                        $query->where('seasons.id', $currentSeason->id);
                    })->orWhereDoesntHave('seasons');
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
            $breakfasts[] = $this->generateMeal('breakfast', $foods);
            $lunches[] = $this->generateMeal('other_meals', $foods);
            $dinners[] = $this->generateMeal('other_meals', $foods);

            if ($include_snacks) {
                $snacks[] = $this->generateSnack($foods);
            }
        }

        return view('meals.meals', [

            'breakfasts' => $breakfasts,
            'lunches' => $lunches,
            'dinners' => $dinners,
            'snacks' => $snacks,
            'include_snacks' => $include_snacks,
            'current_date' => Carbon::now()->toFormattedDateString(),
            'current_season' => $currentSeason ? $currentSeason->season_name : 'Unknown',
        ]);
    }
    public function generateForm()
    {

        $displayNames = [
            'contains_gluten' => 'Sans gluten',
            'contains_fish' => 'Sans poisson',
            'contains_meat' => 'Sans viande',
            'contains_lactose' => 'Sans lactose',
            'contains_animal_products' => 'Sans produit animal',
            'contains_pork' => 'Sans porc',
        ];
        
        $userPreferences = [];
        if (Auth::check()) {
            $userPreferences = UserPreference::where('user_id', Auth::id())->pluck('preference_id')->toArray();
        }

        $availableDietaryRestrictions = DietaryRestriction::all();

        return view('meals.generate', ['userPreferences' => $userPreferences, 'availableDietaryRestrictions' => $availableDietaryRestrictions, 'displayNames' => $displayNames]);

    }
    private function generateMeal($mealType, $foods)
    {
        $mealCombination = MealCombination::where('meal_type', $mealType)->inRandomOrder()->first();
        if (!$mealCombination) {
            return [
                'error_message' => "There are no {$mealType} combinations available that match your criteria.",
            ];
        }

        $mealFoods = $mealCombination->foods()->whereIn('foods.id', $foods->pluck('id'))->get();

        $result = [];

        if ($mealType === 'breakfast') {
            $result = $this->generateBreakfast($mealFoods);
        } else if ($mealType === 'other_meals') {
            $result = $this->generateLunchOrDinner($mealFoods);
        }

        return $result;
    }

    private function generateBreakfast($foods)
    {
        $proteinFood = $foods->where('category.name', 'Dairy')->count() > 0 ? $foods->where('category.name', 'Dairy')->random() : null;

        
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

        $carbohydrateFood = null;
        $fiberFood = null;
        if (in_array('contains_animal_products', $this->restrictions)) {
            $carbohydrateFood = $foods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')->count() > 0 ? $foods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')->random() : null;
            $fiberFood = $foods->where('category.name', 'Vegetables')->where('nutritional_type', 'fibers')->count() > 0 ? $foods->where('category.name', 'Vegetables')->where('nutritional_type', 'fibers')->random() : null;
        }
    
        return [
            'protein' => $proteinFood,
            'carbohydrate' => in_array('contains_animal_products', $this->restrictions) ? $carbohydrateFood : ($foods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')->count() > 0 ? $foods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')->random() : null),
            'fiber' => in_array('contains_animal_products', $this->restrictions) ? $fiberFood : null,
            'vegetable' => $foods->where('category.name', 'Vegetables')->count() > 0 ? $foods->where('category.name', 'Vegetables')->random() : null,
            'lipid' => $foods->where('category.name', 'Oils')->count() > 0 ? $foods->where('category.name', 'Oils')->random() : null,
        ];
    }
    
    private function generateSnack($foods)
    {
        $snackCombination = MealCombination::where('meal_type', 'snack')->inRandomOrder()->first();

        if (!$snackCombination) {
            return [
                'error_message' => "There are no snack combinations available that match your criteria.",
            ];
        }
    
        $snackFoods = $snackCombination->foods()->whereIn('foods.id', $foods->pluck('id'))->get();
        $fruitFoods = $foods->where('category.name', 'Fruits');
    
        $fruit = $fruitFoods->count() > 0 ? $fruitFoods->random() : null;
        $otherSnack = $snackFoods->where('category.name', '!=', 'Fruits')->count() > 0 ? $snackFoods->where('category.name', '!=', 'Fruits')->random() : null;
    
        return [
            'fruit' => $fruit,
            'other_snack' => $otherSnack,
        ];
    }
}

