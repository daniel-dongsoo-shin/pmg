
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import store from "./store";

import Login from './components/Login'
import Main from './components/Main'
import Register from './components/Register'

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: "/", component: Login },
        { path: "/register", component: Register },
        { path: "/main", component: Main,
            beforeEnter(to, from, next) {
                if(store.state.authenticated || store.state.over18) {
                    next();
                } else {
                    next("/login");
                }
            }
        },
        { path: "*", redirect: "/"}
    ]
})

const app = new Vue({
    el: '#app',
    router,
    store
});