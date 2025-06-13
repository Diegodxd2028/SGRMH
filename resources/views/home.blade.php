@extends('layouts.plantilla')

@section('title', 'Inicio')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white shadow-md rounded-2xl p-8 text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Bienvenido, {{ Auth::user()->name }}</h1>

        <p class="text-gray-600 mb-6">Has iniciado sesión correctamente.</p>

    </div>
</div>
@endsection
