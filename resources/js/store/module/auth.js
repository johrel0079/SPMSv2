import axios from 'axios';

export default {
    namespaced: true,
    state:{
        authenticated: false,
        token: null
    },
    getters: {
        authenticated(state) {
            return state.authenticated;
        },
        token(state) {
            return state.token;
        }
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            state.authenticated = value;
        },
        SET_TOKEN (state, value) {
            state.token = value;
        }
    },
    actions:{
        login({commit, dispatch}, token) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

            commit('SET_TOKEN', token);
            commit('SET_AUTHENTICATED', true);

            // dispatch('user/setUser', null, { root: true });
        },
        logout({commit, dispatch}) {
            console.log('logout vuex');
            
            delete axios.defaults.headers.common['Authorization'];

            commit('SET_AUTHENTICATED', false);
            commit('SET_TOKEN', {});
            // dispatch('user/removeUser', null, { root: true });
        }
    }
};