{{-- resources/views/admin/clientes/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Registrar nuevo cliente</h2>

    <form action="{{ route('clientes.store') }}" method="POST">
        @include('admin.clientes.partials.form')
    </form>
</div>
@endsection
