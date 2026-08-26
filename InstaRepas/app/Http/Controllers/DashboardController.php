<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function toggleAdmin(Request $request, User $user)
    {
        $request->validate([
            'is_admin' => 'required|boolean',
        ]);
    
        $user->forceFill(['is_admin' => $request->boolean('is_admin')])->save();
        return redirect()->route('admin.users.index');
    }
    
    public function updatePoints(Request $request, User $user)
    {
        $request->validate([
            'points' => 'required|integer',
        ]);
    
        $user->forceFill(['points' => $request->integer('points')])->save();
        return redirect()->route('admin.users.index');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    


}
