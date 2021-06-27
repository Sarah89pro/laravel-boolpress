//Dependencies
import Vue from 'vue';
import VueRouter from 'vue-router';


//Components for Pages
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';

//Activation Route with Vue
Vue.use(VueRouter); //prepares the use of the router as a Vue Js plug-in

//Declaration Routes
const router=new VueRouter({
    mode:'history',
    linkActiveClass:'active',
    routes: [{
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/blog',
        name: 'blog',
        component: Blog
    },
    
],
});

//make the router exportable
export default router; 