import Vue from "vue";
import VueRouter from "vue-router";

import Login from '../Pages/Login'
import Dashboard from '../Pages/Dashboard'
import store from "../store";



Vue.use(VueRouter);

const routes = [
	{
		path: "/login",
		name: "login",
		component: Login ,
		meta: {
			title: 'Login',
			
		}
	},
	{
			path: "/",
			name: "dashboard",
			component: Dashboard,
			meta: {
				title: 'Dashboard',
				requiredAuth: true
			}
	}
]
const router = new VueRouter({
	mode: "history",
	base: process.env.BASE_URL,
	routes,
});

router.beforeEach((to, from, next) => {
	console.log(store.state.auth.authenticated);
	if (to.name=='login' && store.state.auth.authenticated) {
        next({name: 'home'})
    }
	else if(to.matched.some(record => record.meta.requiredAuth) && !store.state.auth.authenticated)
	{
		
		next({name: 'login'})
	}else{
		next();
	}
})

export default router;