@extends('layouts.plantilla_admin')

@section('title', 'Editar Recompensa')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-2xl font-bold mb-6">Editar Recompensa</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.recompensas.update', $recompensa->CodRecom) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Título:</label>
            <input type="text" name="Titulo" value="{{ old('Titulo', $recompensa->Titulo) }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Descripción:</label>
            <textarea name="Descripcion" class="w-full border p-2 rounded" rows="3" required>{{ old('Descripcion', $recompensa->Descripcion) }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Puntos necesarios:</label>
            <input type="number" name="PuntosNecesarios" value="{{ old('PuntosNecesarios', $recompensa->PuntosNecesarios) }}" class="w-full border p-2 rounded" min="0" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Stock:</label>
            <input type="number" name="Stock" value="{{ old('Stock', $recompensa->Stock) }}" class="w-full border p-2 rounded" min="1" required>
        </div>

        <div>
            <label class="block font-medium mb-1">URL de la imagen:</label>
            <input type="url" name="imagenurl" value="{{ old('imagenurl', $recompensa->imagenurl) }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium mb-1">¿Es temporal?</label>
            <select name="EsTemporal" class="w-full border p-2 rounded" id="esTemporalSelect">
                <option value="0" {{ !$recompensa->EsTemporal ? 'selected' : '' }}>No</option>
                <option value="1" {{ $recompensa->EsTemporal ? 'selected' : '' }}>Sí</option>
            </select>
        </div>

        <div id="fechasTemporales" style="{{ $recompensa->EsTemporal ? '' : 'display: none;' }}">
            <div>
                <label class="block font-medium mb-1">Fecha de inicio:</label>
                <input type="date" name="FechaInicio" value="{{ old('FechaInicio', $recompensa->FechaInicio) }}" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block font-medium mb-1">Fecha de fin:</label>
                <input type="date" name="FechaFin" value="{{ old('FechaFin', $recompensa->FechaFin) }}" class="w-full border p-2 rounded">
            </div>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.recompensas.create') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Actualizar Recompensa</button>
        </div>
    </form>
</div>

<script>
    const esTemporalSelect = document.getElementById('esTemporalSelect');
    const fechasTemporales = document.getElementById('fechasTemporales');

    esTemporalSelect.addEventListener('change', () => {
        fechasTemporales.style.display = esTemporalSelect.value == "1" ? "block" : "none";
    });
</script>
@endsection
