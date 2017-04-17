import Vue from 'vue/dist/vue.js';
import store from './vuex/store';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import App from './components/App.vue';
import {masterRoutes} from './components/master/routes.js';
Vue.use(VueResource);
Vue.use(VueRouter);
window.axios = require('axios');
window.urlParent = window.location.origin;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'Accept' : 'application/json'
};
window._Vue = Vue;

var router = new VueRouter({
  hashbang: false,
  history: true,
  linkActiveClass: 'active-class',
    routes: masterRoutes
});

    /* Bootstrap routes to the main component */
  new Vue({
       el: '#app',
       router: router,
       template: '<App/>',
       components: { App }
  });