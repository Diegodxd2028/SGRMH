<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recompensa;
use App\Models\Canje;
use Illuminate\Support\Facades\DB;

class CanjesController extends Controller
{
    public function __construct()
    {
        // Protege todas las rutas para usuarios autenticados
        $this->middleware('auth');
    }

    public function canjear(Request $request, $codRecom)
    {
        $request->validate([
            'cantidad' => 'nullable|integer|min:1'
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login')->with('error', 'Debes iniciar sesión para canjear recompensas.');
            }

            $recompensa = Recompensa::findOrFail($codRecom);
            $cantidad = $request->cantidad ?? 1;

            // Validaciones
            if ($user->Puntos < ($recompensa->PuntosNecesarios * $cantidad)) {
                return redirect()->back()->with('error', 'No tienes puntos suficientes para canjear esta recompensa.');
            }

            if ($recompensa->Stock < $cantidad) {
                return redirect()->back()->with('error', 'No hay suficiente stock disponible.');
            }

            if ($recompensa->EsTemporal && !$recompensa->isActive()) {
                return redirect()->back()->with('error', 'Esta recompensa temporal ya no está disponible.');
            }

            // Registrar el canje
            Canje::create([
                'DNI_usuario' => $user->DNI,
                'CodRecom' => $recompensa->CodRecom,
                'PuntosUtilizados' => $recompensa->PuntosNecesarios * $cantidad,
                'Cantidad' => $cantidad
            ]);

            // Actualizar puntos del usuario
            $user->Puntos -= $recompensa->PuntosNecesarios * $cantidad;
            $user->save();  // No necesitas pasar atributos aquí, save() sin parámetros guarda todo modificado

            // Actualizar stock de la recompensa
            $recompensa->Stock -= $cantidad;
            $recompensa->save();

            DB::commit();

            return redirect()->back()
                ->with('success', '¡Recompensa canjeada con éxito!')
                ->with('recompensaCanjeada', $recompensa->Titulo);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al procesar el canje: ' . $e->getMessage());
        }
    }

    public function historial()
    {
        $user = Auth::user();

        $canjes = Canje::with('recompensa')
            ->where('DNI_usuario', $user->DNI)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('canjes.historial', compact('canjes'));
    }
}
