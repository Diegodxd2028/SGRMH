@extends('layouts.plantilla_admin')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Bienvenido, Administrador</h1>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-xl font-semibold mb-6 text-center">Resumen General</h2>

        {{-- Contenedor para ambos gráficos en paralelo --}}
        <div class="flex flex-col md:flex-row gap-8">
            {{-- Gráfico Pastel --}}
            <div class="flex-1">
                <div class="flex flex-col items-center w-full mb-4">
                    <h3 class="text-lg font-semibold mb-2">Residuos por Tipo</h3>
                    <div class="w-full" style="height: 300px;">
                        <canvas id="graficoResiduos"></canvas>
                    </div>
                </div>
            </div>

            {{-- Gráfico de usuarios registrados --}}
            <div class="flex-1">
                <div class="flex flex-col items-center w-full mb-4">
                    <h3 class="text-lg font-semibold mb-2">Usuarios Registrados (Últimos 7 días)</h3>
                    <div class="w-full" style="height: 300px;">
                        <canvas id="graficoUsuarios"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Cargar Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Gráfico pastel - residuos
    const ctxResiduos = document.getElementById('graficoResiduos').getContext('2d');
    const residuosData = {
        labels: {!! json_encode($residuosData->keys()) !!}.map(tipo => ({
            papel_carton: "Papel y Cartón",
            botellas_plastico: "Botellas de Plástico",
            latas: "Latas"
        })[tipo] || tipo),
        datasets: [{
            data: {!! json_encode($residuosData->values()) !!},
            backgroundColor: ['#4ade80', '#60a5fa', '#facc15', '#f87171', '#a78bfa'],
            borderWidth: 1
        }]
    };
    new Chart(ctxResiduos, {
        type: 'pie',
        data: residuosData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#374151',
                        font: { size: 14 }
                    }
                }
            }
        }
    });

    // Gráfico barras - usuarios registrados
    const ctxUsuarios = document.getElementById('graficoUsuarios').getContext('2d');
    new Chart(ctxUsuarios, {
        type: 'bar',
        data: {
            labels: {!! json_encode($usuariosPorDia->keys()) !!},
            datasets: [{
                label: 'Usuarios Registrados',
                data: {!! json_encode($usuariosPorDia->values()) !!},
                backgroundColor: '#60a5fa',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 400
            },
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { 
                        stepSize: 1,
                        precision: 0
                    },
                    min: 0
                }
            }
        }
    });
</script>
@endsection