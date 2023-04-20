<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRestriction extends Model
{
    use HasFactory;

    protected $fillable = ['food_id', 'restriction_id'];
}