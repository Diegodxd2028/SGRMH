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
}
