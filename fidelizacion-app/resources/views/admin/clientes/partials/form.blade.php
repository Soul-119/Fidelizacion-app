@csrf

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $cliente->apellidos ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="telefono" class="form-label">Teléfono</label>
    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Correo electrónico</label>
    <input type="correo" name="correo" id="correo" class="form-control" value="{{ old('Correo', $cliente->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion ?? '') }}">
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <input type="text" name="estado" id="estado" class="form-control" value="{{ old('estado', $cliente->estado ?? '') }}">
</div>

<div class="mb-3">
    <label for="ciudad" class="form-label">Ciudad</label>
    <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad', $cliente->ciudad ?? '') }}">
</div>

<div class="mb-3">
    <label for="puntos" class="form-label">Puntos</label>
    <input type="number" name="puntos" id="puntos" class="form-control" value="{{ old('puntos', $cliente->puntos ?? 0) }}">
</div>

<div class="mb-3">
    <label for="password" class="form-label">Contraseña {{ isset($cliente) ? '(dejar en blanco si no se cambia)' : '' }}</label>
    <input type="password" name="password" id="password" class="form-control" {{ isset($cliente) ? '' : 'required' }}>
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($cliente) ? 'Actualizar Cliente' : 'Registrar Cliente' }}
</button>
