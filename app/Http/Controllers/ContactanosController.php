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
        'nombre' => 'required',
        'telefono' => 'required',
        'email' => 'required|email',
        'asunto' => 'required',
        'mensaje' => 'required',
    ]);

    // Guardar en la base de datos
    Mensaje::create([
        'nombre' => $request->nombre,
        'telefono' => $request->telefono,
        'email' => $request->email,
        'asunto' => $request->asunto,
        'mensaje' => $request->mensaje,
        'DNI_usuario' => Auth::check() ? Auth::user()->DNI : null,
    ]);

    // Enviar correo
    Mail::to('73031584@continental.edu.pe')->send(new ContactanosMailable($request->all()));

    return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado con éxito');
}
}
