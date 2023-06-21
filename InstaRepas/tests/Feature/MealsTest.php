<?php
// Importation des classes nécessaires pour le script
use App\Models\User;
use App\Models\Food;
use App\Models\Season;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;


// Cette fonction indique que tous les tests de ce fichier appartiennent au groupe "meal"
uses()->group('meal');

// Cette fonction est exécutée avant chaque test
beforeEach(function () {
    // Création d'un nouvel utilisateur et connexion en tant que cet utilisateur
    $this->user = User::factory()->create();
    Auth::login($this->user);

    // Création de 50 catégories d'aliments
    $categories = collect(range(1, 50))->map(function ($index) {
        return \App\Models\FoodCategory::firstOrCreate(['name' => "Category $index"]);
    });

    // Création de 50 aliments, chacun dans une catégorie unique
    $categories->each(function ($category, $index) {
        Food::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $category->id,
        ]);
    });
});

// Premier test
test('vérifie que la page de génération de repas est accessible', function () {
    $response = $this->get('/generate');

    $response->assertStatus(200); // Vérifie que le statut de la réponse est 200 (OK)
    $response->assertViewIs('meals.generate'); // Vérifie que la bonne vue est renvoyée
});

// Deuxième test
test('vérifie que le menu peut être généré sans restrictions', function () {
    $response = $this->post('/generate-meals', []);

    $response->assertStatus(200); // Vérifie que le statut de la réponse est 200 (OK)
    $response->assertViewIs('meals.meals'); // Vérifie que la bonne vue est renvoyée
});

// Troisième test
test('vérifie que le menu peut être généré avec deux restrictions', function () {
    $response = $this->post('/generate-meals', [
        'restrictions' => ['contains_meat', 'contains_gluten']
    ]);

    $response->assertStatus(200); // Vérifie que le statut de la réponse est 200 (OK)
    $response->assertViewIs('meals.meals'); // Vérifie que la bonne vue est renvoyée
});

// Quatrième test
test('vérifie que le menu peut être généré pour trois jours', function () {
    $response = $this->post('/generate-meals', [
        'days' => 3
    ]);

    $response->assertStatus(200); // Vérifie que le statut de la réponse est 200 (OK)
    $response->assertViewIs('meals.meals'); // Vérifie que la bonne vue est renvoyée
    $response->assertViewHas('breakfasts'); // Vérifie que la vue a une variable 'breakfasts'
    $response->assertViewHas('lunches'); // Vérifie que la vue a une variable 'lunches'
    $response->assertViewHas('dinners'); // Vérifie que la vue a une variable 'dinners'

    // Vérifie qu'il y a bien 3 repas par jour
    $breakfasts = $response->viewData('breakfasts');
    $lunches = $response->viewData('lunches');
    $dinners = $response->viewData('dinners');

    $this->assertCount(3, $breakfasts); // Vérifie que le nombre de petits déjeuners est 3
    $this->assertCount(3, $lunches); // Vérifie que le nombre de déjeuners est 3
    $this->assertCount(3, $dinners); // Vérifie que le nombre de dîners est 3
});
