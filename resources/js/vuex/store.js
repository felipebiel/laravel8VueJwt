//importa o vue
import Vue from 'vue'
//importa o vuex
import Vuex from 'vuex'

//Importação dos modulos
import Example from './example/example'

//vue usa o vuex
Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        //aqui vem a importação de todos os vuex dos modulos exemplo abaixo:
        example: Example
    }
})

export default store