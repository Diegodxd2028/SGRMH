<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('inicio');
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas.');
    }

    // Mostrar formulario de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Procesar registro
    public function register(Request $request)
    {
        $validatedData = $request->validate([
        'DNI' => 'required|numeric|digits:8|unique:users,DNI',
        'name' => 'required|string|max:50',
        'apellido_paterno' => 'required|string|max:50',
        'apellido_materno' => 'required|string|max:50',
        'direccion' => 'required|string|max:50',
        'Celular' => 'required|numeric|digits:9|unique:users,Celular',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ]);

        $user = User::create([
        'DNI' => $validatedData['DNI'],
        'name' => $validatedData['name'],
        'apellido_paterno' => $validatedData['apellido_paterno'],
        'apellido_materno' => $validatedData['apellido_materno'],
        'direccion' => $validatedData['direccion'],
        'Celular' => $validatedData['Celular'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

        Auth::login($user);

        return redirect()->route('inicio')->with('success', '¡Registro exitoso!');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
