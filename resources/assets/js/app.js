
require('./bootstrap');
window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';

//import AdminMaster from './components/admin/AdminMaster.vue'
Vue.component('admin-main', require('./components/admin/AdminMaster.vue'));

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'hash'
})

const app = new Vue({
    el: '#app',
    router
    // components: {
    //     AdminMaster
    // }
});
