import Vue from 'vue/dist/vue.js';
import store from './vuex/store';
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'

import App from './components/App.vue';
import About from './components/About.vue';
import Home from './components/Home.vue';

import userIndex from './components/master/user/index.vue';
    Vue.use(VueResource);
    Vue.use(VueRouter);
    window.urlParent = window.location.origin;

    Vue.directive('modal-show', {
        twoWay: true,
        bind: function($el, binding, vnode) {
            $el.addEventListener('click', function(event) {
              Vue.$set('data','test');
              var templete = $($el).data('target');
              var url = $($el).data('url');
              $(templete).modal('show');
            })
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
       components: { App },
       data : {
          url : urlParent
       }
  });