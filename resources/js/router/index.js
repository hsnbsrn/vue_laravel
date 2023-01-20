import { createRouter, createWebHistory } from "vue-router";
import Home from '../components/Home.vue'
import Companies from '../components/Companies.vue'
import Customers from '../components/Customers.vue'
const routes = [
    {
        path:'/',
        name:'home',
        component:Home
    },
    {
        path:'/companies',
        name:'companies',
        component:Companies
    },
    {
        path:'/companies/:id/customers',
        name:'customers',
        component:Customers
    },

];

const router=createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;