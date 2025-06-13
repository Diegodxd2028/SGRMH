@extends('layouts.plantilla_admin')

@section('title', 'Añadir Puntos')

@section('content')
    <div class="container mx-auto p-6 max-w-xl">
        <h1 class="text-2xl font-bold mb-6">Añadir Puntos a un Usuario</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.puntos') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium mb-1">DNI del Usuario:</label>
                <input type="text" name="dni" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Cantidad de puntos:</label>
                <input type="number" name="puntos" class="w-full border p-2 rounded" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Añadir Puntos
            </button>
        </form>
    </div>
@endsection
