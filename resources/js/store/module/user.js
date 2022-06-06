import axios from 'axios';
import router from '../../router';

export default {
    namespaced: true,
    state: {
        user: [],
    },
    getters: {
        user: state => {
            return state.user
        }
    },
    mutations: {
        SET_USER(state, value) {
            state.user = value;
        },
        SET_TOKEN(state, value) {
            state.token = value;
        }
    },
    actions: {
        async setUser({ commit }) {
            return await axios.get('api/user-authenticate').then((response) => {
                commit('SET_USER', response.data.data);
                if (localStorage.getItem('user_info') === null) {
                    localStorage.setItem('user_info', JSON.stringify(response.data.data));
                    setTimeout(function() {
                        router.push('/dashboard')
                    }, 500);
                }
            }).catch((response) => {

            });
        }
    }
};