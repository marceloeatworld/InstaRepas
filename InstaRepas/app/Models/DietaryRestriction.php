<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietaryRestriction extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_preferences', 'preference_id', 'user_id');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'foods_restrictions', 'restriction_id', 'food_id');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipes_restrictions', 'restriction_id', 'recipe_id');
    }
}
