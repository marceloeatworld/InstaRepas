<?php

namespace App\Http\Controllers;

// Inclusion des modèles nécessaires.
use App\Models\Food;
use App\Models\MealCombination;
use App\Models\CombinationFood;
use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserPreference;
use App\Models\DietaryRestriction;
use Illuminate\Http\Request;

// Définition du contrôleur de repas
class MealController extends Controller
{
    private $restrictions = [];

    // Méthode pour générer des repas
    public function generate(Request $request)
    {
        // Récupération des restrictions à partir de la requête
        $this->restrictions = $request->input('restrictions', []);
        $include_snacks = $request->input('include_snacks', false);
        $days = max(1, min($request->input('days', 1), 60));
        $currentMonth = Carbon::now()->month;
        $currentSeason = null;
        $availableDietaryRestrictions = DietaryRestriction::all();

        // Création de la requête pour récupérer les aliments
        $foods = Food::query();

        // Filtrage des aliments en fonction des restrictions
        foreach ($this->restrictions as $restriction) {
            $foods->whereDoesntHave('restrictions', function ($query) use ($restriction) {
                $query->where('name', $restriction);
            });
        }

        // Filtrage des aliments en fonction des saisons
        $currentSeason = Season::getSeasonByMonth($currentMonth);
        if ($currentSeason) {
            $foods->where(function ($query) use ($currentSeason) {
                $query->whereHas('seasons', function ($query) use ($currentSeason) {
                    $query->where('seasons.id', $currentSeason->id);
                })->orWhereDoesntHave('seasons');
            });
        }

        $foods = $foods->get();

        // Préparation des repas pour le nombre spécifié de jours
        $breakfasts = [];
        $lunches = [];
        $dinners = [];
        $snacks = [];

        for ($day = 0; $day < $days; $day++) {
            $breakfasts[] = $this->generateMeal('breakfast', $foods);
            $lunches[] = $this->generateMeal('other_meals', $foods);
            $dinners[] = $this->generateMeal('other_meals', $foods);

            if ($include_snacks) {
                $snacks[] = $this->generateSnack($foods);
            }
        }

        // Renvoi à la vue avec les repas générés
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

    // Méthode pour afficher le formulaire de génération de repas
    public function generateForm()
    {
        // Définition des noms d'affichage pour les restrictions
        $displayNames = [
            'contains_gluten' => 'Sans gluten',
            'contains_fish' => 'Sans poisson',
            'contains_meat' => 'Sans viande',
            'contains_lactose' => 'Sans lactose',
            'contains_animal_products' => 'Sans produit animal',
            'contains_pork' => 'Sans porc',
        ];
        
        // Récupération des préférences de l'utilisateur
        $userPreferences = [];
        if (Auth::check()) {
            $userPreferences = UserPreference::where('user_id', Auth::id())->pluck('preference_id')->toArray();
        }

        // Récupération des restrictions alimentaires disponibles
        $availableDietaryRestrictions = DietaryRestriction::all();

        // Renvoi à la vue avec les données récupérées
        return view('meals.generate', ['userPreferences' => $userPreferences, 'availableDietaryRestrictions' => $availableDietaryRestrictions, 'displayNames' => $displayNames]);
    }
        // Cette fonction génère un repas en fonction du type de repas et des aliments disponibles.
        private function generateMeal($mealType, $foods)
        {
            // Récupère une combinaison de repas au hasard pour le type de repas spécifié.
            $mealCombination = MealCombination::where('meal_type', $mealType)->inRandomOrder()->first();
            
            // S'il n'y a pas de combinaison de repas disponible, renvoie un message d'erreur.
            if (!$mealCombination) {
                return [
                    'error_message' => "Il n'y a pas de combinaisons pour {$mealType} disponibles qui correspondent à vos critères.",
                ];
            }

            // Récupère les aliments qui sont dans la combinaison de repas sélectionnée.
            $mealFoods = $mealCombination->foods()->whereIn('foods.id', $foods->pluck('id'))->get();

            $result = [];

            // Génère un petit déjeuner si le type de repas est 'breakfast'
            if ($mealType === 'breakfast') {
                $result = $this->generateBreakfast($mealFoods);
            }
            // Génère un déjeuner ou un dîner si le type de repas est 'other_meals'
            else if ($mealType === 'other_meals') {
                $result = $this->generateLunchOrDinner($mealFoods);
            }

            return $result;
        }

        // Cette fonction génère un petit déjeuner en fonction des aliments disponibles.
        private function generateBreakfast($foods)
        {
            // Récupère un aliment contenant des protéines.
            $proteinCategories = ['Dairy', 'Eggs'];
            $proteinFood = $foods->whereIn('category.name', $proteinCategories)->count() > 0 ? $foods->whereIn('category.name', $proteinCategories)->random() : null;

            return [
                'protein' => $proteinFood,
                'carbohydrate' => $foods->where('category.name', 'Bread')->where('nutritional_type', 'carbohydrates')->random(),
                'fruit' => $foods->where('category.name', 'Fruits')->random(),
            ];
        }

        // Cette fonction génère un déjeuner ou un dîner en fonction des aliments disponibles.
        private function generateLunchOrDinner($foods)
        {
            // Récupère un aliment contenant des protéines. 
            // Si l'utilisateur a une restriction alimentaire qui interdit les produits animaux, sélectionne une protéine végétale.
            $proteinCategory = in_array('contains_animal_products', $this->restrictions) ? 'Vegetables' : ['Meat', 'Fish', 'Eggs', 'Pork'];
            $proteinFood = $foods->whereIn('category.name', $proteinCategory)->count() > 0 ? $foods->whereIn('category.name', $proteinCategory)->random() : null;

            $carbohydrateFood = null;
            $fiberFood = null;
            
            // Si l'utilisateur a une restriction alimentaire qui interdit les produits animaux, sélectionne des aliments riches en glucides et en fibres.
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

        // Cette fonction génère un snack en fonction des aliments disponibles.
        private function generateSnack($foods)
        {
            // Récupère une combinaison de snack au hasard.
            $snackCombination = MealCombination::where('meal_type', 'snack')->inRandomOrder()->first();

            // S'il n'y a pas de combinaison de snack disponible, renvoie un message d'erreur.
            if (!$snackCombination) {
                return [
                    'error_message' => "Il n'y a pas de combinaisons de snack disponibles qui correspondent à vos critères.",
                ];
            }

            // Récupère les aliments qui sont dans la combinaison de snack sélectionnée.
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
