<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\DashboardController;
use App\Models\UserPreference;
use App\Models\DietaryRestriction;

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

// Route for the meals generator
Route::get('/generate', [MealController::class, 'generateForm']);


Route::post('/generate-meals', [MealController::class, 'generate'])->name('generate_meals');

//admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

    Route::get('/foods', [FoodController::class, 'index'])->name('admin.foods.index');
    Route::get('/foods/create', [FoodController::class, 'create'])->name('admin.foods.create');
    Route::post('/foods', [FoodController::class, 'store'])->name('admin.foods.store');
    Route::get('/foods/{food}', [FoodController::class, 'show'])->name('admin.foods.show');
    Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('admin.foods.edit');
    Route::put('/foods/{food}', [FoodController::class, 'update'])->name('admin.foods.update');
    Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('admin.foods.destroy');
});




Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/create_account', [UserController::class, 'create_account']);
Route::post('/access_account', [UserController::class, 'access_account']);
// Route::get('/logout', [UserController::class, 'logout']);

// Connexion Google
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
Route::get('/logout', [GoogleAuthController::class, 'logout'])->name('logout');

//voir son profile et autre infos
Route::get('/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('user.profile');
Route::post('/profile', [UserController::class, 'updateProfile'])->middleware('auth')->name('user.updateProfile');
Route::get('/profile/preferences', [UserController::class, 'showPreferences'])->middleware('auth')->name('user.preferences');
Route::post('/profile/preferences', [UserController::class, 'updatePreferences'])->middleware('auth')->name('user.updatePreferences');


Route::get('/profile/informations', [UserController::class, 'ShowInformations'])->middleware('auth')->name('user.informations');

Route::get('/register', function () {
    return view('register');
});
