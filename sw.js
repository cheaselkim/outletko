self.addEventListener("activate", event => {
    console.log('Activate!');
});  

self.addEventListener('fetch', async event => {
    console.log('fetch event')
});


self.addEventListener('install', async event => {
    console.log('install event')
});
  

const cacheName = 'pwa-conf-v1';
const staticAssets = [
    './',
    './outletko',
    'application/views/login.php',
    'assets/css/bootstrap.min.css',
    'assets/css/login5.min.css',
    'assets/css/sweetalert.css',
    'assets/css/jquery-ui.css',
    'assets/js/jquery.min.js',
    'assets/js/bootstrap.min.js',
    'assets/js/all.min.js',
    'assets/js/sweetalert.min.js',
    'assets/js/jquery-ui.min.js',
    'js/ecommerce/signup_login.js',
    'js/login.js',
    'js/featured_outlet.min.js'
];  

// self.addEventListener('install', async event => {
//     const cache = await caches.open(cacheName); 
//     await cache.addAll(staticAssets); 
// });  



self.addEventListener('install', (e) => {
    console.log('[Service Worker] Install');
    e.waitUntil(
      caches.open(cacheName).then((cache) => {
        console.log('[Service Worker] Caching all: app shell and content');
        // console.log(staticAssets);
        return cache.addAll(staticAssets);
      })
    );
  });

// self.addEventListener('install', function(event) {
//     event.waitUntil(
//       caches.open(cacheName).then(function(cache) {
//         return cache.addAll(
//           [
//             './application/views/login.php',
//             './assets/css/bootstrap.min.css',
//             './assets/css/login4.css',
//             './assets/css/login3.css',
//             './assets/css/sweetalert.css',
//             './assets/css/jquery-ui.css',
//             './assets/js/jquery.min.js',
//             './assets/js/bootstrap.min.js',
//             './assets/js/all.js',
//             './assets/js/style.js',
//             './assets/js/sweetalert.min.js',
//             './assets/js/jquery-ui.js',
//             './js/ecommerce/signup_login.js',
//             './js/login.js',
//             './js/featured_outlet.js'
//             ]
//         );
//       })
//     );
// });

