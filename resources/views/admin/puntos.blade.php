@extends('layouts.plantilla_admin')

@section('title', 'Añadir Puntos')

@section('content')
<div class="container mx-auto p-6 max-w-xl">
    <h1 class="text-2xl font-bold mb-6">Añadir Puntos a un Usuario</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.puntos') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">DNI del Usuario:</label>
            <input type="text" name="dni" class="w-full border p-2 rounded" required value="{{ old('dni') }}">
        </div>

        <div>
            <label class="block font-medium mb-1">Tipo de Residuo:</label>
            <select name="tipo_residuo" id="tipo_residuo" class="w-full border p-2 rounded" required>
                <option value="">Selecciona una opción</option>
                <option value="papel_carton">Papel y Cartón</option>
                <option value="botellas_plastico">Botellas de Plástico</option>
                <option value="latas">Latas</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Cantidad (en kilos):</label>
            <input type="number" name="kilos" id="kilos" class="w-full border p-2 rounded" min="1" required>
        </div>

        {{-- Campo oculto para los puntos calculados --}}
        <input type="hidden" name="puntos" id="puntos">
        <div id="puntos-preview" class="text-gray-700 font-semibold"></div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Añadir Puntos
        </button>
    </form>
</div>

{{-- Tabla de usuarios (excepto admin) --}}
<div class="container mx-auto px-6 mt-10">
    <h2 class="text-xl font-bold mb-4">Lista de Usuarios Registrados</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow border">
            <thead class="bg-blue-100 text-gray-800 text-left text-sm">
                <tr>
                    <th class="py-2 px-4">DNI</th>
                    <th class="py-2 px-4">Nombre</th>
                    <th class="py-2 px-4">Correo</th>
                    <th class="py-2 px-4">Puntos</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @foreach($usuarios as $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $user->DNI }}</td>
                        <td class="py-2 px-4">{{ $user->name }} {{ $user->apellido_paterno }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ $user->Puntos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('tipo_residuo').addEventListener('change', calcularPuntos);
    document.getElementById('kilos').addEventListener('input', calcularPuntos);

    function calcularPuntos() {
        const tipo = document.getElementById('tipo_residuo').value;
        const kilos = parseFloat(document.getElementById('kilos').value);
        let puntos = 0;

        if (!isNaN(kilos)) {
            switch (tipo) {
                case 'papel_carton': puntos = kilos * 5; break;
                case 'botellas_plastico': puntos = kilos * 10; break;
                case 'latas': puntos = kilos * 50; break;
            }
        }

        document.getElementById('puntos').value = puntos;
        document.getElementById('puntos-preview').innerText = puntos > 0 ? `Puntos a asignar: ${puntos}` : '';
    }
</script>
@endsection
