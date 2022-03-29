
require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import Datepicker from 'vuejs-datepicker';
import routes from './routes';
import store from './store'
import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(VueRouter);
Vue.use(BootstrapVue);

const Router = new VueRouter(routes);

Router.beforeEach((to, from, next) => {
    document.title = 'POSH | ' + to.meta.title;

    var x = document.getElementsByClassName("navbar-brand");
    for(var i = 0; i < x.length; i++) {
        x[i].innerText = to.meta.title;
        x[i].innerHTML = to.meta.title;
    }

    next();
});

const app = new Vue({
    el: '#app',
    router: Router,
    store:store,
    datepicker: Datepicker
});
