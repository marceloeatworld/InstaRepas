<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRestriction extends Model
{
    use HasFactory;

    protected $fillable = ['food_id', 'restriction_id'];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function dietaryRestriction()
    {
        return $this->belongsTo(DietaryRestriction::class, 'restriction_id');
    }
}
