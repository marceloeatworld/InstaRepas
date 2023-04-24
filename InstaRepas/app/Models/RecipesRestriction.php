<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipesRestriction extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'restriction_id'];
}
