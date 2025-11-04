<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beneficio;


class BeneficioApiController extends Controller
{
public function index()
    {
        return response()->json(Beneficio::all());
    }
}
