
const CACHE_NAME = "fidelizacion-cache-v1";
const urlsToCache = [
    '/offline.html',
    '/manifest.json',
    '/js/upup.sw.js',
    '/upup.sw.min.js',
    '/js/upup.min.js'
];

// Instalación del Service Worker
self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll(urlsToCache);
    })
  );
});

// Activación del Service Worker
self.addEventListener("activate", (event) => {
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames
          .filter((name) => name !== CACHE_NAME)
          .map((name) => caches.delete(name))
      );
    })
  );
});

// Interceptar peticiones
self.addEventListener("fetch", (event) => {
  const request = event.request;

  // Para HTML → intenta red y si falla offline.html
  if (
    request.mode === 'navigate' ||
    (request.method === 'GET' && request.headers.get('accept').includes('text/html'))
  ) {
    event.respondWith(
      fetch(request).catch(() =>
        caches.match('/fidelizacion-app/public/offline.html')
      )
    );
    return;
  }

  // Para otros recursos → cache primero o red
  event.respondWith(
    caches.match(request).then((response) => response || fetch(request))
  );
});

// Escuchar mensajes desde la app (postMessage)
self.addEventListener('message', (event) => {
  if (event.data && event.data.action === 'push-test') {
    const title = event.data.title || "Notificación";
    const options = {
      body: event.data.body || "",
      icon: "icon-192.png",
      badge: "icon-192.png",
      data: { url: event.data.url || "/" }
    };
    self.registration.showNotification(title, options);
  }
});

// Permitir abrir la app al hacer clic en la notificación
self.addEventListener('notificationclick', (event) => {
  event.notification.close();
  const urlToOpen = event.notification.data?.url || '/';
  event.waitUntil(clients.openWindow(urlToOpen));
});


