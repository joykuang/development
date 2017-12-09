/**
 * 项目路由声明
 * @import vue-router
 * @export const router
 */

import Home from '../page/home.vue'
import User from '../page/user.vue'
import About from '../page/about.vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        redirect: '/home'
    },
    {
        name: 'home',
        path: '/home',
        component: Home
    },
    {
        name: 'user',
        path: '/user',
        component: User
    },
    {
        name: 'about',
        path: '/about',
        component: About
    }
]

const router = new VueRouter({
    routes,
    //mode: 'history',
    linkActiveClass: 'ui-active'
})

export default router
