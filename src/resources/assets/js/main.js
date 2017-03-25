// import io from 'socket.io-client';
// const socket = io('http://192.168.10.10:8080');

import Vue from 'vue/dist/vue.js';
import store from './vuex/store';
import App from './components/App.vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter)
const routes = []

const router = new VueRouter({
  routes, // short for routes: routes
  mode: 'history'
})
new Vue({
      el: '#app',
      template: '<App/>',
      components: { App }
});