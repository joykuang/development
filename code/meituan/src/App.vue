<template>
<div id="app" v-cloak>
    <transition name="slide-fade">
        <!-- <keep-alive> -->
        <router-view class="page"></router-view>
        <!-- </keep-alive> -->
    </transition>
    <div class="nav">
        <router-link class="nav-item"
            v-for="(n,c) in ['Home', 'User', 'About']"
            :key=" c "
            :to=" n.toLowerCase() ">{{ n }}</router-link>
    </div>
</div>
</template>

<script>
import data from './mixins/data'
import store from './mixins/store'
import router from './mixins/route'
import components from './mixins/component'

export default {
    data,
    store,
    router,
    components,
    mounted() {
        document.title = 'Meituan App'
    }
}
</script>

<style lang="less">
* {
    box-sizing: border-box;
    border: 0;
    margin: 0;
    padding: 0;
}

img {
    max-width: 100%;
    vertical-align: top;
}

body {
    background-color: #f8f8f8;
}

[v-cloak],
[v-hidden] {
    display: none;
}

.page {
    position: absolute;
    min-height: 100vh;
    right: 0;
    left: 0;
    top: 0;
}

.nav {
    background-color: #efefef;
    position: fixed;
    bottom: 0;
    right: 0;
    left: 0;
}

.nav-item {
    display: inline-block;
    text-decoration: none;
    text-align: center;
    line-height: 40px;
    font-size: 12px;
    color: #999;
    width: 5em;
}

.nav-item.ui-active {
    color: #333;
    background-color: #e0e0e0;
}

.slide-fade-enter-active {
    -webkit-transition: all .24s ease-out;
    transition: all .24s ease-out;
    z-index: 1;
}
.slide-fade-leave-active {
    -webkit-transition: all .16s ease-in;
    transition: all .16s ease-in;
    z-index: 2;
}
.slide-fade-enter,
.slide-fade-leave-to {
    -webkit-transform: translateX(100vw);
    transform: translateX(100vw);
    opacity: 0;
}
</style>
