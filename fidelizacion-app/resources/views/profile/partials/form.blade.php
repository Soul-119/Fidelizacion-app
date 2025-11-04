@csrf

<div class="mb-3">
    <label for="telefono" class="form-label">Teléfono Móvil</label>
    <input type="text" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror"
        value="{{ old('telefono', $cliente->telefono ?? '') }}" required>
    @error('telefono')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"
        value="{{ old('nombre', $cliente->nombre ?? '') }}" required>
    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" class="form-control @error('apellidos') is-invalid @enderror"
        value="{{ old('apellidos', $cliente->apellidos ?? '') }}" required>
    @error('apellidos')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Correo Electrónico</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $cliente->email ?? '') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror"
        value="{{ old('direccion', $cliente->direccion ?? '') }}">
    @error('direccion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror"
            value="{{ old('estado', $cliente->estado ?? '') }}">
        @error('estado')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="ciudad" class="form-label">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" class="form-control @error('ciudad') is-invalid @enderror"
            value="{{ old('ciudad', $cliente->ciudad ?? '') }}">
        @error('ciudad')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="puntos" class="form-label">Puntos</label>
    <input type="number" name="puntos" id="puntos" class="form-control @error('puntos') is-invalid @enderror"
        value="{{ old('puntos', $cliente->puntos ?? 0) }}" min="0" step="1">
    @error('puntos')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">{{ isset($cliente) ? 'Nueva Contraseña (dejar en blanco para no cambiar)' : 'Contraseña' }}</label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
        {{ isset($cliente) ? '' : 'required' }}>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $btnText ?? 'Guardar' }}</button>
