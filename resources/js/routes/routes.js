
//importa o vue
import Vue from 'vue'
//importa o vue-router
import VueRouter from 'vue-router'

//vue vai usar o arquivo de rotas
Vue.use(VueRouter);

const routes = [
    //aqui vem as rotas do SPA
]


const router = new VueRouter({
    routes
})
//exporta por padrão o router
export default router