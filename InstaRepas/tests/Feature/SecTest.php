<?php

use App\Models\User;

test('un utilisateur non authentifié est redirigé vers la page de connexion', function () {
    $response = $this->get('/admin');

    $response->assertRedirect('/login'); // Vérifie que la requête est redirigée vers la page de connexion
});
