@extends('layouts.plantilla')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white shadow-md rounded-2xl flex overflow-hidden w-full max-w-5xl">
    
        <!-- Columna izquierda: Imagen -->
        <div class="hidden md:flex md:w-1/2 items-center justify-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Municipalidad_Provincial_de_Huari.svg/603px-Municipalidad_Provincial_de_Huari.svg.png"
                 alt="Imagen de inicio"
                 class="w-[40%] h-[70%] mx-auto object-contain">
        </div>

        <!-- Columna derecha: Formulario + título -->
        <div class="w-full md:w-1/2 p-8">
            <!-- TÍTULO PRINCIPAL -->
            <h1 class="text-xl font-bold text-center mb-2">Municipalidad de Huari</h1>
            <h2 class="text-2xl font-semibold text-center mb-6">
                Iniciar Sesión @if(isset($rol) && $rol === 'admin') (Administrador) @else (Usuario) @endif
            </h2>

            @if (session('error'))
                <p class="text-red-500 text-sm mb-4 text-center">{{ session('error') }}</p>
            @endif

            <form method="POST" 
                  action="{{ $rol === 'admin' ? route('login.submit.admin') : route('login.submit.usuario') }}" 
                  class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email:</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Contraseña:</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        Iniciar Sesión
                    </button>
                </div>
            </form>

            @if($rol === 'usuario')
                <p class="text-center text-sm text-gray-600 mt-4">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Registrarse</a>
                </p>
            @endif
        </div>
    </div>
</div>
@endsection
