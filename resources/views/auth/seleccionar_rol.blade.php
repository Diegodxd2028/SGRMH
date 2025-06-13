@extends('layouts.plantilla')

@section('title', 'Seleccionar Rol')

@section('content')
<main class="container mx-auto px-4 py-16 text-center">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">¿Cómo deseas iniciar sesión?</h1>

    <div class="flex justify-center space-x-8">
        <a href="{{ route('login.form.usuario') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-lg">
            Usuario
        </a>
        <a href="{{ route('login.form.admin') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg">
            Administrador
        </a>
    </div>
</main>
@endsection
