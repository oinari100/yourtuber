import Vue from 'vue'
import VueRouter from 'vue-router'

import TopSelect from './pages/Top.vue'
import Slider from './pages/Slider.vue';
import Registration from './pages/Registration.vue';
import Contact from './pages/Contact.vue';
import Search from './pages/Search.vue';
import Ruselt from './pages/Ruselt.vue';
import Ranking from './pages/Ranking.vue';
import Terms from './pages/Terms.vue';


Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Slider
  },
  {
    path: '/registration',
    component: Registration
  },
  {
    path: '/contact',
    component: Contact
  },
  {
    path: '/search',
    component: Search
  },
  {
    path: '/ruselt',
    component: Ruselt
  },
  {
    path: '/top',
    component: TopSelect
  },
  {
    path: '/ranking',
    component: Ranking
  },
  {
    path: '/terms',
    component: Terms
  },
]

const router = new VueRouter({
    mode: 'history',
    routes,
    scrollBehavior (to, from, savedPosition) {
      if (savedPosition) {
         return savedPosition
      } else {
         return { x: 0, y: 0 }
      }
    }
  })

export default router