@extends('layouts.plantilla')

@section('title', 'Historial de Canjes')

@section('content')
<main class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tu historial de canjes</h1>
        <a href="{{ route('recompensas') }}" class="text-green-600 hover:underline">
            Volver a recompensas
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Recompensa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Puntos</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($canjes as $canje)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $canje->recompensa->Titulo }}</td>
                        <td class="px-6 py-4">{{ Str::limit($canje->recompensa->Descripcion, 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-red-500">-{{ number_format($canje->PuntosUtilizados) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $canje->Cantidad }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $canje->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            No has canjeado ninguna recompensa aún.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($canjes->hasPages())
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            {{ $canjes->links() }}
        </div>
        @endif
    </div>
</main>
@endsection