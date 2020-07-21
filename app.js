// window.addEventListener('load', e => {
//     // new PWAConfApp();
//     registerSW(); 
// });

// async function registerSW() { 
//     if ('serviceWorker' in navigator) { 
//         try {
//         await navigator.serviceWorker.register('./sw.js'); 
//         } catch (e) {
//         alert('ServiceWorker registration failed. Sorry about that.'); 
//         }
//     } else {
//         document.querySelector('.alert').removeAttribute('hidden'); 
//     }
// }

if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('/sw.js').then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }, function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
      });
    });
  }