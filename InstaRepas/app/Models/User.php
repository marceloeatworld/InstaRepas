<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Carbon;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
    //public $timestamps = false;
    protected $table = 'users';

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'registration_date',
        'is_admin',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'registration_date'
    ];

    protected $casts = [
        'is_admin' => 'boolean',
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