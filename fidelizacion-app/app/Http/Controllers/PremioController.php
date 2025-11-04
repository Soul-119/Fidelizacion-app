<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Premio;
use App\Models\Notificacion;

class PremioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index() {
        $premios = Premio::all();
        return view('premios.index', compact('premios'));
    }

    public function create() {
        return view('premios.create');
    }

    public function store(Request $request) {
        Premio::create($request->all());

        // 🔔 Crear una notificación al agregar un nuevo premio
        Notificacion::create([
            'titulo' => '🎁 Nuevo premio disponible',
            'mensaje' => 'Se ha agregado un nuevo premio al programa de fidelización.',
            'tipo' => 'premio',
        ]);

        return redirect()->route('premios.index')->with('success', 'Premio creado.');
    }

    public function edit(Premio $premio) {
        return view('premios.edit', compact('premio'));
    }

    public function update(Request $request, Premio $premio) {
        $premio->update($request->all());
        return redirect()->route('premios.index')->with('success', 'Premio actualizado.');
    }

    public function destroy(Premio $premio) {
        $premio->delete();
        return redirect()->route('premios.index')->with('success', 'Premio eliminado.');
    }    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */

}
