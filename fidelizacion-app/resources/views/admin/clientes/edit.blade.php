{{-- resources/views/admin/clientes/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Editar cliente</h2>

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.clientes.partials.form')
    </form>
</div>
@endsection

