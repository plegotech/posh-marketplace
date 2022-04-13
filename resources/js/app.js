
require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import Datepicker from 'vuejs-datepicker';
import routes from './routes';
import store from './store'
import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
//import CKEditor from '@ckeditor/ckeditor5-vue2'

import CKEditor from '@ckeditor/ckeditor5-vue';
import CKEditorClassicCustom from './components/ckeditor-classic-custom';

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(CKEditor);
Vue.component('ckeditor-classic-custom', CKEditorClassicCustom);
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
