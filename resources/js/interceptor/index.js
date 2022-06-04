import axios from 'axios';
import store from '../store';


export default function setupInterceptor() {
    axios.interceptors.request.use(
        (config) => {
            let token = store.state.auth.token;
            if(token){
                config.headers['Authorization'] = `Bearer ${ token }`
            }
            return config;
        },
        (error) => {
            return Promise.reject(error);
        }
    );
}