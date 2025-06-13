<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
            'email' => 'required',
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);
        Mail::to('75174627@continental.edu.pe')->send(new ContactanosMailable($request->all()));
        
        return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado con éxito');
    }
}
