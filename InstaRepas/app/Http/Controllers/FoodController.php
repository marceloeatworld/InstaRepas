<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\CombinationFood;
use App\Models\DietaryRestriction;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\FoodRestriction;
use App\Models\FoodSeason;
use App\Models\MealCombination;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{


    public function index(Request $request)
{
    $search = $request->input('search');
    $selectedCategory = $request->input('category');
    $notValidated = $request->input('not_validated');

    $foods = Food::with('category')
        ->when($search, function ($query) use ($search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        })
        ->when($selectedCategory, function ($query) use ($selectedCategory) {
            return $query->where('category_id', $selectedCategory);
        })
        ->when($notValidated, function ($query) {
            return $query->where('is_valid', false);
        })
        ->get();


            // Pour tester, affichons les informations de l'utilisateur pour le premier aliment
/*     $firstFood = $foods->first();
    if($firstFood){
        $user = $firstFood->user;
        dd($user);  // pour afficher les informations de l'utilisateur
    } */
    // Récupérer toutes les catégories pour les afficher dans le menu déroulant
    $categories = FoodCategory::all();

    return view('admin.foods.index', compact('foods', 'search', 'categories', 'selectedCategory', 'notValidated'));
}

    
    

    public function create()
    {
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $meal_combinations = MealCombination::all();
        $nutritional_types = Food::NUTRITIONAL_TYPES;
        return view('admin.foods.create', compact('categories', 'restrictions', 'seasons', 'meal_combinations', 'nutritional_types'));
    }

    public function store(Request $request)
    {
        $food = Food::create($request->all());

        $food->user_id = auth()->id();
        $food->save();
        // Attribuer plusieurs MealCombination
        $food->mealCombinations()->sync($request->input('meal_combinations', []));
    
        // Attribuer plusieurs Season
        $food->seasons()->sync($request->input('seasons', []));
    
        // Attribuer plusieurs DietaryRestriction
        $food->restrictions()->sync($request->input('restrictions', []));

        Session::flash('success', 'Aliment ajouté avec succès!');
    
        return redirect()->route('admin.foods.create');
    }



    public function edit(Food $food)
    {
        // Récupérer toutes les catégories, restrictions, saisons et combinaisons de repas
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $meal_combinations = MealCombination::all();
        $nutritional_types = Food::NUTRITIONAL_TYPES;
        // Récupérer les CombinationFood associées au Food spécifié
        $combination_foods = CombinationFood::with('combination')->where('food_id', $food->id)->get();
    
        // Passer les données à la vue et retourner la vue
        return view('admin.foods.edit', compact('food', 'categories', 'restrictions', 'seasons', 'meal_combinations', 'combination_foods', 'nutritional_types'));
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

        Session::flash('success', 'Aliment a été modifié avec succès!');
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
        Session::flash('success', 'Aliment a été supprimer avec succès!');
        return redirect()->route('admin.foods.index');
    }





}
