import Vue from "vue";
import VueRouter from "vue-router";

import Login from '../Pages/Login'
import TheContainer from '../layout/TheContainer'



Vue.use(VueRouter);

const routes = [
	{
		path: "/login",
		name: "login",
		component: Login ,
	},
	{
			path: "/",
			name: "dashboard",
			component: TheContainer,
	}
]
const router = new VueRouter({
	mode: "history",
	base: process.env.BASE_URL,
	routes,
});

router.beforeEach((to, from, next) => {
	if (to.name=='login') {
        next({name: 'dashboard'})
    }
	else
	{
		next()
	}
})

export default router;