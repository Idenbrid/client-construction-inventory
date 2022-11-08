import {
    createWebHistory,
    createRouter
} from "vue-router";

/*
WEBSITE 
Routes
*/
const Home = () => import('../Pages/Home.vue');

const Login = () => import('../Components/Login.vue');


const PageNotFound = () => import('../Pages/PageNotFound.vue');


export const routes = [
    // Website Routes
    {
        name: 'Home',
        path: '/',
        component: Home,
        meta: {
            title: "Home"
        }
    },
   
    {
        name: 'Login',
        path: '/login',
        component: Login,
        meta: {
            title: "Login"
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

// router.beforeEach((to, from, next) => {
//     document.title = to.meta.title
//     if (to.matched.some((record) => record.meta.auth)) {
//         if (isAuthenticated()) {
//             next()
//         } else {
//             next("/login")
//         }
//     } else {
//         next()
//     }
// })

export default router;