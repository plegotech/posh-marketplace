
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
    document.title = to.meta.title
    next()
    if(to.meta.middleware=="guest"){
        if(store.state.auth.authenticated) {
            switch (state.auth.user.user_type) {
                case 'admin':
                    next({name:"dashboard"});
                    break;
                case 'vendor':
                    next({name:"forbidden"});
                    break;
                case 'seller':
                    next({name:"forbidden"});
                    break;
            }
        }
        next()
    } else {
        if(store.state.auth.authenticated){
            switch (state.auth.user.user_type) {
                case 'admin':
                    next({name:"dashboard"});
                    break;
                case 'vendor':
                    next({name:"forbidden"});
                    break;
                case 'seller':
                    next({name:"forbidden"});
                    break;
            }
        }else{
            next({name:"login"})
        }
    }
});

const app = new Vue({
    el: '#app',
    router: Router,
    store:store,
    datepicker: Datepicker
});
