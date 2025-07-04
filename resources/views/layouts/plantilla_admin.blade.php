<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Panel Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen flex font-sans antialiased text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-primary-800 to-primary-900 shadow-xl hidden md:flex flex-col transition-all duration-300 ease-in-out">
        <div class="p-6 flex items-center space-x-3">
            <div class="bg-white p-2 rounded-lg shadow-md">
                <i class="fas fa-crown text-primary-600 text-xl"></i>
            </div>
            <span class="text-xl font-bold text-white">Admin Huari</span>
        </div>
        <nav class="flex-1 mt-4 px-2 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600 text-white shadow-md' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                <i class="fas fa-tachometer-alt mr-3 w-5 text-center"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.canjes') }}"
               class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.canjes') ? 'bg-primary-600 text-white shadow-md' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                <i class="fas fa-exchange-alt mr-3 w-5 text-center"></i>
                Historial de Canjes
            </a>
            <a href="{{ route('admin.mensajes') }}"
               class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.mensajes') ? 'bg-primary-600 text-white shadow-md' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                <i class="fas fa-envelope mr-3 w-5 text-center"></i>
                Mensajes de Usuarios
            </a>
            <a href="{{ route('admin.puntos') }}"
               class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.puntos') ? 'bg-primary-600 text-white shadow-md' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                <i class="fas fa-coins mr-3 w-5 text-center"></i>
                Añadir Puntos
            </a>
            <a href="{{ route('admin.recompensas.create') }}"
               class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.recompensas.create') ? 'bg-primary-600 text-white shadow-md' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                <i class="fas fa-gift mr-3 w-5 text-center"></i>
                Agregar Recompensa
            </a>
            <a href="{{ route('admin.campañas.index') }}"
               class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.campañas.index') ? 'bg-primary-600 text-white shadow-md' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                <i class="fas fa-bullhorn mr-3 w-5 text-center"></i>
                Campañas
            </a>
        </nav>
        <div class="p-4 border-t border-primary-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 text-primary-100 hover:text-white rounded-lg hover:bg-primary-700 transition-all duration-200">
                    <i class="fas fa-sign-out-alt mr-3 w-5 text-center"></i>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </aside>

    <!-- Contenido principal -->
    <main class="flex-1 overflow-hidden">
        <!-- Header Admin -->
        @include('layouts.partials.header_admin')

        <div class="p-6 md:p-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">@yield('title')</h1>
                    <div class="text-sm text-gray-500">
                        @yield('breadcrumbs')
                    </div>
                </div>

                <!-- Notificaciones -->
                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
                @endif

                @yield('content')
            </div>
        </div>

        <!-- Footer Admin -->
        @include('layouts.partials.footer_admin')
    </main>

</body>
</html>