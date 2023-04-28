<?php

namespace App\Http\Controllers;

use App\Models\CombinationFood;
use App\Models\DietaryRestriction;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\FoodRestriction;
use App\Models\FoodSeason;
use App\Models\MealCombination;
use App\Models\Season;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('admin.foods.index', compact('foods'));
    }

    public function create()
    {
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $meal_combinations = MealCombination::all();
        return view('admin.foods.create', compact('categories', 'restrictions', 'seasons', 'meal_combinations'));
    }

    public function store(Request $request)
    {
        $food = Food::create($request->all());

        $food->restrictions()->sync($request->input('restrictions', []));
        $food->seasons()->sync($request->input('seasons', []));
        $food->mealCombinations()->sync($request->input('meal_combinations', []));

        return redirect()->route('admin.foods.index');
    }

    public function show(Food $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    public function edit(Food $food)
    {
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $meal_combinations = MealCombination::all();
        $combination_foods = CombinationFood::with('combination')->where('food_id', $food->id)->get();
        
        return view('admin.foods.edit', compact('food', 'categories', 'restrictions', 'seasons', 'meal_combinations', 'combination_foods'));
    }
    

    public function update(Request $request, Food $food)
    {
        $food->update($request->all());
    
        // Update associated restrictions
        $food->restrictions()->sync($request->input('restrictions', []));
    
        // Update associated seasons
        $food->seasons()->sync($request->input('seasons', []));
    
        // Update associated meal combinations
        $food->mealCombinations()->sync($request->input('meal_combinations', []));
    
        return redirect()->route('admin.foods.index');
    }

    public function destroy(Food $food)
    {
        // Delete associated restrictions
        $food->restrictions()->detach();
    
        // Delete associated seasons
        $food->seasons()->detach();
    
        // Delete associated meal combinations
        $food->mealCombinations()->detach();
    
        // Delete the food
        $food->delete();
    
        return redirect()->route('admin.foods.index');
    }
    
}
