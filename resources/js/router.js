import  { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue';
import ListProjects from './pages/listProjects.vue';

import ProjectDetails from './pages/ProjectsDetails.vue';
import About from './pages/About.vue';
import Error404 from './pages/Error404.vue';


const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: 'active',
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/Progetti',
            name: 'listProjects',
            component: ListProjects
        },
        {
            path: '/About',
            name: 'about',
            component: About
        },
        {
            path: '/dettaglio-progetto/:slug',
            name: 'detail',
            component: ProjectDetails
        },
        {
            // questo va in fondo
            path: '/:pathMatch(.*)*',
            component: Error404
        }
    ]
});

export {router};

