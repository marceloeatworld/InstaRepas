<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function create_account(Request $request){
        $this->validate($request, [ 'lastname' => 'required',
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4']);

                // J'appelle ma table user dans ma bdd
                $user = new User();
                // J'indique nom, prenom , l'email et le mdp
                $user->lastname = $request->input('lastname');
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                // J'enregistre
                $user->save();

                return back()->with('status', 'Votre compte a été crée avec succès ! ');
    }


    // public function access_account (Request $request){
    //     $this->validate($request, ['email' => 'required', 'password' => 'required']);

    //     $user = User::where('email', $request->input('email'))->first();

    //     if ($user) {

    //         if (Hash::check($request->input('password'), $user->password)) {

    //             Session::put('user', $user);
    //             return redirect('/');
    //         } else {

    //             return back()->with('status', 'Mauvais mot de passe ou email');
    //         }

    //     } else {
    //         return back()->with('status', 'Pas de compte avec cet email, veuillez créer un compte.');
    //     }

    // }

    public function access_account(Request $request)
{
    $this->validate($request, ['email' => 'required', 'password' => 'required']);

    $user = $request->only('email', 'password');

    if (Auth::attempt($user)) {
        return redirect('/');
    } else {
        return back()->with('status', 'Mauvais mot de passe ou email');
    }
}

// public function logout()
// {
//     Auth::logout();
//     return redirect('/');
// }


    // public function logout(){
    //     Session::forget('user');

    //     return back();
    // }

}
