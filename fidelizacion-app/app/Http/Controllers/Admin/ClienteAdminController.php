<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteAdminController extends Controller
{
    // Mostrar todos los clientes (usuarios con rol 'cliente')
    public function index()
    {
        $clientes = User::where('rol', 'cliente')->get();
        return view('admin.clientes.index', compact('clientes'));
    }

    // Mostrar formulario para crear un nuevo cliente
    public function create()
    {
        return view('admin.clientes.create');
    }

    // Guardar nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'telefono' => 'required|unique:users,telefono',
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email|unique:users,correo',
            'password' => 'required|min:6',
        ]);

        $cliente = new User();
        $cliente->telefono = $request->telefono;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->estado = $request->estado;
        $cliente->ciudad = $request->ciudad;
        $cliente->puntos = $request->puntos ?? 0;
        $cliente->rol = 'cliente';
        $cliente->password = Hash::make($request->password);
        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    // Mostrar formulario para editar cliente
    public function edit(User $cliente)
    {
        return view('admin.clientes.edit', compact('cliente'));
    }

    // Actualizar cliente
    public function update(Request $request, User $cliente)
    {
        $request->validate([
            'telefono' => 'required|unique:users,telefono,' . $cliente->id,
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email|unique:users,correo,' . $cliente->id,
            // password opcional en edición
            'password' => 'nullable|min:6',
        ]);

        $cliente->telefono = $request->telefono;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->estado = $request->estado;
        $cliente->ciudad = $request->ciudad;
        $cliente->puntos = $request->puntos ?? $cliente->puntos;

        if ($request->filled('password')) {
            $cliente->password = Hash::make($request->password);
        }

        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    // Eliminar cliente
    public function destroy(User $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }
}
