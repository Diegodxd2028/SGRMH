<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recompensa;
use App\Models\Canje;

class RecompensasController extends Controller
{
    // Mostrar recompensas para el usuario autenticado
    public function index()
    {
        $user = Auth::user();

        $nombreCompleto = "{$user->name} {$user->apellido_paterno} {$user->apellido_materno}";

        $recompensas = Recompensa::available()
            ->where(function ($query) {
                $query->where('EsTemporal', false)
                    ->orWhere(function ($q) {
                        $q->where('EsTemporal', true)
                            ->where('FechaInicio', '<=', now())
                            ->where('FechaFin', '>=', now());
                    });
            })
            ->orderBy('PuntosNecesarios', 'asc')
            ->get();

        $canjes = Canje::with('recompensa')
            ->where('DNI_usuario', $user->DNI)
            ->latest()
            ->get();

        return view('recompensas', [
            'usuario' => $user,
            'nombreCompleto' => trim($nombreCompleto),
            'puntos' => $user->Puntos ?? 0,
            'recompensas' => $recompensas,
            'canjes' => $canjes 
        ]);
    }

    // Vista de administrador para crear y ver recompensas
    public function create()
    {
        $recompensas = Recompensa::orderBy('created_at', 'desc')->get();
        return view('admin.recompensas', compact('recompensas'));
    }

    // Guardar nueva recompensa
    public function store(Request $request)
    {
        $validated = $request->validate(
            array_merge(Recompensa::rules(), [
                'imagenurl' => 'required|url|max:255'
            ]),
            Recompensa::messages()
        );

        Recompensa::create($validated);

        return redirect()->route('admin.recompensas.create')->with('success', 'Recompensa agregada correctamente.');
    }

    // Editar recompensa
    public function edit($id)
    {
        $recompensa = Recompensa::findOrFail($id);
        return view('admin.edit-recompensa', compact('recompensa'));
    }

    // Actualizar recompensa
    public function update(Request $request, $id)
    {
        $recompensa = Recompensa::findOrFail($id);

        $validated = $request->validate(
            array_merge(Recompensa::rules(), [
                'imagenurl' => 'required|url|max:255'
            ]),
            Recompensa::messages()
        );

        $recompensa->update($validated);

        return redirect()->route('admin.recompensas.create')->with('success', 'Recompensa actualizada correctamente.');
    }

    // Eliminar recompensa
    public function destroy($id)
    {
        $recompensa = Recompensa::findOrFail($id);
        $recompensa->delete();

        return redirect()->route('admin.recompensas.create')->with('success', 'Recompensa eliminada correctamente.');
    }
}
