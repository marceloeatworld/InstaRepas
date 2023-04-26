<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombinationFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_type',
    ];

    public $timestamps = false;

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'combinations_foods', 'combination_id', 'food_id');
    }
}