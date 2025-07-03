<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Auth;

class ContactanosController extends Controller
{
    public function index() {
        return view('contactanos.index');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);

        // Obtener usuario autenticado
        $user = Auth::user();

        // Guardar en la base de datos
        Mensaje::create([
            'nombre' => $user->name,
            'telefono' => $user->telefono,
            'email' => $user->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'DNI_usuario' => $user->DNI,
        ]);

        // Preparar datos para el correo
        $data = [
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
        ];

        // Enviar correo con los datos y el usuario
        Mail::to('73031584@continental.edu.pe')->send(new ContactanosMailable($data, $user));

        return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado con éxito');
    }
}
