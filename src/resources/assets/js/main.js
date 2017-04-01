import Vue from 'vue/dist/vue.js';
import store from './vuex/store';
import App from './components/App.vue';
import About from './components/About.vue';
import Home from './components/Home.vue';
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'

Vue.use(VueResource)
Vue.use(VueRouter)

window.HostParent = window.location.origin;

    /* eslint-disable no-new */
    // Define some components
    var Foo = Vue.extend({
      template: '<p>This is foo!</p>'
    })

    var Bar = Vue.extend({
      template: '<p>This is bar!</p>'
    })    

    var Test = Vue.extend({
      template: '<p>This is bar!</p>'
    })
    var router = new VueRouter({
      hashbang: false,
      history: true,
      linkActiveClass: 'active-class',
        routes: [
	    { path: '/about', component: About },
	    { path: '/home', component: Home }
	  ]
    })

    /* Bootstrap routes to the main component */
	new Vue({
	      el: '#app',
		  router: router,
		  template: '<App/>',
		  components: { App },
	});