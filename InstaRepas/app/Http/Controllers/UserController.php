<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\DietaryRestriction;

class UserController extends Controller
{
    public function create_account(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->registration_date = now();
        $user->save();

        return back()->with('status', 'Votre compte a été crée avec succès ! ');
    }

    public function access_account(Request $request)
    {
        $this->validate($request, ['email' => 'required', 'password' => 'required']);
    
        $user = $request->only('email', 'password');
    
        if (Auth::attempt($user)) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('user.profile'); // Rediriger vers le profil utilisateur
            }
        } else {
            return back()->with('status', 'Mauvais mot de passe ou email');
        }
    }
    
    public function showProfile()
    {
        $dietaryRestrictions = DietaryRestriction::all();
        return view('profile.index', compact('dietaryRestrictions'));
    }
    
    
    public function showPreferences()
    {
        $dietaryRestrictions = DietaryRestriction::all();
        return view('profile.preferences', ['dietaryRestrictions' => $dietaryRestrictions]);
    }
    
    
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $preferences = $request->input('preferences', []);
        $user->preferences()->sync($preferences);
        return redirect()->route('user.profile')->with('status', 'Votre profil a été mis à jour avec succès !');
    }
    public function preferences()
{
    $dietaryRestrictions = DietaryRestriction::all();
    return view('profile.preferences', compact('dietaryRestrictions'));
}

public function savePreferences(Request $request)
{
    $this->validate($request, [
        'restrictions' => 'nullable|array',
        'restrictions.*' => 'exists:dietary_restrictions,id',
        'seasonal' => 'nullable|boolean',
        'include_snacks' => 'nullable|boolean',
        'days' => 'required|integer|min:1',
    ]);

    $user = Auth::user();
    $user->preferences()->sync($request->input('restrictions'));
    $user->seasonal = $request->input('seasonal');
    $user->include_snacks = $request->input('include_snacks');
    $user->days = $request->input('days');
    $user->save();

    return redirect()->route('user.profile')->with('status', 'Vos préférences ont été enregistrées avec succès !');
}

}
