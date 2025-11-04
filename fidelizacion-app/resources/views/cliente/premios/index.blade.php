@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold text-success mb-4">Premios Disponibles</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($premios as $premio)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 rounded-4 bg-white">
                <div class="card-body">
                    <h5 class="card-title text-success">{{ $premio->nombre }}</h5>
                    <p class="card-text">{{ $premio->descripcion }}</p>
                    <p class="fw-bold">Puntos: {{ $premio->puntos }}</p>
                    <button class="btn btn-outline-success w-100 mt-2">Canjear</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

