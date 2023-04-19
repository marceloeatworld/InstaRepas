<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'registration_date',
        'is_admin'
    ];

    protected $hidden = [
        'password',
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
        return $this->belongsToMany(DietaryRestriction::class, 'user_preferences');
    }
}
