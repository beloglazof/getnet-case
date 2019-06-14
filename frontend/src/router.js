import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

function requireAuth(to, from, next) {
  if (true) {
    next({
      path: '/login',
      query: { redirect: to.fullPath },
    });
  } else {
    next();
  }
}

export default new Router({
  routes: [
    {
      path: '/login',
      name: 'login',
      component: () => import('./views/Login.vue'),
    },
    {
      path: '/registration',
      name: 'registration',
      component: () => import('./views/Registration.vue'),
    },
    {
      path: '/',
      name: 'home',
      component: () => import('./views/Login.vue'),
      beforeEnter: requireAuth,
    },
  ],
});
