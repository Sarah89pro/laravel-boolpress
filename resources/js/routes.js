//Dependencies
import Vue from 'vue';
import VueRouter from 'vue-router';


//Components for Pages
import Home from './pages/Home.vue';

//Activation Route with Vue
Vue.use(VueRouter); //prepares the use of the router as a Vue Js plug-in

//Declaration Routes
const router=new VueRouter({
    mode:'history',
    routes: [{
        path: '/',
        name: 'home',
        component: Home
    }]
});

//make the router exportable
export default router; 