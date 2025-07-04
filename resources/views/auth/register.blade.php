@extends('layouts.plantilla_auth')

@section('title', 'Registrarse')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white shadow-md rounded-2xl flex overflow-hidden w-full max-w-5xl">

        <!-- Columna izquierda: Formulario -->
        <div class="w-full md:w-1/2 p-8">
            <h1 class="text-2xl font-bold text-center text-green-600 mb-6">Registrarse</h1>

            @if ($errors->any())
                <ul class="text-red-500 text-sm mb-4 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium mb-1">DNI:</label>
                    <input type="number" name="DNI" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Ingrese su DNI" value="{{ old('DNI') }}">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nombre:</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Ingrese su nombre" value="{{ old('name') }}">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Apellido Paterno:</label>
                    <input type="text" name="apellido_paterno" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Ingrese su apellido paterno" value="{{ old('apellido_paterno') }}">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Apellido Materno:</label>
                    <input type="text" name="apellido_materno" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Ingrese su apellido materno" value="{{ old('apellido_materno') }}">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Dirección:</label>
                    <input type="text" name="direccion" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Ingrese su dirección" value="{{ old('direccion') }}">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Teléfono:</label>
                    <input type="number" name="telefono" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Ingrese su número de teléfono" value="{{ old('telefono') }}">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email:</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Ingrese su correo electrónico" value="{{ old('email') }}">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Contraseña:</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Cree una contraseña">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Confirmar Contraseña:</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                        placeholder="Confirme su contraseña">
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        Registrarse
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                ¿Ya tienes cuenta?
                <a href="{{ route('login.form.usuario') }}" class="text-blue-600 hover:underline">Iniciar sesión</a>
            </p>
        </div>

        <!-- Columna derecha: Imagen -->
        <div class="hidden md:flex md:w-1/2 items-center justify-center bg-gray-50">
            <div class="text-center">
                <img src="https://scontent.fjau2-1.fna.fbcdn.net/v/t39.30808-6/475560504_1161107602728299_6060059517843459211_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=GblJOJpLCJ0Q7kNvwFlEb52&_nc_oc=Admh4OYVC7jvqjurfFsnZCxgEC6sViZxYw1ruZFKSDj8GiOTe51tRCKlDuLcSEuevFD-GfmtBG_bmhNfjJKyBx-e&_nc_zt=23&_nc_ht=scontent.fjau2-1.fna&_nc_gid=1rSMyJ5ZDquJQhdw5bS6zw&oh=00_AfO_rBwbmtleXqDM5lXJzLLq5r7r10x2gvLUMcqP26g2AA&oe=686D9078"
                     alt="Logo Municipalidad de Huari"
                     class="w-3/4 h-auto mx-auto object-contain">
            </div>
        </div>
    </div>
</div>
@endsection
