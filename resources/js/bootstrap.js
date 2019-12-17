
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    /* importa o bootstrap */
    require('bootstrap');
    /* importa o admin-lte */
    require('admin-lte');
} catch (e) {}

/* importa o axios */
window.axios = require('axios');
/* seta o filtro de ajax no axios */
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/* Meta tag de segurança no axios para evitar o erro de csrf-token */
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}