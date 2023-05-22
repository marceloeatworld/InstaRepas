<?php

// Inclusion des classes de modèles nécessaires.
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

// Définition du contrôleur de la nourriture
class FoodController extends Controller
{
    // Méthode pour afficher la liste des aliments
    public function index(Request $request)
    {
        // Récupération des paramètres de la requête
        $search = $request->input('search');
        $selectedCategory = $request->input('category');
        $notValidated = $request->input('not_validated');

        // Récupération des aliments en fonction des paramètres de la requête
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

        // Récupération de toutes les catégories pour les afficher dans le menu déroulant
        $categories = FoodCategory::all();

        // Renvoi à la vue avec les données récupérées
        return view('admin.foods.index', compact('foods', 'search', 'categories', 'selectedCategory', 'notValidated'));
    }

    // Méthode pour afficher le formulaire de création d'un aliment
    public function create()
    {
        // Récupération de toutes les catégories, restrictions, saisons et combinaisons de repas
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $meal_combinations = MealCombination::all();
        $nutritional_types = Food::NUTRITIONAL_TYPES;
        $food = new Food();

        // Renvoi à la vue avec les données récupérées
        return view('admin.foods.create', compact('food', 'categories', 'restrictions', 'seasons', 'meal_combinations', 'nutritional_types'));
    }

    // Méthode pour enregistrer un nouvel aliment
    public function store(Request $request)
    {
        // Création du nouvel aliment
        $food = Food::create($request->all());
        $food->user_id = auth()->id();
        $food->save();

        // Attribution de plusieurs MealCombination, Season et DietaryRestriction
        $food->mealCombinations()->sync($request->input('meal_combinations', []));
        $food->seasons()->sync($request->input('seasons', []));
        $food->restrictions()->sync($request->input('restrictions', []));

        // Message de succès et redirection vers la page de création
        Session::flash('success', 'Aliment ajouté avec succès!');
        return redirect()->route('admin.foods.create');
    }

    // Méthode pour afficher le formulaire de modification d'un aliment
    public function edit(Food $food)
    {
        // Récupération de toutes les catégories, restrictions, saisons et combinaisons de repas
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        $meal_combinations = MealCombination::all();
        $nutritional_types = Food::NUTRITIONAL_TYPES;

        // Récupération des CombinationFood associées au Food spécifié
        $combination_foods = CombinationFood::with('combination')->where('food_id', $food->id)->get();

        // Renvoi à la vue avec les données récupérées
        return view('admin.foods.edit', compact('food', 'categories', 'restrictions', 'seasons', 'meal_combinations', 'combination_foods', 'nutritional_types'));
    }

    // Méthode pour mettre à jour un aliment
    public function update(Request $request, Food $food)
    {
        // Mise à jour de l'aliment
        $food->update($request->all());

        // Mise à jour des MealCombination, Season et DietaryRestriction associés
        $food->mealCombinations()->sync($request->input('meal_combinations', []));
        $food->seasons()->sync($request->input('seasons', []));
        $food->restrictions()->sync($request->input('restrictions', []));

        // Message de succès et redirection vers la liste des aliments
        Session::flash('success', 'Aliment a été modifié avec succès!');
        return redirect()->route('admin.foods.index');
    }

    // Méthode pour supprimer un aliment
    public function destroy(Food $food)
    {
        // Suppression des restrictions, saisons et combinaisons de repas associées
        $food->restrictions()->detach();
        $food->seasons()->detach();
        $food->mealCombinations()->detach();

        // Suppression de l'aliment
        $food->delete();

        // Message de succès et redirection vers la liste des aliments
        Session::flash('success', 'Aliment a été supprimer avec succès!');
        return redirect()->route('admin.foods.index');
    }


}
