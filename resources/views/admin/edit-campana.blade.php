@extends('layouts.plantilla_admin')

@section('title', 'Editar Campaña')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Editar Campaña</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.campañas.update', $campaña->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Título</label>
                <input name="titulo" value="{{ $campaña->titulo }}" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Descripción</label>
                <input name="descripcion" value="{{ $campaña->descripcion }}" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" value="{{ $campaña->fecha_inicio }}" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Fecha Fin</label>
                <input type="date" name="fecha_fin" value="{{ $campaña->fecha_fin }}" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Puntos</label>
                <input type="number" name="puntos_campaña" value="{{ $campaña->puntos_campaña }}" min="1" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Imagen (URL)</label>
                <input type="text" name="imagen_url" value="{{ $campaña->imagen_url }}" required class="w-full border p-2 rounded">
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            Actualizar Campaña
        </button>
    </form>
</div>
@endsection
