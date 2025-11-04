<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficio;

class BeneficioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index() {
        $beneficios = Beneficio::all();
        return view('beneficios.index', compact('beneficios'));
    }

    public function create() {
        return view('beneficios.create');
    }

    public function store(Request $request) {
        Beneficio::create($request->all());
        return redirect()->route('beneficios.index')->with('success', 'Beneficio creado.');
    }

    public function edit(Beneficio $beneficio) {
        return view('beneficios.edit', compact('beneficio'));
    }

    public function update(Request $request, Beneficio $beneficio) {
        $beneficio->update($request->all());
        return redirect()->route('beneficios.index')->with('success', 'Beneficio actualizado.');
    }

    public function destroy(Beneficio $beneficio) {
        $beneficio->delete();
        return redirect()->route('beneficios.index')->with('success', 'Beneficio eliminado.');
    }
}
