import {
    createWebHistory,
    createRouter
} from "vue-router";
import axios from "axios";

/*
WEBSITE 
Routes
*/
const Home = () => import('../Pages/Order.vue');
const WaitingList = () => import('../Pages/WaitingList.vue');
const DeliveredList = () => import('../Pages/DeliveredList.vue');
const TakeoutList = () => import('../Pages/TakeoutList.vue');
const InventoryList = () => import('../Pages/InventoryList.vue');
const ConstructionHistory = () => import('../Pages/ConstructionHistory.vue');
const Registration = () => import('../Pages/Registration.vue');
const WarehouseRegistration = () => import('../Pages/WarehouseRegistration.vue');
const SupplierRegisration = () => import('../Pages/SupplierRegisration.vue');
const SiteRegistration = () => import('../Pages/SiteRegistration.vue');
const GmMasterRegistration = () => import('../Pages/GmMasterRegisteration.vue');
const Error = () => import('../Pages/Error.vue');
const Login = () => import('../Components/Login.vue');


const PageNotFound = () => import('../Pages/PageNotFound.vue');


export const routes = [
    // Website Routes
    {
        name: 'Login',
        path: '/',
        component: Login,
        meta: {
            title: "Login",
        },
        beforeEnter: (to, from, next) => {
            axios.get('/api/auth-login')
            .then((response) => {
                if (response.data.success == true) {
                    next('/order')
                } else {
                    next()
                }
            });
        },
    },
    {
        name: 'WaitingList',
        path: '/waiting-list',
        component: WaitingList,
        meta: {
            auth: true,
            title: "WaitingList"
        }
    },
    {
        name: 'DeliveredList',
        path: '/delivered-list',
        component: DeliveredList,
        meta: {
            auth: true,
            title: "DeliveredList"
        }
    },
    {
        name: 'TakeoutList',
        path: '/takeout-list',
        component: TakeoutList,
        meta: {
            auth: true,
            title: "TakeoutList"
        }
    },
    {
        name: 'InventoryList',
        path: '/inventory-list',
        component: InventoryList,
        meta: {
            auth: true,
            title: "TakeoutList"
        }
    },
    {
        name: 'Registration',
        path: '/account-registration',
        component: Registration,
        meta: {
            auth: true,
            title: "Registration"
        }
    },
    {
        name: 'ConstructionHistory',
        path: '/construction-history',
        component: ConstructionHistory,
        meta: {
            auth: true,
            title: "ConstructionHistory "
        }
    },
    {
        name: 'MasterRegistration',
        path: '/master-registration',
        component:WarehouseRegistration,
        meta: {
            auth: true,
            title: "WarehouseRegistration"
        }
    },
 

    {
        name: 'GmMasterRegistration',
        path: '/generated-material-master-registration',
        component: GmMasterRegistration,
        meta: {
            auth: true,
            title: "Registration"
        }
    
    },

    {
        name: 'Error',
        path: '/error',
        component: Error,
        meta: {
            auth: true,
            title: "Error"
        }
    
    },
    {
        name: 'SupplierRegisration',
        path: '/supplier-regisration',
        component:SupplierRegisration,
        meta: {
            auth: true,
            title: "SupplierRegisration"
        }
    
    },
    {
        name: 'SiteRegistration',
        path: '/site-registration',
        component:SiteRegistration,
        meta: {
            auth: true,
            title: "SiteRegistration"
        }
    
    },
    {
        name: 'Home',
        path: '/order/:id?/:type?',
        component: Home,
        meta: {
            auth: true,
            title: "Home"
        }
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: PageNotFound
    },
];


const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.matched.some((record) => record.meta.auth)) {
        if ($("meta[name='role']").attr("content") == "manager" || $("meta[name='role']").attr("content") == "normal") {
            // console.log(to.matched.some((record) => record.meta.accessBy));
            // if (to.matched.some((record) => record.meta.accessBy)) {
            //     next()
            // } else {
            //     next()
            // }
            next()
        } else {
            next("/")
        }
    } else {
        next()
    }
})

export default router;