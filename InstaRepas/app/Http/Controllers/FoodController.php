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
    
        // Attribuer plusieurs MealCombination
        $food->mealCombinations()->sync($request->input('meal_combinations', []));
    
        // Attribuer plusieurs Season
        $food->seasons()->sync($request->input('seasons', []));
    
        // Attribuer plusieurs DietaryRestriction
        $food->restrictions()->sync($request->input('restrictions', []));
    
        return redirect()->route('admin.foods.index');
    }

    public function show(Food $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    public function edit(Food $food)
    {
        // Récupérer toutes les catégories, restrictions, saisons et combinaisons de repas
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $meal_combinations = MealCombination::all();
    
        // Récupérer les CombinationFood associées au Food spécifié
        $combination_foods = CombinationFood::with('combination')->where('food_id', $food->id)->get();
    
        // Passer les données à la vue et retourner la vue
        return view('admin.foods.edit', compact('food', 'categories', 'restrictions', 'seasons', 'meal_combinations', 'combination_foods'));
    }

    public function update(Request $request, Food $food)
    {
        $food->update($request->all());
    
        // Mettre à jour les MealCombination associés
        $food->mealCombinations()->sync($request->input('meal_combinations', []));
    
        // Mettre à jour les Season associés
        $food->seasons()->sync($request->input('seasons', []));
    
        // Mettre à jour les DietaryRestriction associés
        $food->restrictions()->sync($request->input('restrictions', []));
    
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
