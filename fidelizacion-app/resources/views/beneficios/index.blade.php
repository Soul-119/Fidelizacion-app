@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">Lista de Beneficios</h2>

    <a href="{{ route('beneficios.create') }}" class="btn btn-primary mb-3">+ Nuevo Beneficio</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Empresa</th>
                <th>Descripción</th>
                <th>Descuento (%)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficios as $beneficio)
                <tr>
                    <td>{{ $beneficio->empresa }}</td>
                    <td>{{ $beneficio->descripcion }}</td>
                    <td>{{ $beneficio->descuento }}</td>
                    <td>
                        <a href="{{ route('beneficios.edit', $beneficio->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('beneficios.destroy', $beneficio->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este beneficio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
