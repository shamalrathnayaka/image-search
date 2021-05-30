require('./bootstrap');
import vue from 'vue'
window.Vue = vue;

import App from './components/App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import VueGeolocation from "vue-browser-geolocation/src";
import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueGeolocation);
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyCNoUe39-1z_arRo1tJeKk0VYDJ57WuX4A'
    }
});

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
