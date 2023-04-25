<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

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
        return $this->belongsToMany(DietaryRestriction::class, 'foods_restrictions');
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'foods_seasons');
    }

    public function mealCombinations()
    {
        return $this->belongsToMany(MealCombination::class, 'combinations_foods');
    }
}
