<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\DietaryRestriction;
use App\Models\Food;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function create()
    {
        $categories = RecipeCategory::all();
        $restrictions = DietaryRestriction::all();
        $foods = Food::all();
        return view('recipes.CreateRecipe', compact('categories', 'restrictions', 'foods'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'preparation_steps' => 'required|string|max:5000',
            'preparation_time' => 'required|integer|min:1|max:1440',
            'cooking_time' => 'required|integer|min:1|max:1440',
            'servings' => 'required|integer|min:1|max:50',
            'recipe_category_id' => 'required|exists:recipe_categories,id',
            'image_url' => 'nullable|string|max:255',
            'foods' => 'array',
            'foods.*.id' => 'required|exists:foods,id',
            'foods.*.quantity' => 'required|integer|min:1|max:1000',
            'foods.*.unit_of_measure' => 'required|string|max:50',
            'restrictions' => 'array',
            'restrictions.*' => 'required|exists:dietary_restrictions,id',
        ]);

        $recipe = Recipe::create([
            'user_id' => auth()->id(),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'preparation_steps' => $validatedData['preparation_steps'],
            'preparation_time' => $validatedData['preparation_time'],
            'cooking_time' => $validatedData['cooking_time'],
            'servings' => $validatedData['servings'],
            'recipe_category_id' => $validatedData['recipe_category_id'],
            'image_url' => $validatedData['image_url'],
        ]);

        $recipe->foods()->attach($validatedData['foods']);
        $recipe->restrictions()->attach($validatedData['restrictions']);

        return redirect()->route('recipes.recipes.show', $recipe);
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.recipes.show', compact('recipe'));
    }

    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.recipes', compact('recipes'));
    }
    
    
}
