<template>
    <div id="app" class="app" v-cloak>
        <sidebar class="nav"></sidebar>
        <transition name="fade">
            <keep-alive>
                <router-view class="backend"></router-view>
            </keep-alive>
        </transition>

    </div>
</template>

<script>

import VueRouter from 'vue-router'
Vue.use(VueRouter)

// router pages
import Sidebar from './frames/sidebar.vue'
import Backend from './pages/dashboard.vue'
import Post from './pages/post.vue'
import Taxonomy from './pages/taxonomy.vue'
import Form from './pages/form.vue'

import WPIcons from './wpicons.vue'
import FA5 from './fa5.vue'

// dependences
import Icon from './component/fa5-icon.vue'
import Dropdown from './component/dropdown.vue'
Vue.component('icon', Icon)
Vue.component('dropdown', Dropdown)

const routes = [
    { path: '/', component: Backend },
    { path: '/dashboard', component: Backend },
    { path: '/post', component: Post },
    { path: '/taxonomy', component: Taxonomy },
    { path: '/menu', component: Form },

    { path: '/wpicons', component: WPIcons },
    { path: '/fa5', component: FA5 }
]

const router = new VueRouter({
    routes,
    //mode: 'history',
    linkActiveClass: 'ui-toggle__active'
})

export default {
    router,
    components: { Sidebar, Backend },
    methods: {
        link(url, linkOnly = true) {
            let vm = this
            let r = vm.$router
            return linkOnly ? (r.mode === 'history' ? '' : '#') + '/' + url : r.push({ path: url })
        }
    },
    mounted() {
        document.title = 'Backend Control Panel'
    }
}

</script>

<style lang="less">

@import "./less/variables.less";
@import "./less/normalize.less";
@import "./less/uikit-rewrite.less";
@import "./less/component.less";

@Sidebar-width: 160px;


[v-cloak] { display: none; }

.app {
    display: grid;
    grid-template-columns: @Sidebar-width auto;
}

.backend {
    min-height: 100vh;
}
</style>
