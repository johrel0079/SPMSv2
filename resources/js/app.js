/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vue from 'vue'
 import Vuex from 'vuex';
require('./bootstrap');

Vue.config.productionTip = false;

import { BootstrapVue,BootstrapVueIcons } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
// import "../src/template/assets/sass/views/custom-tabs.scss";
// import "../src/template/assets/sass/views/custom-cards.scss";
// import VuePapaParse from 'vue-papa-parse'
// import VueConfirmDialog from 'vue-confirm-dialog'
// import ToggleButton from "vue-js-toggle-button";
// import Multiselect from 'vue-multiselect';
// import "vue-multiselect/dist/vue-multiselect.min.css";
// import VueMask from 'v-mask'
// import SearchTemplate from "./views/ReUsables/SearchTemplate.vue";

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
Vue.use(Vuex);
// Vue.use(VuePapaParse)
// Vue.use(VueConfirmDialog)
// Vue.use(ToggleButton);
// // Vue.use(VueMask);
// Vue.component('multiselect', Multiselect)
// Vue.component('SearchTemplate', SearchTemplate)

import axios from 'axios'
Vue.prototype.axios = axios;
Vue.prototype.$http = axios;
window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('nav-bar', require('./components/Reusables/NavBar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import App from './Pages/App.vue'
import store from "./store";
import router from "./router";
const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        App
    }
});

