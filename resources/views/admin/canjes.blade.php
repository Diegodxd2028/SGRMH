@extends('layouts.plantilla_admin')

@section('title', 'Historial de Canjes')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Historial de Canjes</h1>
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Usuario</th>
                    <th class="border p-2">Recompensa</th>
                    <th class="border p-2">Cantidad</th>
                    <th class="border p-2">Puntos utilizados</th>
                    <th class="border p-2">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($canjes as $canje)
                    <tr>
                        <td class="border p-2">{{ $canje->usuario->name }}</td>
                        <td class="border p-2">{{ $canje->recompensa->Nombre }}</td>
                        <td class="border p-2">{{ $canje->Cantidad }}</td>
                        <td class="border p-2">{{ $canje->PuntosUtilizados }}</td>
                        <td class="border p-2">{{ $canje->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
