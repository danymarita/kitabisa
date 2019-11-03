require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue)
import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import FibonacciComponent from './components/FibonacciComponent.vue';
import MultiplyComponent from './components/MultiplyComponent.vue';
import PrimeNumberComponent from './components/PrimeNumberComponent.vue';
import SumComponent from './components/SumComponent.vue';

const routes = [
    { 
        path: '/', 
        redirect: '/home' 
    },
    {
        name: 'home',
        path: '/home',
        component: HomeComponent,
        meta: {
            title: 'Home'
        }
    },
    {
        name: 'fibonacci',
        path: '/fibonacci',
        component: FibonacciComponent,
        meta: {
            title: 'Fibonacci Sequence'
        }
    },
    {
        name: 'multiply',
        path: '/multiply',
        component: MultiplyComponent,
        meta: {
            title: 'Multiply X & Y'
        }
    },
    {
        name: 'prime-number',
        path: '/prime-number',
        component: PrimeNumberComponent,
        meta: {
            title: 'First N prime number'
        }
    },
    {
        name: 'sum',
        path: '/sum',
        component: SumComponent,
        meta: {
            title: 'Sum X & Y'
        }
    }
];

const router = new VueRouter(
    { 
        mode: 'history', 
        routes: routes,
        scrollBehavior (to, from, savedPosition) {
            // return desired position
            return { x: 0, y: 0 }
        }
    });
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');