@extends('layouts.app')

@section('content')
@php
    $palabras = ['manzana', 'tigre', 'continente', 'azul', 'mariposa', 'fidelidad', 'verano', 'lluvia', 'luz', 'código'];
    $clave = $palabras[array_rand($palabras)];
@endphp

<div class="container text-center py-5">
    <h2 class="mb-4">Verificación por Voz</h2>
    <p class="fs-5">Por favor, di en voz alta o escribe la siguiente palabra:</p>
    <h3 class="fw-bold text-primary">{{ $clave }}</h3>

    <button id="start-btn" class="btn btn-outline-primary mt-3">Iniciar reconocimiento por voz</button>

    <div class="mt-4">
        <label for="input-verificacion" class="form-label">O escríbela aquí si no tienes micrófono:</label>
        <input type="text" id="input-verificacion" class="form-control w-50 mx-auto" placeholder="Escribe la palabra" />
        <button id="verificar-escrito" class="btn btn-success mt-3">Verificar</button>
    </div>

    <p class="mt-4 text-muted" id="resultado"></p>
</div>

<script>
    const palabraClave = "{{ $clave }}".toLowerCase();
    const rutaRedireccion = "{{ Auth::user()->rol === 'admin' ? route('admin.dashboard') : route('cliente.dashboard') }}";

    // Verificación escrita
    document.getElementById('verificar-escrito').addEventListener('click', function () {
        const entrada = document.getElementById('input-verificacion').value.toLowerCase();
        if (entrada === palabraClave) {
            window.location.href = rutaRedireccion;
        } else {
            alert('Palabra incorrecta. Inténtalo de nuevo.');
        }
    });

    // Reconocimiento por voz
    document.getElementById('start-btn').addEventListener('click', function () {
        if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
            alert('Tu navegador no soporta reconocimiento de voz.');
            return;
        }

        const reconocimiento = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        reconocimiento.lang = 'es-ES';
        reconocimiento.start();

        reconocimiento.onresult = function(event) {
            const texto = event.results[0][0].transcript.toLowerCase();
            document.getElementById('resultado').textContent = 'Dijiste: ' + texto;

            if (texto.includes(palabraClave)) {
                window.location.href = rutaRedireccion;
            } else {
                alert('Palabra incorrecta. Intenta de nuevo.');
            }
        };

        reconocimiento.onerror = function(event) {
            alert('Error: ' + event.error);
        };
    });
</script>
@endsection
