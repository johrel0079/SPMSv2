import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

import auth from "./module/auth";
import user from "./module/user";

export default new Vuex.Store({
    state: {

    },
    mutations: {

    },
    actions: {

    },
    modules: {
      auth,
      user
    }
});