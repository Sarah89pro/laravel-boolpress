//Dependencies
import Vue from 'vue';
import VueRouter from 'vue-router';


//Components for Pages
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import PostDetail from './pages/PostDetail.vue';
import Contact from './pages/Contact.vue';
import NotFound from './pages/NotFound.vue';

//Activation Route with Vue
Vue.use(VueRouter); //prepares the use of the router as a Vue Js plug-in

//Declaration Routes
const router=new VueRouter({
    mode:'history',
    linkExactActiveClass:'active',
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
    {
        path: '/blog/:slug',
        name: 'post-detail',
        component: PostDetail
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
    {
        path: '*',
        component: NotFound
    },
    
],
});

//make the router exportable
export default router; 