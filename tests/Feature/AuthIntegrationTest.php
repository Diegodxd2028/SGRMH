<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use Tests\TestCase;

class AuthIntegrationTest extends TestCase
{
    use DatabaseMigrations; // Esto asegura que la base de datos se restablezca antes de cada prueba

    /** @test */
    public function test_user_login_integration()
    {
        // Crear un usuario con datos reales
        $user = User::factory()->create([
            'email' => 'test@correo.com',
            'password' => bcrypt('password123'), // Aquí se encripta la contraseña
        ]);

        // Simular un login con el usuario creado
        $response = $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password123',
        ]);

        // Verificar que se redirige a la ruta de inicio
        $response->assertRedirect(route('inicio'));

        // Verificar que el usuario esté autenticado
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function test_user_can_register_successfully()
    {
        $response = $this->post('/register', [
            'name' => 'Juan Test',
            'email' => 'juan@example.com',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword',
        ]);

        $response->assertRedirect(route('inicio'));
        $this->assertDatabaseHas('users', ['email' => 'juan@example.com']);
        $this->assertAuthenticated();
    }

    /** @test */
    public function test_registration_fails_with_unmatched_passwords()
    {
        $response = $this->post('/register', [
            'name' => 'Carlos',
            'email' => 'carlos@example.com',
            'password' => '12345678',
            'password_confirmation' => '123456789',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    /** @test */
    public function test_login_fails_with_invalid_credentials()
    {
        User::factory()->create([
            'email' => 'test@correo.com',
            'password' => bcrypt('correctpassword'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHas('error');
        $this->assertGuest();
    }

    /** @test */
    public function test_authenticated_user_can_access_protected_route()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/inicio');

        $response->assertStatus(200);
        $response->assertSee('Bienvenido');
    }
}
