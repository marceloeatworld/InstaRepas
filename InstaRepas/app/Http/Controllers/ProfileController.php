<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\DietaryRestriction;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }




    public function showProfile()
    {
        $dietaryRestrictions = DietaryRestriction::all();
        return view('dashboard', compact('dietaryRestrictions'));
    }


    public function showPreferences()
    {
        $displayNames = [
            'contains_gluten' => 'Sans gluten',
            'contains_fish' => 'Sans poisson',
            'contains_meat' => 'Sans viande',
            'contains_lactose' => 'Sans lactose',
            'contains_animal_products' => 'Sans produit animal',
            'contains_pork' => 'Sans porc',
            'contains_crustacean' => 'Sans crustacé',
        ];
        $dietaryRestrictions = DietaryRestriction::all();

        return view('profile.preferences', ['dietaryRestrictions' => $dietaryRestrictions, 'displayNames' => $displayNames]);

    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $preferences = $request->input('preferences', []);
        $user->preferences()->sync($preferences);
        return redirect()->route('profile.profile')->with('status', 'Votre profil a été mis à jour avec succès !');
    }
        public function preferences()
    {
        $dietaryRestrictions = DietaryRestriction::all();
        return view('profile.preferences', compact('dietaryRestrictions'));
    }


    public function showInformations()
    {
        $personalInfos = Auth::user();
        return view('profile.infos', ['informations' => $personalInfos]);
    }
    public function updatePreferences(Request $request)
    {
        $user = Auth::user();

        $preferences = $request->input('restrictions', []);
        $user->preferences()->sync($preferences);

        // Message de succès et redirection vers la page des préférences
        Session::flash('success', 'Vos préférences ont été modifiées avec succès!');
        return redirect()->route('profile.preferences');
    }


}
