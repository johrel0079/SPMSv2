import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store";

import Login from '../Pages/Login'
import Dashboard from '../Pages/Dashboard'
import AreaCode from '../Pages/Management/AreaCode/Index'
import MasterData from "../Pages/Monitoring/MasterData/Index"
import TicketIssuance from "../Pages/Transactions/Issuance/Index"
import Distribution from "../Pages/Transactions/Distribution/Index"
import Picking from "../Pages/Transactions/Picking/Index"
import CheckingAndPalletizing from "../Pages/Transactions/CheckingAndPalletizing/Index"
import PartsForDR from "../Pages/Transactions/PartsForDR/Index"
import UpdateDelivery from "../Pages/Transactions/UpdateDelivery/Index"	


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
		path: "/transactions/ticket-issuance",
		name: 'transactions/ticket-issuance',
		component: TicketIssuance,
		meta: {
			title: 'Ticket Issuance',
			requiredAuth: true
		}
	},
	{
		path: "/transactions/distribution",
		name: 'transactions/distribution',
		component: Distribution,
		meta: {
			title: 'Distribution',
			requiredAuth: true
		}
	},
	{
		path: "/transactions/picking",
		name: 'transactions/picking',
		component: Picking,
		meta: {
			title: 'Picking',
			requiredAuth: true
		}
	},
	{
		path: "/transactions/checking-and-palletizing",
		name: 'transactions/checking-and-palletizing',
		component: CheckingAndPalletizing,
		meta: {
			title: 'Checking and Palletizing',
			requiredAuth: true
		}
	},
	{
		path: "/transactions/parts-for-dr",
		name: 'transactions/parts-for-dr',
		component: PartsForDR,
		meta: {
			title: 'Parts for DR',
			requiredAuth: true
		}
	},
	{
		path: "/transactions/update-delivery",
		name: 'transactions/update-delivery',
		component: UpdateDelivery,
		meta: {
			title: 'Update Delivery',
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