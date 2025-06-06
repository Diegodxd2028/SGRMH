@extends('layouts.plantilla')

@section('title', 'Quiénes Somos - Municipalidad de Huari')

@section('content')
<main class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="bg-green-50 rounded-xl shadow-md overflow-hidden mb-12">
        <div class="md:flex">
            <div class="p-8 md:p-12 md:w-2/3">
                <div class="flex items-center mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Municipalidad_Provincial_de_Huari.svg/603px-Municipalidad_Provincial_de_Huari.svg.png" alt="Escudo de Huari" class="h-16 mr-4">
                    <h1 class="text-4xl font-bold text-gray-800">Programa de Reciclaje<br>Municipalidad Provincial de Huari</h1>
                </div>
                <p class="text-lg text-gray-600 mb-6">
                    Somos una iniciativa de la Municipalidad Provincial de Huari comprometida con el cuidado ambiental 
                    de nuestra provincia, promoviendo la cultura del reciclaje a través de un sistema innovador 
                    de recompensas para nuestros vecinos.
                </p>
                <div class="bg-green-100 border-l-4 border-green-500 p-4">
                    <p class="text-green-700 font-medium">
                        "Juntos transformamos Huari en una provincia más limpia y sostenible"
                    </p>
                </div>
            </div>
            <div class="hidden md:block md:w-1/3 bg-green-100 bg-[url('https://provinciadehuari.b-cdn.net/wp-content/uploads/DSC5644-scaled.jpg')] bg-cover bg-center">
                <!-- Imagen de Huari -->
            </div>
        </div>
    </div>

    <!-- Misión y Visión -->
    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Misión -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
            <div class="flex items-center mb-4">
                <div class="bg-green-500 p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Nuestra Misión</h2>
            </div>
            <p class="text-gray-600">
                Promover la gestión integral de residuos sólidos en la provincia de Huari, fomentando 
                la participación activa de nuestros vecinos a través de un sistema de incentivos que 
                reconozca su compromiso con el reciclaje y el cuidado del medio ambiente.
            </p>
        </div>

        <!-- Visión -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
            <div class="flex items-center mb-4">
                <div class="bg-green-500 p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Nuestra Visión</h2>
            </div>
            <p class="text-gray-600">
                Ser reconocidos como un modelo de gestión municipal de residuos sólidos en la región Áncash, 
                logrando que Huari sea una provincia limpia, sostenible y con ciudadanos ambientalmente 
                responsables para el año 2030.
            </p>
        </div>
    </div>

    <!-- Nuestros Valores -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Pilares de Nuestro Programa</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Valor 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-green-600 mb-3">Sostenibilidad Ambiental</h3>
                <p class="text-gray-600">
                    Implementamos prácticas que protegen los recursos naturales de Huari, reduciendo 
                    el impacto ambiental de los residuos sólidos.
                </p>
            </div>
            
            <!-- Valor 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-green-600 mb-3">Participación Ciudadana</h3>
                <p class="text-gray-600">
                    Creemos en el poder de la comunidad huarina para lograr el cambio, por eso 
                    incentivamos la participación activa de todos los vecinos.
                </p>
            </div>
            
            <!-- Valor 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-green-600 mb-3">Innovación Municipal</h3>
                <p class="text-gray-600">
                    Utilizamos tecnología y sistemas modernos para hacer de Huari un ejemplo en 
                    gestión de residuos a nivel regional.
                </p>
            </div>
        </div>
    </div>

    <!-- Objetivos del Proyecto -->
    <div class="bg-green-50 rounded-xl p-8 mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Beneficios para Huari</h2>
        
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="flex-shrink-0 h-6 w-6 text-green-500 mt-1 mr-3">✓</div>
                <p class="text-gray-700">
                    <span class="font-semibold">Reducción de residuos:</span> Disminuir en un 40% los desechos que llegan al botadero municipal mediante el reciclaje efectivo.
                </p>
            </div>
            
            <div class="flex items-start">
                <div class="flex-shrink-0 h-6 w-6 text-green-500 mt-1 mr-3">✓</div>
                <p class="text-gray-700">
                    <span class="font-semibold">Educación ambiental:</span> Capacitar a 5,000 familias huarinas en prácticas de reciclaje y manejo adecuado de residuos.
                </p>
            </div>
            
            <div class="flex items-start">
                <div class="flex-shrink-0 h-6 w-6 text-green-500 mt-1 mr-3">✓</div>
                <p class="text-gray-700">
                    <span class="font-semibold">Economía circular:</span> Generar oportunidades económicas a través del reciclaje y reutilización de materiales.
                </p>
            </div>
            
            <div class="flex items-start">
                <div class="flex-shrink-0 h-6 w-6 text-green-500 mt=1 mr-3">✓</div>
                <p class="text-gray-700">
                    <span class="font-semibold">Ciudad limpia:</span> Mejorar el ornato y salubridad de nuestros distritos y centros poblados.
                </p>
            </div>
        </div>
    </div>

    <!-- Equipo Municipal -->
<div class="mb-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Equipo Responsable</h2>
    <p class="text-gray-600 mb-10">
        Este programa es desarrollado por la Gerencia de Servicios Públicos y Medio Ambiente de la 
        Municipalidad Provincial de Huari, con el apoyo de profesionales comprometidos con el desarrollo sostenible.
    </p>
    
    <!-- Grid de 4 columnas en pantallas grandes, 2 en medianas, 1 en pequeñas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Miembro 1 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition flex flex-col h-full">
            <div class="h-48 bg-green-100 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div class="p-6 flex-grow">
                <h3 class="text-xl font-bold text-gray-800">Ing. Sistemas Tatiana Vega</h3>
                <p class="text-green-600 font-medium mb-2">Líder de Proyecto</p>
                <p class="text-gray-600 text-sm">Responsable del programa de reciclaje municipal.</p>
            </div>
        </div>
        
        <!-- Miembro 2 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition flex flex-col h-full">
            <div class="h-48 bg-green-100 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div class="p-6 flex-grow">
                <h3 class="text-xl font-bold text-gray-800">Ing. Sistemas Juan Espinoza</h3>
                <p class="text-green-600 font-medium mb-2">Desarrollador de Software</p>
                <p class="text-gray-600 text-sm">Especialista en desarrollo de sistemas para gestión ambiental.</p>
            </div>
        </div>
        
        <!-- Miembro 3 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition flex flex-col h-full">
            <div class="h-48 bg-green-100 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div class="p-6 flex-grow">
                <h3 class="text-xl font-bold text-gray-800">Ing. Sistemas Diego Curi</h3>
                <p class="text-green-600 font-medium mb-2">Tester y Documentación</p>
                <p class="text-gray-600 text-sm">Responsable de calidad y documentación del sistema.</p>
            </div>
        </div>
        
        <!-- Miembro 4 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition flex flex-col h-full">
            <div class="h-48 bg-green-100 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div class="p-6 flex-grow">
                <h3 class="text-xl font-bold text-gray-800">Ing. Sistemas Paytan Jheyson</h3>
                <p class="text-green-600 font-medium mb-2">Tester y Documentación</p>
                <p class="text-gray-600 text-sm">Encargado de pruebas y documentación técnica.</p>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</main>
@endsection