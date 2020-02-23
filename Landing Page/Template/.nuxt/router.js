import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _0c43b88d = () => interopDefault(import('../pages/landing-page-1/index.vue' /* webpackChunkName: "pages/landing-page-1/index" */))
const _bdaf2964 = () => interopDefault(import('../pages/landing-page-2/index.vue' /* webpackChunkName: "pages/landing-page-2/index" */))
const _360d1e0f = () => interopDefault(import('../pages/landing-page-3/index.vue' /* webpackChunkName: "pages/landing-page-3/index" */))
const _6a1c5e60 = () => interopDefault(import('../pages/landing-page-4/index.vue' /* webpackChunkName: "pages/landing-page-4/index" */))
const _5fd68391 = () => interopDefault(import('../pages/landing-page-5/index.vue' /* webpackChunkName: "pages/landing-page-5/index" */))
const _1689935c = () => interopDefault(import('../pages/landing-page-6/index.vue' /* webpackChunkName: "pages/landing-page-6/index" */))
const _ecc02dda = () => interopDefault(import('../pages/landing-page-7/index.vue' /* webpackChunkName: "pages/landing-page-7/index" */))
const _1e849bd4 = () => interopDefault(import('../pages/landing-page-8/index.vue' /* webpackChunkName: "pages/landing-page-8/index" */))
const _992d62d6 = () => interopDefault(import('../pages/landing-page-9/index.vue' /* webpackChunkName: "pages/landing-page-9/index" */))
const _8aa8fc7e = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))

// TODO: remove in Nuxt 3
const emptyFn = () => {}
const originalPush = Router.prototype.push
Router.prototype.push = function push (location, onComplete = emptyFn, onAbort) {
  return originalPush.call(this, location, onComplete, onAbort)
}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/sofbox-vue/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/landing-page-1",
    component: _0c43b88d,
    name: "landing-page-1"
  }, {
    path: "/landing-page-2",
    component: _bdaf2964,
    name: "landing-page-2"
  }, {
    path: "/landing-page-3",
    component: _360d1e0f,
    name: "landing-page-3"
  }, {
    path: "/landing-page-4",
    component: _6a1c5e60,
    name: "landing-page-4"
  }, {
    path: "/landing-page-5",
    component: _5fd68391,
    name: "landing-page-5"
  }, {
    path: "/landing-page-6",
    component: _1689935c,
    name: "landing-page-6"
  }, {
    path: "/landing-page-7",
    component: _ecc02dda,
    name: "landing-page-7"
  }, {
    path: "/landing-page-8",
    component: _1e849bd4,
    name: "landing-page-8"
  }, {
    path: "/landing-page-9",
    component: _992d62d6,
    name: "landing-page-9"
  }, {
    path: "/",
    component: _8aa8fc7e,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
