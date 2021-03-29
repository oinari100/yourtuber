import Vue from 'vue'
import Vuex from 'vuex';
import router from './router'
import store from './store'
import './bootstrap'
import App from './App.vue'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import VueYoutube from 'vue-youtube'
import VueTinder from 'vue-tinder'

Vue.use(Vuex);
Vue.use(Vuetify);
Vue.use(VueTinder);
Vue.use(VueYoutube);

new Vue({
  el: '#app',
  router: router,
  store: store,
  components: { App }, 
  template: '<App />',
  vuetify: new Vuetify({
    iconfont: 'mdi',
  })
})