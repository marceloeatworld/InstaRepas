<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'registration_date',
        'is_admin',
    ];

    public function foods()
    {
        return $this->hasMany(Food::class, 'user_id');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'user_id');
    }

    public function preferences()
    {
        return $this->belongsToMany(DietaryRestriction::class, 'user_preferences', 'user_id', 'preference_id');
    }
}