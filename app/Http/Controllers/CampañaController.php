<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaña;
use App\Models\ParticipacionCampaña;
use Illuminate\Support\Facades\Auth;

class CampañaController extends Controller
{
    // VISTA ADMINISTRADOR
    public function index()
    {
        $campañas = Campaña::all();
        return view('admin.campañas', compact('campañas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'puntos_campaña' => 'required|integer|min:1',
            'imagen_url' => 'required|url',
        ]);

        Campaña::create($request->all());

        return redirect()->back()->with('success', 'Campaña creada correctamente.');
    }

    public function edit($id)
    {
        $campaña = Campaña::findOrFail($id);
        return view('admin.edit-campana', compact('campaña')); // corregido
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'puntos_campaña' => 'required|integer|min:1',
            'imagen_url' => 'required|url',
        ]);

        $campaña = Campaña::findOrFail($id);
        $campaña->update($request->all());

        return redirect()->route('admin.campañas.index')->with('success', 'Campaña actualizada correctamente.');
    }

    public function destroy($id)
    {
        Campaña::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Campaña eliminada correctamente.');
    }

    // VISTA PÚBLICA PARA USUARIOS
    public function indexPublic()
    {
        $campañas = Campaña::where('fecha_inicio', '<=', now())
                           ->where('fecha_fin', '>=', now())
                           ->get();

        return view('campañas', compact('campañas'));
    }

    // Registro de participación
    public function participar($id)
    {
        $usuarioId = Auth::id();

        // Evitar duplicados
        $existe = ParticipacionCampaña::where('user_id', $usuarioId)
                                      ->where('campaña_id', $id)
                                      ->exists();

        if ($existe) {
            return redirect()->back()->with('error', 'Ya estás registrado en esta campaña.');
        }

        ParticipacionCampaña::create([
            'user_id' => $usuarioId,
            'campaña_id' => $id,
        ]);

        return redirect()->back()->with('success', 'Te has registrado exitosamente en la campaña.');
    }
}
