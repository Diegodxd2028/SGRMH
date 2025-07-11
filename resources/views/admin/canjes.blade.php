@extends('layouts.plantilla_admin')

@section('title', 'Historial de Canjes')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Historial de Canjes</h1>

    @if($canjes->isEmpty())
        <p class="text-gray-600">No se han registrado canjes todavía.</p>
    @else
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Usuario</th>
                    <th class="border p-2">Recompensa</th>
                    <th class="border p-2">Cantidad</th>
                    <th class="border p-2">Puntos utilizados</th>
                    <th class="border p-2">Fecha</th>
                    <th class="border p-2">Estado de Entrega</th>
                </tr>
            </thead>
            <tbody>
                @foreach($canjes as $canje)
                    <tr>
                        <td class="border p-2">
                            {{ optional($canje->usuario)->name }} {{ optional($canje->usuario)->apellido_paterno }} {{ optional($canje->usuario)->apellido_materno }}
                        </td>
                        <td class="border p-2">
                            {{ optional($canje->recompensa)->Titulo ?? 'Recompensa eliminada' }}
                        </td>
                        <td class="border p-2">{{ $canje->Cantidad }}</td>
                        <td class="border p-2">{{ $canje->PuntosUtilizados }}</td>
                        <td class="border p-2">{{ $canje->created_at->format('d/m/Y H:i') }}</td>
                        <td class="border p-2 text-center">
                            @if ($canje->entregado === 'entregado')
                                <span class="text-green-600 font-semibold">Entregado</span>
                            @else
                                <button 
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white text-sm px-3 py-1 rounded"
                                    onclick="abrirModal({{ $canje->id }})"
                                >
                                    Marcar como entregado
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Modal -->
<div id="modalConfirmacion" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-lg font-semibold mb-4">Confirmar Entrega</h2>
        <p class="text-sm mb-2">Ingrese su contraseña de administrador:</p>
        <input type="password" id="passwordAdmin" class="w-full border p-2 rounded mb-4" placeholder="Contraseña" required>

        <div class="flex justify-end gap-2">
            <button onclick="cerrarModal()" class="text-gray-600 hover:underline">Cancelar</button>
            <button id="confirmarEntregaBtn" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Confirmar
            </button>
        </div>
    </div>
</div>

{{-- Script --}}
<script>
    let canjeSeleccionadoId = null;

    function abrirModal(canjeId) {
        canjeSeleccionadoId = canjeId;
        document.getElementById('passwordAdmin').value = '';
        document.getElementById('modalConfirmacion').classList.remove('hidden');
    }

    function cerrarModal() {
        document.getElementById('modalConfirmacion').classList.add('hidden');
    }

    document.getElementById('confirmarEntregaBtn').addEventListener('click', () => {
        const password = document.getElementById('passwordAdmin').value;

        fetch(`/admin/canjes/${canjeSeleccionadoId}/entregar-con-password`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ password: password })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message || 'Contraseña incorrecta.');
            }
        })
        .catch(() => alert('Error al procesar la solicitud.'));
    });
</script>
@endsection
