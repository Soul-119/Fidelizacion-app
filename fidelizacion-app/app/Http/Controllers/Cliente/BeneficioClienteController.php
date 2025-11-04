<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beneficio;

class BeneficioClienteController extends Controller
{
    public function index()
    {
        $beneficios = Beneficio::all();
        return view('cliente.beneficios.index', compact('beneficios'));
    }
}

