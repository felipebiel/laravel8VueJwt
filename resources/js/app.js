//chama o arquivo bootstrap.js
require('./bootstrap');

/* Importanto o Vue.js */
window.Vue = require('vue');

/*IMPORTANDO AS ROTAS */
import router from './routes/routes'
/*IMPORTA O VUEX */
import store from './vuex/store'


/*Componentes globais*/

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/*Instanciando o vue.js */
const app = new Vue({
    el: '#app',
    router,
    store,
})