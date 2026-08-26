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
    // Catégories exclues par restriction, indépendamment du tagging en base.
    // Sert de filet de sécurité: un aliment mal tagué reste correctement exclu.
    private const RESTRICTION_CATEGORIES = [
        'contains_meat' => ['Meat'],
        'contains_animal_products' => ['Meat', 'Fish', 'Dairy', 'Eggs', 'Crustacean'],
        'contains_fish' => ['Fish', 'Crustacean'],
        'contains_crustacean' => ['Crustacean'],
    ];

    private const MAX_MEAT_MEALS_PER_WEEK = 3;
    private const MIN_FISH_MEALS_PER_WEEK = 2;
    private const MEALS_PER_WEEK = 14; // déjeuner + dîner sur 7 jours

    private $restrictions = [];
    private $meatCount = 0;
    private $fishCount = 0;
    private $lastReset = 0;
    private $dayCount = 0;
    private $lastMeatDay = -1;
    private $usedMeats = [];
    private $lastProteinId = null;
    private $totalMeals = 0;

    // Méthode pour générer des repas
    public function generate(Request $request)
    {
        $request->validate([
            'days' => 'nullable|integer|min:1|max:14',
            'restrictions' => 'nullable|array',
            'restrictions.*' => 'string|exists:dietary_restrictions,name',
            'include_snacks' => 'nullable|boolean',
        ]);

        $this->meatCount = 0;
        $this->fishCount = 0;
        $this->lastReset = 0;
        $this->dayCount = 0;
        $this->lastMeatDay = -1;
        $this->usedMeats = [];
        $this->lastProteinId = null;
        // Récupération des restrictions à partir de la requête
        $this->restrictions = $request->input('restrictions', []);
        $include_snacks = $request->boolean('include_snacks');
        $days = (int) $request->input('days', 1);
        $this->totalMeals = $days * 2;
        $currentMonth = Carbon::now()->month;
        $currentSeason = null;

        // Création de la requête pour récupérer les aliments
        $foods = Food::with('category')->where('is_valid', true);

        // Filtrage des aliments en fonction des restrictions (tags en base)
        foreach ($this->restrictions as $restriction) {
            $foods->whereDoesntHave('restrictions', function ($query) use ($restriction) {
                $query->where('name', $restriction);
            });
        }

        // Filtrage par catégorie: filet de sécurité si un aliment n'est pas tagué
        $excludedCategories = collect($this->restrictions)
            ->flatMap(fn ($restriction) => self::RESTRICTION_CATEGORIES[$restriction] ?? [])
            ->unique()
            ->all();
        if ($excludedCategories !== []) {
            $foods->whereHas('category', function ($query) use ($excludedCategories) {
                $query->whereNotIn('name', $excludedCategories);
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

        // Ajout de la vérification des aliments validés
        // $foods->where('is_valid', operator: true);

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
            // Les suggestions de préparation "beurre/fromage" sont écartées pour ces profils
            'avoid_dairy_styles' => count(array_intersect($this->restrictions, ['contains_lactose', 'contains_animal_products'])) > 0,
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
            'contains_crustacean' => 'Sans crustacé',
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

        // Sélectionne un aliment au hasard, ou null si la collection est vide.
        // Évite les erreurs 500 quand les restrictions vident une catégorie.
        private function pick($foods)
        {
            return $foods->count() > 0 ? $foods->random() : null;
        }

        // Cette fonction génère un petit déjeuner en fonction des aliments disponibles.
        private function generateBreakfast($foods)
        {
            return [
                'protein' => $this->pick($foods->whereIn('category.name', ['Dairy', 'Eggs'])),
                'carbohydrate' => $this->pick($foods->where('category.name', 'Bread')->where('nutritional_type', 'carbohydrates')),
                'fruit' => $this->pick($foods->where('category.name', 'Fruits')),
            ];
        }

        // Cette fonction génère un déjeuner ou un dîner en fonction des aliments disponibles.
        private function generateLunchOrDinner($foods)
        {
            // Variables pour le suivi des jours et de la viande
            $currentDay = floor($this->dayCount / 2); // On divise par 2 pour gérer déjeuner/dîner

            // Réinitialisation hebdomadaire
            if (floor($currentDay / 7) > $this->lastReset) {
                $this->meatCount = 0;
                $this->fishCount = 0;
                $this->usedMeats = [];
                $this->lastReset = floor($currentDay / 7);
            }

            // Détection des limites de viande
            $isMaxMeatWeek = $this->meatCount >= self::MAX_MEAT_MEALS_PER_WEEK;
            $isSameDayMeat = $currentDay === $this->lastMeatDay; // Pas deux repas viande le même jour
            $isMaxMeat = $isMaxMeatWeek || $isSameDayMeat;

            // Objectif poisson: viser au moins 2 repas de poisson par semaine (repère PNNS).
            // On force le poisson quand il ne reste plus assez de repas dans la semaine.
            $mealsLeftInWeek = self::MEALS_PER_WEEK - ($this->dayCount % self::MEALS_PER_WEEK);
            $mealsLeftToGenerate = $this->totalMeals - $this->dayCount;
            // Objectif proportionnel à la durée demandée (2 poissons pour 7 jours)
            $fishTarget = min(
                self::MIN_FISH_MEALS_PER_WEEK,
                (int) ceil($this->totalMeals * self::MIN_FISH_MEALS_PER_WEEK / self::MEALS_PER_WEEK)
            );
            $fishNeeded = $fishTarget - $this->fishCount;
            $fishAvailable = $foods->where('category.name', 'Fish')->count() > 0;
            $mustPickFish = $fishAvailable
                && $fishNeeded > 0
                && min($mealsLeftInWeek, $mealsLeftToGenerate) <= $fishNeeded;

            // Détermination des catégories de protéines.
            // Les restrictions (végétalien, sans poisson...) vident déjà les
            // catégories concernées: le tirage retombe sur ce qui reste.
            if ($mustPickFish) {
                $proteinCategory = ['Fish'];
            } elseif ($isMaxMeat) {
                $proteinCategory = ['Fish', 'Eggs', 'Legumes', 'Crustacean'];
            } else {
                $proteinCategory = ['Meat', 'Fish', 'Eggs', 'Legumes', 'Crustacean'];
            }

            // Sélection de la protéine, en évitant les viandes déjà servies
            // cette semaine et la protéine du repas précédent quand c'est possible.
            $proteinPool = $foods->whereIn('category.name', $proteinCategory)
                ->whereNotIn('id', $this->usedMeats);
            $variedPool = $proteinPool->where('id', '!=', $this->lastProteinId);
            $proteinFood = $this->pick($variedPool->count() > 0 ? $variedPool : $proteinPool);

            // Mise à jour des compteurs selon la protéine servie
            if ($proteinFood && $proteinFood->category) {
                $this->lastProteinId = $proteinFood->id;
                if ($proteinFood->category->name === 'Meat') {
                    $this->meatCount++;
                    $this->lastMeatDay = $currentDay;
                    $this->usedMeats[] = $proteinFood->id;
                } elseif ($proteinFood->category->name === 'Fish') {
                    $this->fishCount++;
                }
            }

            // Incrémentation du compteur global de repas
            $this->dayCount++;

            return [
                'protein' => $proteinFood,
                'carbohydrate' => $this->pick($foods->where('category.name', 'Grains')->where('nutritional_type', 'carbohydrates')),
                'vegetable' => $this->pick($foods->where('category.name', 'Vegetables')),
                'lipid' => $this->pick($foods->where('category.name', 'Oils')),
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
