<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // tu vista de login
    }

    public function login(Request $request)
    {
    $request->validate([
        'telefono' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('telefono', 'password');

    if (Auth::attempt($credentials)) {
        // En lugar de redirigir, mandamos a la vista de voz
        return redirect()->route('verificar.voz');
    }

    return back()->withErrors([
        'telefono' => 'Credenciales incorrectas.',
    ]);
    }

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
    }
}
