@extends('layouts.plantilla')

@section('title', 'Contáctanos')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md my-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Atencion al usuario</h1>

        <form action="{{ route('contactanos.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nombre completo -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nombre completo*</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" 
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror"
                       placeholder="Ingresa tu nombre completo">
                @error('nombre')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Teléfono -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Teléfono</label>
                <input type="tel" name="telefono" value="{{ old('telefono') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('telefono') border-red-500 @enderror"
                       placeholder="Ej: 987 654 321">
                @error('telefono')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Correo electrónico -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Correo electrónico*</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                       placeholder="tu@correo.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Asunto -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Asunto*</label>
                <input type="text" name="asunto" value="{{ old('asunto') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('asunto') border-red-500 @enderror"
                       placeholder="¿Sobre qué quieres contactarnos?">
                @error('asunto')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mensaje -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Mensaje*</label>
                <textarea name="mensaje" rows="5"
                          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('mensaje') border-red-500 @enderror"
                          placeholder="Escribe tu mensaje aquí...">{{ old('mensaje') }}</textarea>
                @error('mensaje')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de envío -->
            <div class="pt-2">
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                    Enviar Mensaje
                </button>
            </div>
        </form>

        <!-- Mensaje de éxito (usando el alert de JS que tenías) -->
        @if(session('info'))
            <script>
                alert("{{ session('info') }}");
            </script>
        @endif
    </div>
@endsection