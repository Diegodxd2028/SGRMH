<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReciclajeController extends Controller
{
    public function index()
    {
        return view('reciclaje');
    }
}
