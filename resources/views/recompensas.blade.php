@extends('layouts.plantilla')

@section('title', 'Recompensas')

@section('content')
<main class="container mx-auto px-4 py-8">
    <!-- Notificaciones -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            {{ session('success') }}
            @if(session('recompensaCanjeada'))
                <p class="font-bold">Recompensa: {{ session('recompensaCanjeada') }}</p>
            @endif
        </div>
    @endif
    
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
            {{ session('error') }}
        </div>
    @endif

    <!-- Card de Bienvenida -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8 border-l-4 border-green-500">
        <div class="md:flex md:items-center md:justify-between">
            <div class="md:w-2/3">
                <h1 class="text-2xl font-bold text-gray-800">¡Bienvenido, <span class="text-green-600">{{ $nombreCompleto }}</span>!</h1>
                <p class="mt-2 text-gray-600">Descubre las recompensas disponibles para ti</p>
            </div>
            <div class="mt-4 md:mt-0 md:w-1/3">
                <div class="bg-gray-50 rounded-lg p-4 text-center shadow-inner">
                    <p class="text-sm font-medium text-gray-500">TUS PUNTOS</p>
                    <p class="text-3xl font-bold text-green-600">{{ number_format($puntos) }}</p>
                    <span class="text-xs text-gray-400">puntos acumulados</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Recompensas -->
    <section class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Recompensas Disponibles</h2>
            <a href="{{ route('canjes.historial') }}" class="text-sm text-green-600 hover:underline">
                Ver mi historial de canjes
            </a>
        </div>
        
        <!-- Grid de Recompensas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($recompensas as $recompensa)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition {{ !$recompensa->isAvailable() ? 'opacity-70' : '' }}">
                    <div class="h-48 bg-green-100 flex items-center justify-center relative">
                        <span class="text-5xl">🎁</span>
                        @if($recompensa->EsTemporal)
                            <span class="absolute top-2 right-2 bg-yellow-400 text-xs font-bold px-2 py-1 rounded-full">
                                Temporal
                            </span>
                        @endif
                        @if(!$recompensa->isAvailable())
                            <span class="absolute bottom-2 left-2 bg-red-400 text-white text-xs font-bold px-2 py-1 rounded-full">
                                Agotado
                            </span>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">{{ $recompensa->Titulo }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $recompensa->Descripcion }}</p>
                        
                        @if($recompensa->EsTemporal)
                            <div class="text-xs text-gray-500 mb-2">
                                <p>Disponible del {{ $recompensa->FechaInicio->format('d/m/Y') }} al {{ $recompensa->FechaFin->format('d/m/Y') }}</p>
                            </div>
                        @endif
                        
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-green-600">{{ number_format($recompensa->PuntosNecesarios) }} pts</span>
                                @if($recompensa->canjes_count > 0)
                                    <span class="text-xs text-gray-500 ml-2">(Canjeada {{ $recompensa->canjes_count }} vez{{ $recompensa->canjes_count > 1 ? 'es' : '' }})</span>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('recompensas.canjear', $recompensa->CodRecom) }}">
                                @csrf
                                <div class="flex items-center gap-2">
                                    @if($recompensa->Stock > 1)
                                        <input type="number" name="cantidad" min="1" max="{{ min(5, $recompensa->Stock) }}" 
                                               class="w-16 px-2 py-1 border rounded text-sm" value="1">
                                    @endif
                                    <button 
                                        type="submit"
                                        class="px-4 py-2 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition disabled:opacity-50 disabled:cursor-not-allowed"
                                        @if(!$recompensa->isAvailable() || $recompensa->PuntosNecesarios > $puntos) disabled @endif
                                    >
                                        @if($recompensa->PuntosNecesarios > $puntos)
                                            Insuficientes
                                        @else
                                            Canjear
                                        @endif
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">No hay recompensas disponibles en este momento.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Historial reciente -->
    @if($historialCanjes->count() > 0)
    <section class="bg-white rounded-xl shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tus canjes recientes</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Recompensa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Puntos</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($historialCanjes as $canje)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $canje->recompensa->Titulo }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-red-500">-{{ number_format($canje->PuntosUtilizados) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $canje->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @endif

    <!-- Sección de Puntos -->
    <section class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">¿Cómo ganar más puntos?</h2>
        <ul class="space-y-3">
            <li class="flex items-start">
                <div class="flex-shrink-0 h-6 w-6 text-green-500 mr-2">✓</div>
                <p class="text-gray-700">+10 puntos por cada kg de material reciclado</p>
            </li>
            <li class="flex items-start">
                <div class="flex-shrink-0 h-6 w-6 text-green-500 mr-2">✓</div>
                <p class="text-gray-700">+50 puntos por participar en eventos</p>
            </li>
            <li class="flex items-start">
                <div class="flex-shrink-0 h-6 w-6 text-green-500 mr-2">✓</div>
                <p class="text-gray-700">+5 puntos por día al registrar actividad</p>
            </li>
        </ul>
    </section>
</main>
@endsection