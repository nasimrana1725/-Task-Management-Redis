require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import App from './components/App';
import routes from './routes';
const router = new VueRouter({
    mode: 'history',
    routes: routes
});
import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

const app = new Vue({
    el:"#app",
    render: h => h(App),
    router: router,
});
