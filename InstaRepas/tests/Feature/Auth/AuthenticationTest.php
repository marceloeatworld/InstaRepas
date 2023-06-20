<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen with username', function () {
    $user = User::factory()->create([
        'password' => bcrypt($password = 'password'),
    ]);

    $this->flushSession(); // Add this line

    $response = $this->post('/login', [
        'input_type' => $user->username, // include 'username' field as 'input_type'
        'password' => $password,
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertAuthenticated();
});

test('users can authenticate using the login screen with email', function () {
    $user = User::factory()->create([
        'password' => bcrypt($password = 'password'),
    ]);

    $this->flushSession(); // Add this line

    $response = $this->post('/login', [
        'input_type' => $user->email, // include 'email' field as 'input_type'
        'password' => $password,
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'input_type' => $user->email, // include 'email' field as 'input_type'
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
