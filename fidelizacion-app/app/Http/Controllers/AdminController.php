<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Aquí puedes enviar datos a la vista
        return view('admin.dashboard');
    }
}
