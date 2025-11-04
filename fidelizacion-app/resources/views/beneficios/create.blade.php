@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Registrar Beneficio</h2>

    <form action="{{ route('beneficios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Empresa:</label>
            <input type="text" class="form-control" name="empresa" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Descuento (%):</label>
            <input type="number" class="form-control" name="descuento" step="0.01">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('beneficios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
