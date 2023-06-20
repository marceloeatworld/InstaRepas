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
        $foodData = Food::factory()->make([
            'user_id' => $this->admin->id,
        ]); 

        // Convertir le nom de la nourriture en minuscules pour le rendre insensible à la casse
        $foodData->name = strtolower($foodData->name);

        $foodDataArray = $foodData->toArray();

        $response = $this->actingAs($this->admin)->post('/admin/foods', $foodDataArray);

        $response->assertStatus(302); 
        $response->assertRedirect('/admin/foods/create'); 

        // Convertir le nom de la nourriture en minuscules dans les données de test
        $foodDataArray['name'] = strtolower($foodDataArray['name']);
        $this->assertDatabaseHas('foods', $foodDataArray);
    }

    // Test de lecture d'un aliment existant
    public function test_read_food(): void
    {
        $food = Food::factory()->create();

        $response = $this->actingAs($this->admin)->get("/admin/foods/{$food->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('admin.foods.edit');
        $response->assertViewHas('food', $food);
    }

    // Test de mise à jour d'un aliment existant
    public function test_update_food(): void
    {
        $food = Food::factory()->create();
        $updatedFoodData = Food::factory()->make()->toArray();

        // Convertir le nom de la nourriture en minuscules pour le rendre insensible à la casse
        $updatedFoodData['name'] = strtolower($updatedFoodData['name']);

        $response = $this->actingAs($this->admin)->put("/admin/foods/{$food->id}", $updatedFoodData);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/foods');
        $this->assertDatabaseHas('foods', $updatedFoodData);
    }

    // Test de suppression d'un aliment existant
    public function test_delete_food(): void
    {
        $food = Food::factory()->create();

        $response = $this->actingAs($this->admin)->delete("/admin/foods/{$food->id}");

        $response->assertStatus(302);
        $response->assertRedirect('/admin/foods');
        $this->assertDatabaseMissing('foods', $food->toArray());
    }
}
