<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MealController;

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

Route::post('/generate-meals', [MealController::class, 'generate'])->name('generate_meals');

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

Route::get('/register', function () {
    return view('register');
});
