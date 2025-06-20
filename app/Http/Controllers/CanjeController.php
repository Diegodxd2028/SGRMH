<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Canje;
use App\Models\Recompensa;
use App\Models\User;

class CanjeController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'CodRecom' => 'required|exists:recompensas,CodRecom',
            'Cantidad' => 'required|integer|min:1',
        ]);

        $usuario = Auth::user();
        $codRecompensa = $request->input('CodRecom');
        $cantidad = $request->input('Cantidad');

        // Obtener recompensa
        $recompensa = Recompensa::findOrFail($codRecompensa);
        $puntosRequeridos = $recompensa->PuntosNecesarios * $cantidad;

        // Verificar stock disponible
        if ($recompensa->Stock < $cantidad) {
            return back()->with('error', 'No hay suficiente stock disponible para esta recompensa.');
        }

        // Verificar puntos suficientes
        if ($usuario->Puntos < $puntosRequeridos) {
            return back()->with('error', 'No tienes suficientes puntos para canjear esta recompensa.');
        }

        // Descontar puntos al usuario
        $usuario->Puntos -= $puntosRequeridos;
        $usuario->save();

        // Descontar stock de la recompensa
        $recompensa->Stock -= $cantidad;
        $recompensa->save();

        // Registrar canje
        Canje::create([
            'DNI_usuario' => $usuario->DNI,
            'CodRecom' => $codRecompensa,
            'PuntosUtilizados' => $puntosRequeridos,
            'Cantidad' => $cantidad,
            'entregado' => 'pendiente'
        ]);

        return redirect()->route('recompensas')->with('success', '¡Canje realizado con éxito!');
    }
}
