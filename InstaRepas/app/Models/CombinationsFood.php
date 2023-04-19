<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombinationsFood extends Model
{
    use HasFactory;

    protected $fillable = ['combination_id', 'food_id'];
}