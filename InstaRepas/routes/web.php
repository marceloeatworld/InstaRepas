<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProviderController;

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


// Route for the meals generator
Route::get('/generate', [MealController::class, 'generateForm'])->name('generate');
Route::post('/generate-meals', [MealController::class, 'generate'])->name('generate_meals');

//admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

    //gerer les aliments
    Route::get('/foods', [FoodController::class, 'index'])->name('admin.foods.index');
    Route::get('/foods/create', [FoodController::class, 'create'])->name('admin.foods.create');
    Route::post('/foods', [FoodController::class, 'store'])->name('admin.foods.store');
    Route::get('/foods/{food}', [FoodController::class, 'show'])->name('admin.foods.show');
    Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('admin.foods.edit');
    Route::put('/foods/{food}', [FoodController::class, 'update'])->name('admin.foods.update');
    Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('admin.foods.destroy');

    //gerer les utilisateurs
    Route::get('/users', [DashboardController::class, 'users'])->name('admin.users.index');
    Route::put('/users/{user}/admin', [DashboardController::class, 'toggleAdmin'])->name('admin.users.toggleAdmin');
    Route::put('/users/{user}/points', [DashboardController::class, 'updatePoints'])->name('admin.users.updatePoints');
    Route::delete('/users/{user}', [DashboardController::class, 'destroy'])->name('admin.users.destroy');
    
});

//recettes accecible a tous
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');



//google login
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //preferences
    Route::get('/profile/preferences', [ProfileController::class, 'showPreferences'])->name('profile.preferences');
    Route::post('/profile/preferences', [ProfileController::class, 'updatePreferences'])->name('profile.updatePreferences');

    //recettes cree etc...
    Route::get('/profile/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');

});



require __DIR__.'/auth.php';
