@extends('layouts.plantilla')

@section('title', 'Recompensas')

@section('content')
<main class="container mx-auto px-4 py-8">
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
        <h2 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-6">Recompensas Disponibles</h2>
        

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
                            <span class="font-bold text-green-600">{{ number_format($recompensa->PuntosNecesarios) }} pts</span>
                            <button 
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
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">No hay recompensas disponibles en este momento.</p>
                </div>
            @endforelse
        </div>
    </section>

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