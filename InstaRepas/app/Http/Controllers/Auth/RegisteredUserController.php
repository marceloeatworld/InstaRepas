<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Concerns\ProtectsAgainstSpam;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    use ProtectsAgainstSpam;

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'formToken' => $this->spamFormToken(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if ($this->isSpam($request)) {
            // Silently drop the submission so bots cannot tell they were detected
            return redirect(RouteServiceProvider::HOME);
        }

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Vérifier si le nom d'utilisateur existe déjà
        $baseUsername = $request->username;
        $username = $baseUsername;
        $counter = 1;

        // Ajouter un suffixe numérique si le nom d'utilisateur existe déjà
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername.$counter;
            $counter++;
        }

        $user = User::create([
            'username' => $username, // Utiliser le nom d'utilisateur potentiellement modifié
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'registration_date' => now(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
