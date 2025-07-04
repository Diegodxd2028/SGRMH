@extends('layouts.plantilla_admin')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <p class="text-gray-600 mt-2">Resumen general de la plataforma</p>
        </div>
        <div class="mt-4 md:mt-0">
            <span class="inline-block bg-primary-100 text-primary-800 text-sm px-3 py-1 rounded-full">
                <i class="fas fa-calendar-alt mr-1"></i> {{ now()->format('d M Y') }}
            </span>
        </div>
    </div>

    <!-- Tarjetas de resumen rápido -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Usuarios totales</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $usuariosTotales }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Canjes realizados</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $canjesTotales }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-exchange-alt text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Residuos recolectados</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ number_format($residuosTotales, 2) }} kg</h3>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-recycle text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de gráficos -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <i class="fas fa-chart-line text-primary-600 mr-2"></i> Métricas Principales
            </h2>
        </div>

        <div class="p-6">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Gráfico Pastel -->
                <div class="flex-1 bg-gray-50 p-4 rounded-lg">
                    <div class="flex flex-col items-center w-full">
                        <h3 class="text-lg font-semibold mb-4 flex items-center text-gray-700">
                            <i class="fas fa-chart-pie text-blue-500 mr-2"></i> Residuos por Tipo
                        </h3>
                        <div class="w-full" style="height: 300px;">
                            <canvas id="graficoResiduos"></canvas>
                        </div>
                        <div class="mt-4 text-sm text-gray-500 text-center">
                            Distribución porcentual de los residuos recolectados
                        </div>
                    </div>
                </div>

                <!-- Gráfico de usuarios registrados -->
                <div class="flex-1 bg-gray-50 p-4 rounded-lg">
                    <div class="flex flex-col items-center w-full">
                        <h3 class="text-lg font-semibold mb-4 flex items-center text-gray-700">
                            <i class="fas fa-user-plus text-green-500 mr-2"></i> Usuarios Registrados
                        </h3>
                        <div class="w-full" style="height: 300px;">
                            <canvas id="graficoUsuarios"></canvas>
                        </div>
                        <div class="mt-4 text-sm text-gray-500 text-center">
                            Tendencia de registros en los últimos 7 días
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
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
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
                    borderRadius: 6,
                    hoverBackgroundColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 400
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return context[0].label;
                            },
                            label: function(context) {
                                return `${context.parsed.y} usuarios`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { 
                            stepSize: 1,
                            precision: 0
                        },
                        min: 0,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</div>
@endsection
