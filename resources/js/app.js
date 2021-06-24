/**
FRONT OFFICE
 */


window.Vue = require('vue');
//window.axios = require('axios');  //good if I want it global




//Init Vue Main Instance
import App from './App.vue';

const root = new Vue( {
    el: '#root',
    render: h => h(App) //this function takes root and inside puts App's markup (hook)
});

