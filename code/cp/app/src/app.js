import Vue from 'vue'
import App from './App.vue'

Vue.config.productionTip = false

window.App = new Vue({
    el: '#app',
    extends: App // or `render: r => r(App)`
})
