<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Premio;

class PremioClienteController extends Controller
{
    public function index()
    {
        $premios = Premio::all();
        return view('cliente.premios.index', compact('premios'));
    }
}
