@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold text-info mb-4">Beneficios y Convenios</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($beneficios as $beneficio)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 rounded-4 bg-light">
                <div class="card-body">
                    <h5 class="card-title text-info">{{ $beneficio->empresa }}</h5>
                    <p class="card-text">{{ $beneficio->descripcion }}</p>
                    <p class="text-muted small">Descuento: {{ $beneficio->descuento }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
