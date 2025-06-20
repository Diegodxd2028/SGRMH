@extends('layouts.plantilla_admin')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Bienvenido, Administrador</h1>


    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-xl font-semibold mb-6 text-center">Residuos                                             </h2>

        <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-6">
            {{-- Gráfico Pastel --}}
            <div class="flex justify-center w-full md:w-auto">
                <canvas id="graficoResiduos" class="w-60 h-60 md:w-96 md:h-96"></canvas>
            </div>

            {{-- Botones al lado del gráfico --}}
            <div class="grid grid-cols-1 gap-4 w-full md:w-64">
                <a href="{{ route('admin.canjes') }}" class="bg-blue-500 text-white p-4 rounded-lg shadow text-center hover:bg-blue-600">
                    Ver Historial de Canjes
                </a>
                <a href="{{ route('admin.mensajes') }}" class="bg-green-500 text-white p-4 rounded-lg shadow text-center hover:bg-green-600">
                    Ver Mensajes de Atención al Usuario
                </a>
                <a href="{{ route('admin.puntos') }}" class="bg-purple-500 text-white p-4 rounded-lg shadow text-center hover:bg-purple-600">
                    Añadir Puntos a Usuario
                </a>
                <a href="{{ route('admin.recompensas.create') }}" class="bg-yellow-500 text-white p-4 rounded-lg shadow text-center hover:bg-yellow-600">
                    Agregar Nueva Recompensa
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Cargar Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('graficoResiduos').getContext('2d');

    const tipos = {!! json_encode($residuosData->keys()) !!};
    const cantidades = {!! json_encode($residuosData->values()) !!};

    const nombresAmigables = {
        papel_carton: "Papel y Cartón",
        botellas_plastico: "Botellas de Plástico",
        latas: "Latas"
    };

    const etiquetas = tipos.map(tipo => nombresAmigables[tipo] || tipo);

    const data = {
        labels: etiquetas,
        datasets: [{
            data: cantidades,
            backgroundColor: ['#4ade80', '#60a5fa', '#facc15', '#f87171', '#a78bfa'],
            borderWidth: 1
        }]
    };

    new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#374151',
                        font: {
                            size: 13
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
