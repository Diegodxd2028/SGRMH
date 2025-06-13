@extends('layouts.plantilla_admin')

@section('title', 'Mensajes de Atención')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Mensajes de Atención al Usuario</h1>
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">Correo</th>
                    <th class="border p-2">Teléfono</th>
                    <th class="border p-2">Asunto</th>
                    <th class="border p-2">Mensaje</th>
                    <th class="border p-2">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mensajes as $mensaje)
                    <tr>
                        <td class="border p-2">{{ $mensaje->nombre }}</td>
                        <td class="border p-2">{{ $mensaje->email }}</td>
                        <td class="border p-2">{{ $mensaje->telefono }}</td>
                        <td class="border p-2">{{ $mensaje->asunto }}</td>
                        <td class="border p-2">{{ $mensaje->mensaje }}</td>
                        <td class="border p-2">{{ $mensaje->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
