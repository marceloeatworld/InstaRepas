<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    use HasFactory;
    protected $table = 'recipe_categories';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'recipe_category_id');
    }
}
