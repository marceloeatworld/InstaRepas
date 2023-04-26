<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombinationFood extends Model
{
    use HasFactory;

    protected $fillable = ['combination_id', 'food_id'];

    public function mealCombination()
    {
        return $this->belongsTo(MealCombination::class, 'combination_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}
