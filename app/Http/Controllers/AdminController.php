<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mensaje;
use App\Models\Canje;
use App\Models\Residuo; 
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function dashboard()
    {
        $residuosData = Residuo::select('tipo', DB::raw('SUM(cantidad_kg) as total'))
                    ->groupBy('tipo')
                    ->pluck('total', 'tipo');

    // Gráfico de usuarios registrados por día (últimos 7 días)
    $usuariosPorDia = User::whereDate('created_at', '>=', now()->subDays(6))
        ->select(DB::raw('DATE(created_at) as fecha'), DB::raw('count(*) as total'))
        ->groupBy('fecha')
        ->orderBy('fecha')
        ->pluck('total', 'fecha');

    return view('admin.dashboard', compact('residuosData', 'usuariosPorDia'));
    }

    public function mensajes()
    {
        $mensajes = Mensaje::with('usuario')->latest()->get();
        return view('admin.mensajes', compact('mensajes'));
    }

    public function canjes()
    {
        $canjes = Canje::with('recompensa', 'usuario')->get();
        return view('admin.canjes', compact('canjes'));
    }

    public function mostrarFormularioPuntos()
    {
        $usuarios = User::where('rol', 'usuario')->get();
        return view('admin.puntos', compact('usuarios'));
    }

    public function asignarPuntos(Request $request)
    {
        // ✅ Validamos todos los campos necesarios
        $request->validate([
            'dni' => 'required|exists:users,DNI',
            'puntos' => 'required|integer|min:1',
            'tipo_residuo' => 'required',
            'kilos' => 'required|numeric|min:0.1',
        ], [
            'dni.exists' => 'El usuario con ese DNI no existe.',
        ]);

        // ✅ Buscamos al usuario por DNI
        $usuario = User::where('DNI', $request->dni)->first();

        // ✅ Sumamos los puntos al usuario
        $usuario->Puntos += $request->puntos;
        $usuario->save();

        // ✅ Registramos el residuo
        Residuo::create([
            'user_id' => $usuario->id,
            'tipo' => $request->tipo_residuo,
            'cantidad_kg' => $request->kilos,
        ]);

        return redirect()->back()->with('success', 'Puntos asignados y residuo registrado correctamente.');
    }
}
