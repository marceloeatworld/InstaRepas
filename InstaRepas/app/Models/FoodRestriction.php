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
<<<<<<< HEAD:InstaRepas/app/Models/FoodsRestriction.php
}
=======
}
>>>>>>> 352efbe116555cd79854ecceed60ddb979589544:InstaRepas/app/Models/FoodRestriction.php
