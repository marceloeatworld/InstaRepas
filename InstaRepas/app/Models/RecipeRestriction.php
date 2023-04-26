<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeRestriction extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'restriction_id',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    public function restriction()
    {
        return $this->belongsTo(DietaryRestriction::class, 'restriction_id');
    }
}
