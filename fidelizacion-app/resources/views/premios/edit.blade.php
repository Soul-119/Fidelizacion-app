@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Editar Premio</h2>

    <form action="{{ route('premios.update', $premio->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="{{ $premio->nombre }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion">{{ $premio->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Puntos requeridos:</label>
            <input type="number" class="form-control" name="puntos" value="{{ $premio->puntos }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('premios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
