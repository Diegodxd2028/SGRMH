@extends('layouts.plantilla_admin')

@section('title', 'Panel de Administración')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Bienvenido, Administrador</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('admin.canjes') }}" class="bg-blue-500 text-white p-6 rounded-lg shadow text-center">
                Ver Historial de Canjes
            </a>
            <a href="{{ route('admin.mensajes') }}" class="bg-green-500 text-white p-6 rounded-lg shadow text-center">
                Ver Mensajes de Atención al Usuario
            </a>
            <a href="{{ route('admin.puntos') }}" class="bg-purple-500 text-white p-6 rounded-lg shadow text-center">
                Añadir Puntos a Usuario
            </a>
        </div>
    </div>
@endsection
