<?php

namespace App\Http\Controllers;

use App\Models\DietaryRestriction;
use App\Models\MealCombination;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\RecipeCategory;
use App\Models\Recipe;
use App\Models\RecipeFood;
use App\Models\Season;
use App\Models\UnitOfMeasure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function userRecipes($userId)
    {
        $recipes = Recipe::where('user_id', $userId)->get();
        return view('recipes.user_recipes', compact('recipes'));
    }

    public function create()
    {
        $categories = FoodCategory::all();
        $recipeCategories = RecipeCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $combinations = MealCombination::all();
        $units = UnitOfMeasure::all();
        return view('profile.recipes.create', compact('categories', 'restrictions', 'seasons', 'combinations', 'units', 'recipeCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'preparation_steps' => 'required',
            'preparation_time' => 'required',
            'cooking_time' => 'required',
            'servings' => 'required',
            'recipe_category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $recipe = new Recipe($request->all());
        $recipe->user_id = Auth::id();
        $recipe->save();

        if ($request->hasFile('image')) {
            $recipe->addMedia($request->file('image'))->toMediaCollection('recipes');
        }

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }

    public function searchFoods(Request $request)
    {
        $search = $request->input('search');
        $foods = Food::where('name', 'LIKE', "%{$search}%")->get();

        return response()->json($foods);
    }

    public function addFood(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'nutritional_type' => 'required',
        ]);

        $food = new Food($request->all());
        $food->is_valid = 0;
        $food->user_id = Auth::id();
        $food->save();

        return response()->json(['success' => 'Food added successfully.']);
    }
}
