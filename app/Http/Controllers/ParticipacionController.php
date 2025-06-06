<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipacionController extends Controller
{
    public function index()
    {
        return view('participacion');
    }
}
