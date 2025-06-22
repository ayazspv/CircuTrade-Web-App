import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import NotFound from '../views/404.vue';
import Materials from '../views/Materials.vue'
import MaterialDetail from '../views/MaterialDetail.vue'
import Login from '../components/Auth/Login.vue';
import Register from '../components/Auth/Register.vue';
import ManagerOrders from '../components/Admin/ManagerOrders.vue';
import ManagerUsers from '../components/Admin/ManagerUsers.vue';
import ManagerMaterials from '../components/Admin/ManagerMaterials.vue';
import ManagerDashboard from '@/components/Admin/ManagerDashboard.vue';
import UserDashboard from '@/components/User/UserDashboard.vue';

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
    {
        path: '/dashboard',
        meta: { layout: 'DashboardLayout' },
        children: [
            {
                path: '',
                name: 'Dashboard',
                component: ManagerDashboard,
                meta: { layout: 'DashboardLayout', isManager: true },
            },
            {
                path: 'materials',
                name: 'DashboardMaterials',
                component: ManagerMaterials,
                meta: { layout: 'DashboardLayout', isManager: true },
            },
            {
                path: 'orders',
                name: 'DashboardOrders',
                component: ManagerOrders,
                meta: { layout: 'DashboardLayout', isManager: true },
            },
            {
                path: 'users',
                name: 'DashboardUsers',
                component: ManagerUsers,
                meta: { layout: 'DashboardLayout', isManager: true },
            },
            {
                path: 'userId',
                name: 'UserDashboard',
                component: UserDashboard,
                meta: { layout: 'DashboardLayout', isManager: false },
            },
        ]
    },
    {
        path: '/materials',
        meta: { layout: 'AppLayout' },
        children: [
            {
                path: '',
                name: 'Materials',
                component: Materials,
                meta: { layout: 'AppLayout'}
            },
            {
                path: 'item',
                name: 'MaterialDetail',
                component: MaterialDetail,
                meta: { layout: 'AppLayout' }
            }
        ]
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

