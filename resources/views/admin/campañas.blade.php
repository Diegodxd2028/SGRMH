@extends('layouts.plantilla_admin')

@section('title', 'Gestión de Campañas')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Campañas</h1>

    <!-- Mensajes -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <!-- Formulario agregar campaña -->
    <form action="{{ route('admin.campañas.store') }}" method="POST" class="bg-white p-6 rounded shadow mb-8">
        @csrf
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Título</label>
                <input name="titulo" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Descripción</label>
                <input name="descripcion" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Fecha Fin</label>
                <input type="date" name="fecha_fin" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Puntos</label>
                <input type="number" name="puntos_campaña" min="1" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Imagen (URL)</label>
                <input type="text" name="imagen_url" required class="w-full border p-2 rounded">
            </div>
        </div>
        <button type="submit" class="mt-4 bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
            Agregar Campaña
        </button>
    </form>

    <!-- Lista de campañas -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-green-100">
                <tr>
                    <th class="py-2 px-4">Título</th>
                    <th class="py-2 px-4">Fechas</th>
                    <th class="py-2 px-4">Puntos</th>
                    <th class="py-2 px-4">Imagen</th>
                    <th class="py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campañas as $c)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $c->titulo }}</td>
                    <td class="py-2 px-4">{{ $c->fecha_inicio }} - {{ $c->fecha_fin }}</td>
                    <td class="py-2 px-4">{{ $c->puntos_campaña }}</td>
                    <td class="py-2 px-4"><img src="{{ $c->imagen_url }}" class="h-12 rounded" alt="Imagen campaña"></td>
                    <td class="py-2 px-4">
                        <a href="{{ route('admin.campañas.edit', $c->id) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('admin.campañas.destroy', $c->id) }}" method="POST" class="inline-block ml-2">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('¿Eliminar campaña?')" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
