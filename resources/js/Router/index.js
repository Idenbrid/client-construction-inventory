import {
    createWebHistory,
    createRouter
} from "vue-router";

/*
WEBSITE 
Routes
*/
const Home = () => import('../Pages/Home.vue');
const WaitingList = () => import('../Pages/WaitingList.vue');
const Registration = () => import('../Pages/Registration.vue');
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
        }
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
        name: 'Registration',
        path: '/account-registration',
        component: Registration,
        meta: {
            auth: true,
            title: "Registration"
        }
    },
    {
        name: 'Home',
        path: '/order',
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