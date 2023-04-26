<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietaryRestriction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipes_restrictions');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'foods_restrictions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_preferences');
    }
}
