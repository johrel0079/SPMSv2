import Vue from "vue";
import VueRouter from "vue-router";

import Login from '../Pages/Login'



Vue.use(VueRouter);

const routes = [
	{
		path: "/login",
		name: "login",
		component: Login ,
	}
]
const router = new VueRouter({
	mode: "history",
	base: process.env.BASE_URL,
	routes,
});

router.beforeEach((to, from, next) => {
	if (to.name=='login') {
        next()
    }
	else
	{
		next()
	}
})

export default router;