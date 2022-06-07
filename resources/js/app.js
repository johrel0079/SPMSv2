/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import Vuex from 'vuex';
import store from "./store";
import router from "./router";
require('./bootstrap');

Vue.config.productionTip = false;

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
    // Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.use(Vuex);

// import "../src/template/assets/sass/views/custom-tabs.scss";
// import "../src/template/assets/sass/views/custom-cards.scss";
// import VuePapaParse from 'vue-papa-parse'
// import VueConfirmDialog from 'vue-confirm-dialog'
// import ToggleButton from "vue-js-toggle-button";
// import Multiselect from 'vue-multiselect';
// import "vue-multiselect/dist/vue-multiselect.min.css";
// import VueMask from 'v-mask'
// import SearchTemplate from "./views/ReUsables/SearchTemplate.vue";
import Multiselect from 'vue-multiselect';
import "vue-multiselect/dist/vue-multiselect.min.css";
Vue.component('multiselect', Multiselect)
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const options = {
    position: "top-right",
    timeout: 5000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 0.6,
    showCloseButtonOnHover: false,
    hideProgressBar: true,
    closeButton: "button",
    icon: true,
    rtl: false

};


Vue.use(Toast, options);

import axios from 'axios'
Vue.prototype.axios = axios;
Vue.prototype.$http = axios;
window.Vue = require('vue').default;

import setupInterceptor from './interceptor';
setupInterceptor();
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

Vue.component('log-in', require('./Pages/Login.vue').default);
Vue.component('nav-bar', require('./components/Reusables/NavBar.vue').default);
Vue.component('table-component', require('./components/Reusables/Table.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import App from './Pages/App.vue'

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        App
    }
});