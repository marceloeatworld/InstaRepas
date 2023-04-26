<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'preference_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dietaryRestriction()
    {
        return $this->belongsTo(DietaryRestriction::class, 'preference_id');
    }
}