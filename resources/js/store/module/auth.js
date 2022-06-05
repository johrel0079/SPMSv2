import axios from 'axios';
import router from '../../router';
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
            
            localStorage.setItem('auth_token', token);
            localStorage.setItem('is_authenticated', true);
            commit('SET_TOKEN', token);
            commit('SET_AUTHENTICATED', true);

            dispatch('user/setUser', null, { root: true });
        },
        logout({commit}) {  
            delete axios.defaults.headers.common['Authorization'];

            localStorage.removeItem('auth_token');
            localStorage.removeItem('is_authenticated');
            localStorage.removeItem('user_info');
        
            commit('SET_AUTHENTICATED', false);
            commit('SET_TOKEN', {});
            router.push('/login');

            // dispatch('user/removeUser', null, { root: true });
        }
    }
};