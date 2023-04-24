<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodSeason extends Model
{
    use HasFactory;

    protected $fillable = ['food_id', 'season_id'];
}