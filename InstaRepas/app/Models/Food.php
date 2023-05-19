<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'foods';
    const NUTRITIONAL_TYPES = ['proteins', 'carbohydrates', 'fibers', 'lipids', 'fruits'];

    protected $fillable = [
        'name',
        'category_id',
        'user_id',
        'is_valid',
        'nutritional_type',
    ];

    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipes_foods')
            ->withPivot('quantity', 'unit_of_measure');
    }

    public function restrictions()
    {
        return $this->belongsToMany(DietaryRestriction::class, 'foods_restrictions', 'food_id', 'restriction_id'); 
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'foods_seasons');
    }

    public function mealCombinations()
    {
        return $this->belongsToMany(MealCombination::class, 'combinations_foods', 'food_id', 'combination_id');
    }


    public function getPreparationStyleAttribute()
    {
        // Définir les styles de préparation pour chaque catégorie et aliment spécifique
        $preparationStyles = [
            'Fruits' => [
                'Citron' => ['before' => ['Jus de']],
                'Orange' => ['before' => ['Jus de']],
                'Pamplemousse' => ['before' => ['Jus de']]
            ],
            'Vegetables' => [
                'after' => ['sauté', 'vapeur'],
                'Laitue' => ['before' => ['Salade de']],
                'Betterave' => ['before' => ['Salade de']],
                'Artichaut' => ['after' => ['vapeur']],
                'Radis' => ['before' => ['Salade de']],
            ],
            'Meat' => [
                'after' => ['grillé', 'rôti', 'braisé']
            ],
            'Fish' => [
                'after' => ['en papillote', 'grillé', 'vapeur']
            ],
            "Bread" => [
                'after' => ['avec une noix de beurre', 'avec de la purée d\'amande', 'avec du fromage à tartiner']
            ],
            'Grains' => [
                'Pomme de terre' => ['before' => ['Purée de', 'Gratin de', 'Frites de']],
                'after' => ['avec une noix de beurre', 'avec un filet d\'huile d\'olive']
            ]
           
        ];
    
        // Récupérer le nom de la catégorie et de l'aliment
        $category = $this->category->name;
        $name = $this->name;
    
        // Définir la liste des aliments à exclure
        $excludedFoods = ['Steak tartare de boeuf', 'Bacon',];

        // Exclure les aliments dans la liste d'exclusion
        if(in_array($name, $excludedFoods)) {
            return $name;
        }
        // Vérifier si la catégorie existe dans les styles de préparation
        if (array_key_exists($category, $preparationStyles)) {
            // Vérifier si le nom de l'aliment a un style de préparation spécifique
            if (array_key_exists($name, $preparationStyles[$category])) {
                // Boucler à travers chaque position et styles
                foreach ($preparationStyles[$category][$name] as $position => $styles) {
                    // Récupérer un style aléatoire
                    $randomStyle = $styles[array_rand($styles)];
                    // Si la position est 'before', ajouter le style avant le nom
                    if ($position == 'before') {
                        return $randomStyle . ' ' . $name;
                    }
                    // Si la position est 'after', ajouter le style après le nom
                    elseif ($position == 'after') {
                        return $name . ' ' . $randomStyle;
                    }
                }
            }
            // Vérifier si la catégorie a un style de préparation général
            elseif (array_key_exists('before', $preparationStyles[$category]) || array_key_exists('after', $preparationStyles[$category])) {
                // Boucler à travers chaque position et styles
                foreach ($preparationStyles[$category] as $position => $styles) {
                    // Récupérer un style aléatoire
                    $randomStyle = $styles[array_rand($styles)];
                    // Si la position est 'before', ajouter le style avant le nom
                    if ($position == 'before') {
                        return $randomStyle . ' ' . $name;
                    }
                    // Si la position est 'after', ajouter le style après le nom
                    elseif ($position == 'after') {
                        return $name . ' ' . $randomStyle;
                    }
                }
            }
        }
    
        // Si aucune condition n'est remplie, retourner le nom tel quel
        return $name;
    }
    
    
    

}
