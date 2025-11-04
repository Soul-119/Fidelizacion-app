@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">Listado de Premios</h2>

    <a href="{{ route('premios.create') }}" class="btn btn-primary mb-3">+ Nuevo Premio</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Puntos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($premios as $premio)
                <tr>
                    <td>{{ $premio->nombre }}</td>
                    <td>{{ $premio->descripcion }}</td>
                    <td>{{ $premio->puntos }}</td>
                    <td>
                        <a href="{{ route('premios.edit', $premio->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('premios.destroy', $premio->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este premio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

