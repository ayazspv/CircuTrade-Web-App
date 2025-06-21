import { createRouter, createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue';
import MaterialList from '../pages/MaterialList.vue';
import MaterialInfoPage from '../pages/MaterialInfoPage.vue';
import NotFound from '../pages/404.vue';

const routes = [
    {
        path: '/', 
        name: "Home", 
        component: Home
    },
    {
        path: '/materials',
        name: "MaterialList",
        component: MaterialList
    },
    {
        path: '/materials/:id',
        name: "MaterialInfoPage",
        component: MaterialInfoPage
    },
    {
        path: "/:pathMatch(.*)*",
        name: "PageNotFound",
        component: NotFound
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

