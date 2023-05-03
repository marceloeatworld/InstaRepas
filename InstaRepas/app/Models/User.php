<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'registration_date',
        'is_admin',
        'points',
        'provider',
        'provider_id',
        'provider_token',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'registration_date' => 'datetime',
        'is_admin' => 'boolean',
    ];

    public static function generateUserName($username)
    {
        if($username == null)
        {
            $username = Str::lower(Str::random(8));
        }
        if(User::where('username', $username)->exists())
        {
            $newUsername = $username.Str::lower(Str::random(3));
            $username = self::generateUserName($newUsername);
        }

        return $username;
    }

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
