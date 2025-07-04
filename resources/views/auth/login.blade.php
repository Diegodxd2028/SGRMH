@extends('layouts.plantilla_auth')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-gray-100 px-4 py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden w-full max-w-5xl flex flex-col md:flex-row">
    
        <!-- Columna izquierda: Imagen -->
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-b from-primary-600 to-primary-800 items-center justify-center p-8">
            <div class="text-center">
                <img src="https://scontent.fjau2-1.fna.fbcdn.net/v/t39.30808-6/475560504_1161107602728299_6060059517843459211_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=GblJOJpLCJ0Q7kNvwFlEb52&_nc_oc=Admh4OYVC7jvqjurfFsnZCxgEC6sViZxYw1ruZFKSDj8GiOTe51tRCKlDuLcSEuevFD-GfmtBG_bmhNfjJKyBx-e&_nc_zt=23&_nc_ht=scontent.fjau2-1.fna&_nc_gid=1rSMyJ5ZDquJQhdw5bS6zw&oh=00_AfO_rBwbmtleXqDM5lXJzLLq5r7r10x2gvLUMcqP26g2AA&oe=686D9078"
                     alt="Municipalidad de Huari"
                     class="w-full max-w-xs mx-auto object-cover rounded-lg shadow-md border-4 border-white">
                <h3 class="mt-6 text-2xl font-bold text-white">Sistema de Gestión</h3>
                <p class="text-primary-100 mt-2">Plataforma de servicios municipales</p>
            </div>
        </div>

        <!-- Columna derecha: Formulario -->
        <div class="w-full md:w-1/2 p-8 md:p-12 relative">
            <!-- Botón Atrás - Estilo corregido -->
            <a href="{{ route('seleccionar-rol') }}"
               class="absolute top-6 left-6 text-gray-600 hover:text-primary-600 transition flex items-center text-sm font-medium">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Volver
            </a>

            <div class="max-w-md mx-auto">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Municipalidad de Huari</h1>
                    <h2 class="text-xl font-semibold text-gray-600 mt-2">
                        Iniciar Sesión @if(isset($rol) && $rol === 'admin') <span class="text-primary-600">(Administrador)</span> @else <span class="text-primary-600">(Usuario)</span> @endif
                    </h2>
                </div>

                @if (session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                        <p class="text-red-700 font-medium">{{ session('error') }}</p>
                    </div>
                @endif

                <form method="POST" 
                      action="{{ $rol === 'admin' ? route('login.submit.admin') : route('login.submit.usuario') }}" 
                      class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" name="email" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                placeholder="tu@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" name="password" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                                placeholder="••••••••">
                        </div>
                    </div>

                   <div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        Iniciar Sesión
                    </button>
                </div>
                </form>

                @if($rol === 'usuario')
                    <div class="mt-6 text-center text-sm text-gray-600">
                        ¿No tienes cuenta? 
                        <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500">Regístrate aquí</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection