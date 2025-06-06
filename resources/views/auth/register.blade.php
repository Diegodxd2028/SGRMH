@extends('layouts.plantilla')

@section('title', 'Registrarse')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="bg-white shadow-md rounded-2xl flex overflow-hidden w-full max-w-5xl">

            <!-- Columna izquierda: Formulario -->
            <div class="w-full md:w-1/2 p-8">

                <h1 class="text-xl font-semibold text-center mb-6">REGISTRARSE</h1>

                @if ($errors->any())
                    <ul class="text-red-500 text-sm mb-4 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
                    @csrf

                    <!-- Campo DNI -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">DNI:</label>
                        <input type="number" name="DNI" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ingrese su DNI" value="{{ old('DNI') }}">
                    </div>

                    <!-- Campo Nombre -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Nombre:</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ingrese su nombre" value="{{ old('name') }}">
                    </div>

                    <!-- Campo Apellido Paterno -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Apellido Paterno:</label>
                        <input type="text" name="apellido_paterno" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ingrese su apellido paterno" value="{{ old('apellido_paterno') }}">
                    </div>

                    <!-- Campo Apellido Materno -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Apellido Materno:</label>
                        <input type="text" name="apellido_materno" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ingrese su apellido materno" value="{{ old('apellido_materno') }}">
                    </div>

                    <!-- Campo Dirección -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Dirección:</label>
                        <input type="text" name="direccion" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ingrese su dirección" value="{{ old('direccion') }}">
                    </div>
                    <!-- Campo Celular -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Celular:</label>
                        <input type="number" name="Celular" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ingrese su número de celular" value="{{ old('Celular') }}">
                    </div>

                    <!-- Campo Email -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Email:</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ingrese su correo electrónico" value="{{ old('email') }}">
                    </div>

                    <!-- Campo Contraseña -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Contraseña:</label>
                        <input type="password" name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Cree una contraseña">
                    </div>

                    <!-- Campo Confirmar Contraseña -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Confirme su contraseña">
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition duration-200">
                            Registrarse
                        </button>
                    </div>
                </form>

                <p class="text-center text-sm text-gray-600 mt-4">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Iniciar Sesión</a>
                </p>
            </div>

            <!-- Columna derecha: Imagen -->
            <div class="hidden md:flex md:w-1/2 items-center justify-center">
                <div class="text-center">
                    <h1 class="text-xl font-bold mb-4"></h1>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Municipalidad_Provincial_de_Huari.svg/603px-Municipalidad_Provincial_de_Huari.svg.png"
                         alt="Imagen de registro"
                         class="w-[40%] h-[70%] mx-auto object-contain">
                </div>
            </div>
        </div>
    </div>
@endsection