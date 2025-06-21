import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import MaterialList from '../views/Materials.vue';
import MaterialInfoPage from '../views/MaterialDetail.vue';
import NotFound from '../views/404.vue';
import Login from '../components/Auth/Login.vue';
import Register from '../components/Auth/Register.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
        meta: { layout: 'AppLayout' }
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound,
        meta: { layout: 'none' }
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
        meta: { layout: 'AuthLayout' }
    },
    {
        path: '/register',
        name: 'Register',
        component: Register,
        meta: { layout: 'AuthLayout' }
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    // Check if the route requires authentication
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // Here you would typically check if the user is authenticated
        const isAuthenticated = false; // Replace with actual authentication check

        if (!isAuthenticated) {
            // Redirect to login page or show an error
            next({ name: 'Login' }); // Assuming you have a Login route defined
        } else {
            next(); // Proceed to the route
        }
    } else {
        next(); // Proceed to the route
    }
});

export default router;

