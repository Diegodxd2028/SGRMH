<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class CajaBlancaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_succeeds_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@correo.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('inicio'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function login_fails_with_wrong_password()
    {
        User::factory()->create([
            'email' => 'juan@correo.com',
            'password' => bcrypt('correctpass'),
        ]);

        $response = $this->post('/login', [
            'email' => 'juan@correo.com',
            'password' => 'wrongpass',
        ]);

        $response->assertSessionHas('error');
        $this->assertGuest();
    }

    /** @test */
    public function login_fails_with_nonexistent_user()
    {
        $response = $this->post('/login', [
            'email' => 'noexiste@correo.com',
            'password' => 'cualquier',
        ]);

        $response->assertSessionHas('error');
        $this->assertGuest();
    }

}
