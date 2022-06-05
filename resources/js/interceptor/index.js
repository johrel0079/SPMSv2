import axios from 'axios';
import store from '../store';


export default function setupInterceptor() {
    axios.interceptors.request.use(
        (config) => {
            let token = localStorage.getItem('auth_token');
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