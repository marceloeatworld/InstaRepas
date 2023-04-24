<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipesFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'food_id',
        'quantity',
        'unit_of_measure'
    ];
}