<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recompensa;

class RecompensasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Obtener nombre completo formateado
        $nombreCompleto = "{$user->name} {$user->apellido_paterno} {$user->apellido_materno}";
        
        // Obtener recompensas disponibles y activas
        $recompensas = Recompensa::available()
            ->where(function($query) {
                $query->where('EsTemporal', false)
                    ->orWhere(function($q) {
                        $q->where('EsTemporal', true)
                          ->where('FechaInicio', '<=', now())
                          ->where('FechaFin', '>=', now());
                    });
            })
            ->orderBy('PuntosNecesarios', 'asc')
            ->get();
        
        return view('recompensas', [
            'usuario' => $user,
            'nombreCompleto' => trim($nombreCompleto),
            'puntos' => $user->Puntos ?? 0,
            'recompensas' => $recompensas
        ]);
    }

    public function canjear(Recompensa $recompensa)
    {
        $usuario = Auth::user();

        // Validaciones
        if (!$recompensa->isAvailable()) {
            return redirect()->back()->with('error', 'La recompensa no está disponible.');
        }

        if (!$recompensa->isActive()) {
            return redirect()->back()->with('error', 'La recompensa ya no está activa.');
        }

        if ($usuario->Puntos < $recompensa->PuntosNecesarios) {
            return redirect()->back()->with('error', 'No tienes puntos suficientes para canjear esta recompensa.');
        }

        // Descontar puntos y reducir stock
        $usuario->Puntos -= $recompensa->PuntosNecesarios;

        $recompensa->Stock -= 1;
        $recompensa->save();

        return redirect()->back()->with('success', '¡Has canjeado la recompensa con éxito!');
    }
}
