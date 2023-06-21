<?php
namespace Tests\Feature;
use App\Models\User;

// Test pour vérifier que la page de profil est affichée
test('la page de profil est affichée', function () {
    // On crée un nouvel utilisateur à l'aide de la fabrique
    $utilisateur = User::factory()->create();

    // On simule une action de l'utilisateur en se connectant et en se rendant sur la page de profil
    $reponse = $this
        ->actingAs($utilisateur)
        ->get('/profile');

    // On vérifie que la requête s'est terminée avec succès (statut HTTP 200)
    $reponse->assertOk();
});

// Test pour vérifier que les informations du profil peuvent être mises à jour
test('les informations du profil peuvent être mises à jour', function () {
    // On crée un nouvel utilisateur à l'aide de la fabrique
    $utilisateur = User::factory()->create();

    // On simule une action de l'utilisateur en se connectant et en envoyant une requête PATCH à la page de profil
    $reponse = $this
        ->actingAs($utilisateur)
        ->patch('/profile', [
            'username' => 'Utilisateur Test',
            'email' => 'test@example.com',
        ]);

    // On vérifie qu'il n'y a pas d'erreurs dans la session et que l'utilisateur est redirigé vers la page de profil
    $reponse
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    // On rafraîchit les données de l'utilisateur à partir de la base de données
    $utilisateur->refresh();

    // On vérifie que le nom d'utilisateur et l'e-mail ont été mis à jour
    $this->assertSame('Utilisateur Test', $utilisateur->username);
    $this->assertSame('test@example.com', $utilisateur->email);

    // On vérifie que l'adresse e-mail n'est pas vérifiée (car elle a été modifiée)
    $this->assertNull($utilisateur->email_verified_at);
});

// Test pour vérifier que le statut de vérification de l'e-mail ne change pas lorsque l'adresse e-mail reste la même
test('le statut de vérification de l\'email reste inchangé lorsque l\'adresse email est la même', function () {
    // On crée un nouvel utilisateur à l'aide de la fabrique
    $utilisateur = User::factory()->create();

    // On simule une action de l'utilisateur en se connectant et en envoyant une requête PATCH à la page de profil
    $reponse = $this
        ->actingAs($utilisateur)
        ->patch('/profile', [
            'username' => 'Utilisateur Test',
            'email' => $utilisateur->email,
        ]);

    // On vérifie qu'il n'y a pas d'erreurs dans la session et que l'utilisateur est redirigé vers la page de profil
    $reponse
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    // On vérifie que l'adresse e-mail est toujours vérifiée (car elle n'a pas changé)
    $this->assertNotNull($utilisateur->refresh()->email_verified_at);
});

// Test pour vérifier qu'un utilisateur peut supprimer son compte
test('un utilisateur peut supprimer son compte', function () {
    // On crée un nouvel utilisateur à l'aide de la fabrique
    $utilisateur = User::factory()->create();

    // On simule une action de l'utilisateur en se connectant et en envoyant une requête DELETE à la page de profil
    $reponse = $this
        ->actingAs($utilisateur)
        ->delete('/profile', [
            'password' => 'password',
        ]);

    // On vérifie qu'il n'y a pas d'erreurs dans la session et que l'utilisateur est redirigé vers la page d'accueil
    $reponse
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');

    // On vérifie que l'utilisateur n'est plus connecté
    $this->assertGuest();

    // On vérifie que l'utilisateur a bien été supprimé de la base de données
    $this->assertNull($utilisateur->fresh());
});

// Test pour vérifier qu'il faut fournir le bon mot de passe pour supprimer un compte
test('le bon mot de passe doit être fourni pour supprimer un compte', function () {
    // On crée un nouvel utilisateur à l'aide de la fabrique
    $utilisateur = User::factory()->create();

    // On simule une action de l'utilisateur en se connectant et en envoyant une requête DELETE à la page de profil avec un mauvais mot de passe
    $reponse = $this
        ->actingAs($utilisateur)
        ->from('/profile')
        ->delete('/profile', [
            'password' => 'mauvais-password',
        ]);

    // On vérifie qu'il y a une erreur dans la session concernant la suppression de l'utilisateur et que l'utilisateur est redirigé vers la page de profil
    $reponse
        ->assertSessionHasErrorsIn('userDeletion', 'password')
        ->assertRedirect('/profile');

    // On vérifie que l'utilisateur n'a pas été supprimé de la base de données
    $this->assertNotNull($utilisateur->fresh());
});
