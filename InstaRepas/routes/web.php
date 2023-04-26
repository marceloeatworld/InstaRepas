<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/generate', function () {
    return view('generate');
});

Route::get('/recipes', function () {
    return view('recipes');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/create_account', [UserController::class, 'create_account']);
Route::post('/access_account', [UserController::class, 'access_account']);
// Route::get('/logout', [UserController::class, 'logout']);

// Connexion Google
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
Route::get('/logout', [GoogleAuthController::class, 'logout'])->name('logout');


Route::get('/register', function () {
    return view('register');
});
