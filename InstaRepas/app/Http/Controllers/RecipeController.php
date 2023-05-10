<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\DietaryRestriction;
use App\Models\Season;
use App\Models\MealCombination;
use App\Models\UnitOfMeasure;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function create()
    {
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $meal_combinations = MealCombination::all();
        $foods = Food::all();
        $units_of_measure = UnitOfMeasure::all();

        return view('profile.recipes.create', compact('categories', 'restrictions', 'seasons', 'meal_combinations', 'foods', 'units_of_measure'));
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
        $user = auth()->user();

        // Ajout de points pour la création de la recette
        $user->points += 2;

        // Ajout de points pour les nouveaux ingrédients
        foreach ($validatedData['foods'] as $food) {
            $foodExists = Food::find($food['id']);
            if (!$foodExists) {
                $user->points += 1;
            }
        }

        $user->save();

        // Traitement du fichier image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $imageUrl = '/storage/' . substr($path, strlen('public/'));
        } else {
            $imageUrl = $validatedData['image_url'] ?? null;
        }


        $recipe = Recipe::create([
            'user_id' => auth()->id(),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'preparation_steps' => $validatedData['preparation_steps'],
            'preparation_time' => $validatedData['preparation_time'],
            'cooking_time' => $validatedData['cooking_time'],
            'servings' => $validatedData['servings'],
            'recipe_category_id' => $validatedData['recipe_category_id'],
            'image_url' => $imageUrl,
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


    // Récupere les aliments de la BDD pour le faire afficher dans la vue sous forme JSON quand on recherche un aliment
    public function searchFoods(Request $request)
    {
        $query = $request->input('search');
        $foods = Food::where('name', 'like', '%' . $query . '%')->get();

        if ($foods->isEmpty()) {
            return response()->json([
                'message' => "Aucun aliment trouvé. Voulez-vous en ajouter un nouveau ?",
                'query' => $query
            ]);
        }

        return response()->json($foods);
    }

    public function addFood(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'food_category_id' => 'required|exists:food_categories,id'
        ]);
    
        $food = Food::create([
            'name' => $request->input('name'),
            'food_category_id' => $request->input('food_category_id'),
            'user_id' => auth()->user()->id, // Ajout du user_id
            'is_valid' => 0 // Définition de la valeur is_valid à 0
        ]);
    
        return response()->json([
            'message' => 'Aliment ajouté avec succès.',
            'food' => $food
        ]);
    }
    
}