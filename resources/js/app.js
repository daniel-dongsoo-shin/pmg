
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue';

import VueRouter from 'vue-router'
import ExampleComponent from './components/ExampleComponent'
import Home from './components/Home'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: "/", component: Home },
        { path: "/ex", component: ExampleComponent }
    ]
})

const app = new Vue({
    el: '#app',
    router
});