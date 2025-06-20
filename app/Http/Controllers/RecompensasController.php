<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recompensa;
use App\Models\Canje;

class RecompensasController extends Controller
{
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

        // ✅ Agregamos el historial de canjes
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

    public function create()
    {
        return view('admin.recompensas');
    }

    public function store(Request $request)
    {
        // Validar incluyendo imagenurl
        $validated = $request->validate(
            array_merge(Recompensa::rules(), [
                'imagenurl' => 'nullable|url|max:255'
            ]),
            Recompensa::messages()
        );

        // Crear recompensa con todos los datos
        Recompensa::create($validated);

        return redirect()->route('admin.recompensas.create')->with('success', 'Recompensa agregada correctamente.');
    }
}
