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

        @php
            $recompensasFijas = [
                ['titulo' => 'Recarga de S/5', 'imagen' => 'img/recargas.png', 'descripcion' => 'Gana una recarga gratis por canjear tus puntos!!!', 'puntos' => 150],
                ['titulo' => 'Caja de Agua', 'imagen' => 'img/cajacielo.png', 'descripcion' => 'Gana un pack de botellas de agua Cielo!!!', 'puntos' => 200],
                ['titulo' => 'Canasta para el Hogar', 'imagen' => 'img/canasta.jpg', 'descripcion' => 'Gana una canasta para el hogar!!!', 'puntos' => 500],
                ['titulo' => 'Sesión de fotos', 'imagen' => 'img/sesiondefotos.jpg', 'descripcion' => 'Gana una sesión de fotos completamente gratis!!!', 'puntos' => 600],
                ['titulo' => 'Saco de Arroz Tonderito', 'imagen' => 'img/ARROZ-TONDRITO.jpg', 'descripcion' => 'Gana un saco de arroz tonderito gratis!!!', 'puntos' => 1000],
                ['titulo' => 'Pollo familiar Entero', 'imagen' => 'img/pollo.jpg', 'descripcion' => 'Gana un pollo familiar Entero mas Adicionales Completamente Gratis!!!', 'puntos' => 1200],
            ];
        @endphp

        <!-- Grid de Recompensas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($recompensasFijas as $r)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-green-100 flex items-center justify-center relative">
                        <img src="{{ asset($r['imagen']) }}" alt="Imagen de {{ $r['titulo'] }}" class="object-cover h-full w-full">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">{{ $r['titulo'] }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $r['descripcion'] }}</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-green-600">{{ number_format($r['puntos']) }} pts</span>
                            <button 
                                class="px-4 py-2 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition"
                                @if($r['puntos'] > $puntos) disabled class="opacity-50 cursor-not-allowed" @endif
                            >
                                @if($r['puntos'] > $puntos)
                                    Insuficientes
                                @else
                                    Canjear
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
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
