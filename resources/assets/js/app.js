require('./bootstrap');
window.Vue = require('vue');

import Vuex from 'vuex'
import axios from "axios";
Vue.use(Vuex)

import storeData from "./process/requests"
const store = new Vuex.Store(
    storeData
)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {
    routes
} from './routes';

//import AdminMaster from './components/admin/AdminMaster.vue'
Vue.component('admin-main', require('./components/admin/AdminMaster.vue'));
Vue.component('frontend-main', require('./components/frontEnd/FrontEndMaster.vue'));
Vue.component('frontend-menu', require('./components/frontEnd/FrontEndMenu.vue'));

Vue.component('pagination', require('laravel-vue-pagination'));


// V-form
/* import {
    Form,
    HasError,
    AlertError
} from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form; */

// Sweet alert 2
import swal from 'sweetalert2'
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.toast = toast

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'hash'
})

const app = new Vue({
    el: '#app',
    router,
    store,
    // components: {
    //     AdminMaster
    // }
});