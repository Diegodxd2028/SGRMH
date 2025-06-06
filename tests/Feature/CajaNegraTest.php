<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CajaNegraTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_fails_with_invalid_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'fake@correo.com',
            'password' => 'incorrecto',
        ]);

        // Laravel redirige al referer o a "/" por defecto
        $response->assertRedirect('/');
        $response->assertSessionHas('error', 'Credenciales incorrectas.');
    }

    /** @test */
    public function login_succeeds_with_valid_credentials()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'usuario@correo.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'usuario@correo.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('inicio'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function register_succeeds_with_valid_data()
    {
        $response = $this->post('/register', [
            'name' => 'Nuevo Usuario',
            'email' => 'nuevo@correo.com',
            'password' => 'clave1234',
            'password_confirmation' => 'clave1234',
        ]);

        $response->assertRedirect(route('inicio'));
        $this->assertAuthenticated();
    }

    /** @test */
    public function register_fails_with_invalid_email()
    {
        $response = $this->post('/register', [
            'name' => 'Juan',
            'email' => 'correo-no-valido',
            'password' => 'clave1234',
            'password_confirmation' => 'clave1234',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

}
