<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Extraction du prénom et du nom
        $nameParts = explode(' ', $googleUser->name);
        $firstName = array_shift($nameParts);
        $lastName = implode(' ', $nameParts);

        $user = User::firstOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $firstName,
                'lastname' => $lastName,
                'password' => bcrypt(rand(100000, 999999))
            ]
        );

        Auth::login($user, true);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirige l'utilisateur vers la page d'accueil après la déconnexion
    }

}
