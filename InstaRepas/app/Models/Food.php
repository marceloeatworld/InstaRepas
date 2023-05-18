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


    //ajouter un mode de preparation en fonction de la categorie
    public function getPreparationStyleAttribute()
    {
        $preparationStyles = [
            'Fruits' => ['before' => ['Jus de']],
            'Vegetables' => ['before' => ['Sauté de ', 'Vapeur']],
            'Meat' => ['before' => ['Grillé', 'Rôti', 'Braisé']],
            'Fish' => ['before' => ['Frit', 'Grillé', 'Vapeur']],
            'Pomme de terre' => ['before' => ['Purée de', 'Gratin de', 'Frites de']],
            'Bread' => ['after' => ['avec du beurre de noix', 'avec de la purée d\'amande', 'avec du fromage à tartiner']]
        ];
    
        $category = $this->category->name;
    
        if (array_key_exists($category, $preparationStyles)) {
            if (isset($preparationStyles[$category]['before'])) {
                $styles = $preparationStyles[$category]['before'];
                $randomStyle = $styles[array_rand($styles)];
                return $randomStyle . ' ' . $this->name;
            } elseif (isset($preparationStyles[$category]['after'])) {
                $styles = $preparationStyles[$category]['after'];
                $randomStyle = $styles[array_rand($styles)];
                return $this->name . ' ' . $randomStyle;
            }
        } else {
            return $this->name;
        }
    }
    

}
