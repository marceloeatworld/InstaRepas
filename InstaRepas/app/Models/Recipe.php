<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Recipe extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    public $timestamps = false;
    protected $table = 'recipes';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'preparation_steps',
        'preparation_time',
        'cooking_time',
        'servings',
        'recipe_category_id',
        'creation_date',
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(RecipeCategory::class, 'recipe_category_id');
    }

    public function restrictions()
    {
        return $this->belongsToMany(DietaryRestriction::class, 'recipes_restrictions', 'recipe_id', 'restriction_id');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'recipes_foods');
    }
}
