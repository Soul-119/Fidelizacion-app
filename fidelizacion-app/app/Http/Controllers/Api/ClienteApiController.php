<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ClienteApiController extends Controller
{
    public function index()
    {
        $clientes = User::where('rol', 'cliente')->get();
        return response()->json($clientes);
    }
}
