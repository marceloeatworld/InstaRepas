<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
                return redirect()->route('admin.foods.index');
            } else {
                return redirect('/');
            }
        } else {
            return back()->with('status', 'Mauvais mot de passe ou email');
        }
    }
}