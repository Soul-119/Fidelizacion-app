@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Crear Nuevo Premio</h2>

    <form action="{{ route('premios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion"></textarea>
        </div>

        <div class="mb-3">
            <label for="puntos" class="form-label">Puntos requeridos:</label>
            <input type="number" class="form-control" name="puntos" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('premios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
