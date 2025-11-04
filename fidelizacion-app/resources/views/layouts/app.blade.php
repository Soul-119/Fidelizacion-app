<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- manifest -->
        <link rel="manifest" href="{{ asset('manifest.json') }}">
        <meta name="theme-color" content="#0d6efd">
        <!-- layouts/app.blade.php al final del body -->
<script src="{{ asset('js/upup.min.js') }}"></script>
<script>
  if (window.UpUp && 'serviceWorker' in navigator) {
    UpUp.start({
      'content-url': '{{ asset("offline.html") }}', // página offline
      // lista de assets que quieres cachear (ajusta rutas)
      'assets': [
        '{{ asset("manifest.json") }}',
        '{{ asset("icons/icon-192.png") }}',
        '{{ asset("icons/icon-512.png") }}'
      ]
    });
  } else {
    console.log("UpUp no disponible o Service Worker no soportado");
  }
</script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
  if (!("Notification" in window)) {
    console.log("El navegador no soporta notificaciones.");
    return;
  }

  let permission = await Notification.requestPermission();
  if (permission === "granted") {
    console.log(" Permiso de notificación concedido.");
    registrarPush();
  } else {
    console.log(" Permiso de notificación denegado.");
  }
});

async function registrarPush() {
  if (!('serviceWorker' in navigator)) {
    console.log("Service Worker no soportado.");
    return;
  }

  const registration = await navigator.serviceWorker.ready;
  console.log("Service Worker listo para notificaciones.");

  // Simulación de notificación
  setTimeout(() => {
    registration.active.postMessage({
      action: 'push-test',
      title: '¡Bienvenido!',
      body: 'Tu sistema de fidelización ya puede recibir notificaciones 🚀',
      url: '/dashboard'
    });
  }, 3000);
}
</script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
    @yield('content')
            </main>
        </div>
<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker.js')
        .then(reg => console.log('SW registrado:', reg))
        .catch(err => console.log('Error al registrar SW:', err));
}
</script>
<script src="/js/upup.min.js"></script>

    </body>
</html>
