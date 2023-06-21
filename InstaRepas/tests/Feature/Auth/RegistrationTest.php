<?php

use App\Providers\RouteServiceProvider;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $username = 'Test User';
    $email = 'test@example.com';
    $password = 'password';

    $response = $this->post('/register', [
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'password_confirmation' => $password,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);

    // Verify that the user was created in the database
    $this->assertDatabaseHas('users', [
        'username' => $username,
        'email' => $email,
    ]);
});
