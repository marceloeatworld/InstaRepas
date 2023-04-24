<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealCombination extends Model
{
    use HasFactory;

    protected $fillable = ['meal_type'];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'combinations_foods');
    }
}