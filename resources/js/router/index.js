import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store";

import Login from '../Pages/Login'
import Dashboard from '../Pages/Dashboard'
import AreaCode from '../Pages/Management/AreaCode/Index'
import MasterData from "../Pages/Monitoring/MasterData/Index"



Vue.use(VueRouter);

const routes = [{
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            title: 'Login',

        }
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
        meta: {
            title: 'Dashboard',
            requiredAuth: true
        }
    },
    {
        path: "/area-code",
        name: 'area-code',
        component: AreaCode,
        meta: {
            title: 'Area Code',
            requiredAuth: true
        }
    },
	{
		path: "/monitoring/master-data",
		name: 'monitoring/master-data',
		component: MasterData,
		meta: {
			title: 'Master Data',
			requiredAuth: true
		}
	},
    {
        path: '*',
        redirect: '/login'
    }
]
const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});

router.beforeEach((to, from, next) => {

    if (to.name == 'login' && localStorage.getItem('is_authenticated')) {
        console.log('done')
        next({ name: 'dashboard' })
    } else if (to.matched.some(record => record.meta.requiredAuth) && !localStorage.getItem('is_authenticated')) {
        console.log('yes')
        next({ name: 'login' })
    } else {
        next();
    }
})

export default router;