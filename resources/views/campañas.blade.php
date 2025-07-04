@extends('layouts.plantilla_usuario')

@section('title', 'Campañas Disponibles')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Campañas Disponibles</h1>

    @if($campañas->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded shadow text-center">
            No hay campañas activas por el momento.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($campañas as $campaña)
                <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ $campaña->imagen_url }}" alt="Imagen de la campaña" class="h-48 w-full object-cover">

                    <div class="p-6 flex flex-col justify-between h-full">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $campaña->titulo }}</h2>
                            <p class="text-gray-600 text-sm mb-3">{{ $campaña->descripcion }}</p>

                            <div class="text-sm text-gray-500 mb-2">
                                <strong>Inicio:</strong> {{ \Carbon\Carbon::parse($campaña->fecha_inicio)->format('d/m/Y') }} <br>
                                <strong>Fin:</strong> {{ \Carbon\Carbon::parse($campaña->fecha_fin)->format('d/m/Y') }}
                            </div>

                            <p class="text-green-600 font-bold mb-4">Puntos: {{ $campaña->puntos_campaña }}</p>
                        </div>

                        <form method="POST" action="{{ route('campañas.participar', $campaña->id) }}" class="mt-auto">
                            @csrf
                            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
                                Participar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
