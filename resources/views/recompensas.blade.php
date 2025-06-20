@extends('layouts.plantilla_usuario')

@section('title', 'Recompensas')

@section('content')
<main class="container mx-auto px-4 py-8">

    {{-- Mensajes flash --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6 border border-green-300">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6 border border-red-300">
            {{ session('error') }}
        </div>
    @endif

    <!-- Card de Bienvenida -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8 border-l-4 border-green-500">
        <div class="md:flex md:items-center md:justify-between">
            <div class="md:w-2/3">
                <h1 class="text-2xl font-bold text-gray-800">
                    ¡Bienvenido, <span class="text-green-600">{{ $nombreCompleto }}</span>!
                </h1>
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
            @forelse($recompensas as $r)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-green-100 flex items-center justify-center relative">
                        <img src="{{ $r->imagenurl }}" alt="Imagen de {{ $r->Titulo }}" class="object-cover h-full w-full">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">{{ $r->Titulo }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $r->Descripcion }}</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-green-600">{{ number_format($r->PuntosNecesarios) }} pts</span>

                            @if($r->PuntosNecesarios > $puntos || $r->Stock <= 0)
                                <button class="px-4 py-2 bg-gray-300 text-white text-sm rounded opacity-50 cursor-not-allowed" disabled>
                                    No disponible
                                </button>
                            @else
                                <form action="{{ route('canjes.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="CodRecom" value="{{ $r->CodRecom }}">
                                    <input type="hidden" name="Cantidad" value="1">
                                    <button type="submit" onclick="return confirm('¿Canjear esta recompensa?')" class="px-4 py-2 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition">
                                        Canjear
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-3 text-center">No hay recompensas disponibles por el momento.</p>
            @endforelse
        </div>
    </section>

    <!-- Sección de Historial de Canjes -->
<section class="bg-white rounded-xl shadow-md p-6 mb-12">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Historial de Recompensas Canjeadas</h2>

    @if($canjes->isEmpty())
        <p class="text-gray-500">Aún no has canjeado ninguna recompensa.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-green-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Recompensa</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Cantidad</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Puntos Utilizados</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Fecha</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Estado de Entrega</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($canjes as $canje)
                        <tr>
                            <td class="py-3 px-4 text-gray-800">
                                {{ $canje->recompensa->Titulo ?? 'Recompensa eliminada' }}
                            </td>
                            <td class="py-3 px-4">{{ $canje->Cantidad }}</td>
                            <td class="py-3 px-4">{{ $canje->PuntosUtilizados }}</td>
                            <td class="py-3 px-4">{{ $canje->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-3 px-4">
                                @if ($canje->entregado === 'entregado')
                                    <span class="text-green-600 font-medium">Entregado</span>
                                @else
                                    <span class="text-yellow-600 font-medium">Pendiente</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</section>


    <!-- Sección de Cómo ganar puntos -->
    <section class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">¿Cómo ganar más puntos?</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-green-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Tipo de Residuo</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Cantidad</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Puntos Obtenidos</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Ejemplo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="py-3 px-4 text-gray-800">Papel y Cartón</td>
                        <td class="py-3 px-4">0.5 kg</td>
                        <td class="py-3 px-4">5 puntos</td>
                        <td class="py-3 px-4 text-sm text-gray-600">Si entregas 1 kg de papel, ganas 10 puntos</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-gray-800">Botellas de Plástico</td>
                        <td class="py-3 px-4">1 kg</td>
                        <td class="py-3 px-4">10 puntos</td>
                        <td class="py-3 px-4 text-sm text-gray-600">Si entregas 2 kg, obtienes 20 puntos</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-gray-800">Latas</td>
                        <td class="py-3 px-4">1 kg</td>
                        <td class="py-3 px-4">50 puntos</td>
                        <td class="py-3 px-4 text-sm text-gray-600">1 kg de latas = 50 puntos (S/5 por kg)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-sm text-gray-500">
            También puedes ganar puntos extra por:
            <ul class="list-disc ml-6 mt-2 space-y-1">
                <li>Participar en eventos → <span class="text-green-600 font-medium">+50 puntos</span></li>
                <li>Registrar actividad diaria → <span class="text-green-600 font-medium">+5 puntos</span> por día</li>
            </ul>
        </div>
    </section>

</main>
@endsection
