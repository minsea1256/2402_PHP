import { createWebHistory, createRouter } from 'vue-router';
import BoardComponents from './components/BoardComponents.vue';
import LoginComponents from './components/LoginComponents.vue';

const routes = [
    {
        path: '/',
        redirect: '/login',
    },
    {   
        path: '/login',
        component: LoginComponents,
    },
    {
        path: '/board',
        component: BoardComponents,
    }
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router; 