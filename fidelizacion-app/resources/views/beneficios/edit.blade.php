@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Editar Beneficio</h2>

    <form action="{{ route('beneficios.update', $beneficio->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Empresa:</label>
            <input type="text" class="form-control" name="empresa" value="{{ $beneficio->empresa }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion">{{ $beneficio->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Descuento (%):</label>
            <input type="number" class="form-control" name="descuento" value="{{ $beneficio->descuento }}" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('beneficios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
