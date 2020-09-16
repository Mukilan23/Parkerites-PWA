
self.addEventListener('install', function(e) {
  e.waitUntil(
    caches.open('the-magic-cache').then(function(cache) {
      return cache.addAll([
        '/',
        '/register.php',
        '/login.php',
        '/css/layout.css',
        '/css/login.css',
        '/css/master.css',
        '/css/materialize.css',
        '/scripts/errors.php',
        '/scripts/login.php',
        '/scripts/materialize.js',
        '/scripts/signup.php',
        '/booking.html',
        '/index.html',
        '/index.php',
        '/index1.php',
        '/login.php',
        '/manifest.json',
        '/master.js',
        '/parking.jpg',
        '/register.php',
        '/status.php',
        '/sw.js'
      ]);
    })
  );
});



self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});
self.addEventListener('push', function(event) {
  event.waitUntil(
    self.registration.showNotification('Got Push?', {
      body: 'Push Message received'
   }));
});
