<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();

    }

    public function callback($provider)
    {

        try {
            $SocialUser = Socialite::driver($provider)->user();

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id,
            ])->first();
            if (! $user) {
                if (User::where('email', $SocialUser->getEmail())->exists()) {
                    return redirect('/login')->with('error', 'Email already exists');
                }
                $user = User::create([
                    'username' => User::generateUserName($SocialUser->getNickname()),
                    'email' => $SocialUser->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token,
                    'registration_date' => now(),
                    'password' => Hash::make(Str::random(12)),
                ]);
                $user->sendEmailVerificationNotification();
            }

            Auth::login($user);

            // Permet de diriger un compte Google "admin" sur la page admin
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('dashboard');
            }

        } catch (\Exception $e) {
            return redirect('/login');
        }

    }
}
