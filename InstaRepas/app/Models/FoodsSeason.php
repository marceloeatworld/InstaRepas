<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodSeason extends Model
{
    use HasFactory;

    protected $table = 'foods_seasons';

    protected $fillable = [
        'food_id',
        'season_id',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }
}