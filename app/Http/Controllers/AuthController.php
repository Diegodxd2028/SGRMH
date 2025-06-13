<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de login para usuario
    public function showLoginFormUsuario()
    {
        return view('auth.login', ['rol' => 'usuario']);
    }

    // Mostrar formulario de login para administrador
    public function showLoginFormAdmin()
    {
        return view('auth.login', ['rol' => 'admin']);
    }

    // Procesar login de usuario
    public function loginUsuario(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['rol'] = 'usuario';

        if (Auth::attempt($credentials)) {
            return redirect()->route('inicio'); // Usuario redirigido a ruta principal
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas o no tiene rol de usuario.');
    }

    // Procesar login de administrador
    public function loginAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['rol'] = 'admin';

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard'); // Admin redirigido a dashboard
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas o no tiene rol de administrador.');
    }

    // Mostrar formulario de registro (solo para usuarios)
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Procesar registro (rol por defecto: usuario)
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
            'rol' => 'usuario', // rol por defecto
        ]);

        Auth::login($user);

        return redirect()->route('inicio')->with('success', '¡Registro exitoso!');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('seleccionar-rol');
    }
}
