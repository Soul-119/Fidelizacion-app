@extends('layouts.app')

@section('content')
<script>
document.addEventListener('DOMContentLoaded', async () => {
  if ('Notification' in window && navigator.serviceWorker) {
    const permiso = await Notification.requestPermission();

    if (permiso === 'granted') {
      const registration = await navigator.serviceWorker.ready;

      // Aquí simulamos que hay un nuevo premio
      // En producción, esto se puede reemplazar con una llamada AJAX que verifique el backend
      setTimeout(() => {
        registration.active.postMessage({
          action: 'push-test',
          title: '¡Nuevo premio disponible! 🎁',
          body: 'Se ha agregado un nuevo premio a tu cuenta. ¡Ve a verlo!',
          url: '/cliente/premios'
        });
      }, 4000);
    }
  }
});
</script>

<div class="container py-5">
            <div class="card shadow rounded-4 border-0 bg-light">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Hola, {{ $cliente->nombre }} {{ $cliente->apellidos }}</h5>
                    <p class="card-text mb-3">Gracias por formar parte de nuestro programa de fidelización.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Puntos disponibles: {{ $cliente->puntos }}</li>
                    </ul>
                </div>
            </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-5">
            <a href="{{ route('cliente.premios') }}" class="btn btn-primary w-100 py-3 fw-semibold rounded-pill">
                Ver Premios
            </a>
        </div>
        <div class="col-md-5">
            <a href="{{ route('cliente.beneficios') }}" class="btn btn-info w-100 py-3 fw-semibold rounded-pill">
                Ver Beneficios
            </a>
        </div>
    </div>
</div>
<div id="listaContactos" class="mt-3">
                <button id="btnContactos" class="btn btn-warning rounded-pill fw-semibold mt-3">
                📇 Importar Contactos
                </button>
            </div>
<script>
document.addEventListener('DOMContentLoaded', async () => {
  if ('Notification' in window && navigator.serviceWorker) {
    const permiso = await Notification.requestPermission();
    if (permiso !== 'granted') return;

    const registration = await navigator.serviceWorker.ready;

    // Comprobar nuevas notificaciones cada 20 segundos
    setInterval(async () => {
      const res = await fetch('/api/notificaciones');
      const data = await res.json();

      if (data.length > 0) {
        const noti = data[0];
        registration.active.postMessage({
          action: 'push-test',
          title: noti.titulo,
          body: noti.mensaje,
          url: '/cliente/premios'
        });

        // Marcar como vista
        await fetch(`/api/marcar-vista/${noti.id}`, { method: 'POST' });
      }
    }, 20000);
  }
});
</script>
<script>
document.getElementById("btnContactos").addEventListener("click", async () => {
    if (!("contacts" in navigator && "ContactsManager" in window)) {
        alert("❌ Tu navegador no soporta la API de contactos.");
        return;
    }

    try {
        const props = ["name", "tel", "email"];
        const opts = { multiple: true };

        const contactos = await navigator.contacts.select(props, opts);

        let html = "<h5>📇 Contactos seleccionados:</h5><ul class='list-group'>";

        contactos.forEach(c => {
            html += `
                <li class="list-group-item">
                    <strong>Nombre:</strong> ${c.name?.join(", ")} <br>
                    <strong>Tel:</strong> ${c.tel?.join(", ")} <br>
                    <strong>Email:</strong> ${c.email?.join(", ")}
                </li>
            `;
        });

        html += "</ul>";
        document.getElementById("listaContactos").innerHTML = html;

        console.log("Contactos importados:", contactos);

    } catch (err) {
        console.error("Error al seleccionar contactos", err);
    }
});
</script>

@endsection
