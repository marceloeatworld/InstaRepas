<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombinationFood extends Model
{
    use HasFactory;
    protected $table = 'combinations_foods';

    protected $fillable = [
        'combination_id',
        'food_id',
    ];

    public $timestamps = false;

    public function combination()
    {
        return $this->belongsTo(MealCombination::class, 'combination_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}
