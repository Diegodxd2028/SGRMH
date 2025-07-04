@extends('layouts.plantilla_admin')

@section('title', 'Agregar Recompensa')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario -->
    <form action="{{ route('admin.recompensas.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">Título:</label>
            <input type="text" name="Titulo" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Descripción:</label>
            <textarea name="Descripcion" class="w-full border p-2 rounded" rows="3" required></textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Puntos necesarios:</label>
            <input type="number" name="PuntosNecesarios" class="w-full border p-2 rounded" min="0" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Stock:</label>
            <input type="number" name="Stock" class="w-full border p-2 rounded" min="1" required>
        </div>

        <div>
            <label class="block font-medium mb-1">URL de la imagen:</label>
            <input type="url" name="imagenurl" class="w-full border p-2 rounded" placeholder="https://..." required>
        </div>

        <div>
            <label class="block font-medium mb-1">¿Es temporal?</label>
            <select name="EsTemporal" class="w-full border p-2 rounded" id="esTemporalSelect">
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
        </div>

        <div id="fechasTemporales" style="display: none;">
            <div>
                <label class="block font-medium mb-1">Fecha de inicio:</label>
                <input type="date" name="FechaInicio" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block font-medium mb-1">Fecha de fin:</label>
                <input type="date" name="FechaFin" class="w-full border p-2 rounded">
            </div>
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
            Guardar Recompensa
        </button>
    </form>

    <!-- Tabla de recompensas existentes -->
    @if($recompensas->count())
        <h2 class="text-xl font-bold mt-10 mb-4">Recompensas Registradas</h2>

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-green-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2">Título</th>
                        <th class="px-4 py-2">Puntos</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Temporal</th>
                        <th class="px-4 py-2">Imagen</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($recompensas as $r)
                        <tr>
                            <td class="px-4 py-2">{{ $r->Titulo }}</td>
                            <td class="px-4 py-2">{{ $r->PuntosNecesarios }}</td>
                            <td class="px-4 py-2">{{ $r->Stock }}</td>
                            <td class="px-4 py-2">
                                {{ $r->EsTemporal ? 'Sí' : 'No' }}
                                @if($r->EsTemporal)
                                    <br><span class="text-xs text-gray-500">({{ $r->FechaInicio }} - {{ $r->FechaFin }})</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <img src="{{ $r->imagenurl }}" alt="Imagen" class="h-12 rounded shadow">
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('admin.recompensas.edit', $r->CodRecom) }}"
                                   class="text-blue-600 hover:underline text-sm">Editar</a>

                                <form action="{{ route('admin.recompensas.destroy', $r->CodRecom) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Eliminar esta recompensa?')"
                                            class="text-red-600 hover:underline text-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script>
    const esTemporalSelect = document.getElementById('esTemporalSelect');
    const fechasTemporales = document.getElementById('fechasTemporales');

    esTemporalSelect.addEventListener('change', () => {
        fechasTemporales.style.display = esTemporalSelect.value == "1" ? "block" : "none";
    });
</script>
@endsection
