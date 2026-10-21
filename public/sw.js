// iCEEDS Progressive Web App Service Worker
const CACHE_NAME = 'iceeds-cache-v1';
const PRECACHE_ASSETS = [
    '/',
    '/manifest.json',
    '/images/iceeds-pwa.webp',
    '/storage/media/2026/10/iceeds-pwa-igaapf.webp',
    '/android-chrome-192x192.png',
    '/android-chrome-512x512.png',
    '/favicon.ico'
];

// Install: precache critical shell assets
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(PRECACHE_ASSETS).catch((err) => {
                console.warn('[SW] Precache asset fetch warning:', err);
            });
        }).then(() => self.skipWaiting())
    );
});

// Activate: purge older caches
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

// Fetch: Network-first for dynamic navigation, Cache-first/Stale-while-revalidate for static assets
self.addEventListener('fetch', (event) => {
    const request = event.request;

    // Only handle GET requests and http/https schemes
    if (request.method !== 'GET' || !request.url.startsWith('http')) {
        return;
    }

    // Ignore admin and auth actions from offline caching
    const url = new URL(request.url);
    if (url.pathname.startsWith('/admin') || url.pathname.startsWith('/logout') || url.pathname.startsWith('/login')) {
        return;
    }

    // For HTML navigation requests: Network First, fallback to cached '/' if offline
    if (request.mode === 'navigate') {
        event.respondWith(
            fetch(request).then((networkResponse) => {
                if (networkResponse && networkResponse.status === 200) {
                    const responseClone = networkResponse.clone();
                    caches.open(CACHE_NAME).then((cache) => cache.put(request, responseClone));
                }
                return networkResponse;
            }).catch(() => {
                return caches.match(request).then((cachedResponse) => {
                    return cachedResponse || caches.match('/');
                });
            })
        );
        return;
    }

    // For static assets (images, fonts, css, js): Stale-While-Revalidate
    event.respondWith(
        caches.match(request).then((cachedResponse) => {
            const fetchPromise = fetch(request).then((networkResponse) => {
                if (networkResponse && networkResponse.status === 200) {
                    const responseClone = networkResponse.clone();
                    caches.open(CACHE_NAME).then((cache) => cache.put(request, responseClone));
                }
                return networkResponse;
            }).catch(() => cachedResponse);

            return cachedResponse || fetchPromise;
        })
    );
});
