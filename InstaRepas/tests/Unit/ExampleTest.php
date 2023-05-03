<?php

namespace Tests\Unit;

use App\Models\Food;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FoodTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_food_belongs_to_a_user()
    {
        // Créer un utilisateur
        $user = User::factory()->create();

        // Créer un nouvel enregistrement Food avec un user_id valide
        $food = Food::factory()->create([
            'user_id' => $user->id,
        ]);

        // Vérifier si le user_id est correctement défini
        $this->assertEquals($user->id, $food->user_id);
    }
}
