<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function dashboard()
    {
        $cliente = Auth::user();
        return view('cliente.dashboard', compact('cliente'));
    }

    public function premios()
    {
        return view('cliente.premios.index');
    }

    public function beneficios()
    {
        return view('cliente.beneficios.index');
    }
}
