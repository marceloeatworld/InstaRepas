<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
   public function redirect($provider){
    return Socialite::driver($provider)->redirect();


   }

   public function callback($provider){

    try {
        $SocialUser = Socialite::driver($provider)->user();
       
        $user = User::where([
            'provider' => $provider,
            'provider_id' => $SocialUser->id
        ])->first();
        if(!$user){
            if(User::where('email', $SocialUser->getEmail)->exists())
            {
                return redirect('/login')->with('error', 'Email already exists');
            }
            $password = Str::random(12);
            $user = User::create([
                'username' => User::generateUserName($SocialUser->getNickname),
                'email' => $SocialUser->email,
                'provider' => $provider,
                'provider_id' => $SocialUser->getId(),
                'provider_token' => $SocialUser->token,
                'registration_date' => now(),
                'password' => $password
            ]);
            $user->sendEmailVerificationNotification();
            $user->update([
                'password' => Hash::make($password),
            ]);
        }
        Auth::login($user);
        return redirect('/dashboard');

    } catch (\Exception $e) {
        return redirect('/login');
    }

 
 

    
   }
}
