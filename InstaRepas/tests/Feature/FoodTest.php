<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FoodTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Création d'un utilisateur administrateur
        $this->admin = User::factory()->create([
            'id' => 17,
            'is_admin' => true,
        ]);
    }
        // Test de création d'un aliment
        public function test_create_food(): void
        {
            // En utilisant make() sans toArray(), on garde l'objet intact (et non un tableau) ce qui nous permet de changer les attributs manuellement.
            $foodData = Food::factory()->make([
                'user_id' => $this->admin->id, // Utilisez l'ID de l'administrateur que vous avez créé
            ]); 
            
            // On convertit ensuite l'objet en tableau pour le passage de données dans la requête.
            $foodDataArray = $foodData->toArray();

            $response = $this->actingAs($this->admin)->post('/admin/foods', $foodDataArray);

            $response->assertStatus(302); 
            $response->assertRedirect('/admin/foods/create'); 
            $this->assertDatabaseHas('foods', $foodDataArray);
        }



       // Test de lecture d'un aliment existant
        public function test_read_food(): void
        {
            $food = Food::factory()->create();

            $response = $this->actingAs($this->admin)->get("/admin/foods/{$food->id}/edit");

            $response->assertStatus(200);
            $response->assertViewIs('admin.foods.edit'); //verifie la bonne vue
            $response->assertViewHas('food', $food); // verifie que la vue a bien l'aliment
        }

    
        // Test de mise à jour d'un aliment existant
        public function test_update_food(): void
        {
            $food = Food::factory()->create();
            $updatedFoodData = Food::factory()->make()->toArray();
    
            $response = $this->actingAs($this->admin)->put("/admin/foods/{$food->id}", $updatedFoodData);
    
            $response->assertStatus(302); // Modifiez le code d'état attendu en 302
            $response->assertRedirect('/admin/foods'); // Vérifiez que la redirection est correcte
            $this->assertDatabaseHas('foods', $updatedFoodData);
        }
    
        // Test de suppression d'un aliment existant
        public function test_delete_food(): void
        {
            $food = Food::factory()->create();
    
            $response = $this->actingAs($this->admin)->delete("/admin/foods/{$food->id}");
    
            $response->assertStatus(302); // Modifiez le code d'état attendu en 302
            $response->assertRedirect('/admin/foods'); // Vérifiez que la redirection est correcte
            $this->assertDatabaseMissing('foods', $food->toArray());
        }


}
