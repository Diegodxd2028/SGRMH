@extends('layouts.plantilla_usuario')

@section('title', 'Contáctanos')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md my-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Atención al usuario</h1>

        <form action="{{ route('contactanos.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Asunto -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Asunto*</label>
                <input type="text" name="asunto" value="{{ old('asunto') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('asunto') border-red-500 @enderror"
                       placeholder="¿Sobre qué quieres contactarnos?" required>
                @error('asunto')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mensaje -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Mensaje*</label>
                <textarea name="mensaje" rows="5"
                          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('mensaje') border-red-500 @enderror"
                          placeholder="Escribe tu mensaje aquí..." required>{{ old('mensaje') }}</textarea>
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

        <!-- Mensaje de éxito -->
        @if(session('info'))
            <script>
                alert("{{ session('info') }}");
            </script>
        @endif
    </div>
@endsection
