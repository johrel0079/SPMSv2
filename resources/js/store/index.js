import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

import auth from "./module/auth";
// import alpha from "../modules/alpha";
// import login from './modules/login';
// import user_management from "./modules/user_management";
// import position from "./modules/position";
// import section from "./modules/section";
// import role from "./modules/role";

export default new Vuex.Store({
    state: {

    },
    mutations: {

    },
    actions: {

    },
    modules: {
      auth
    }
});