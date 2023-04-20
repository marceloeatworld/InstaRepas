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
        return $this->belongsToMany(User::class, 'user_preferences');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'foods_restrictions');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipes_restrictions');
    }
}
