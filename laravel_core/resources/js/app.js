import './bootstrap';

import Alpine from 'alpinejs';
Alpine.start();

window.addEventListener('alert', (event) => {
    console.log(event);
})
