<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeFood extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'recipes_foods';

    protected $fillable = [
        'recipe_id',
        'food_id',
        'quantity',
        'unit_of_measure',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}
