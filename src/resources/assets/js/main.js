import Vue from 'vue/dist/vue.js';
import store from './vuex/store';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
window.axios = require('axios');
window.urlParent = window.location.origin;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'Accept' : 'application/json'
};
window._Vue = Vue;
import App from './components/App.vue';
import About from './components/About.vue';
import Home from './components/Home.vue';

import userIndex from './components/master/user/index.vue';

Vue.use(VueResource);
Vue.use(VueRouter);
/**
 * Cutom Directive Modal
 * -untuk Global remote modal
 */
Vue.directive('modal-show',{
  twoWay: true,
  bind: function ($el, binding, vnode) {
      $el.addEventListener('click', function () {
          $el.dataset.apalah = '{{ message }}';
          var _this = $($el);
          var templete = _this.data('target');
          var url = _this.data('url');
          $('body').modalmanager('loading');
          console.log(this.response);
          Vue.set(binding,'response',{
            name : 'Setyabudi',
            kelas : 'MI-14'
          });
          axios.get(url)
           .then((response) => {
            $(templete).modal('show');
           })
           .catch((response) => {

           });
      });
  }
});
var router = new VueRouter({
  hashbang: false,
  history: true,
  linkActiveClass: 'active-class',
    routes: [
      { path: '/about', component: userIndex },
      { path: '/home', component: Home }
    ]
});

    /* Bootstrap routes to the main component */
  new Vue({
       el: '#app',
       router: router,
       template: '<App/>',
       components: { App }
  });