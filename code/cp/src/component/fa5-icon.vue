<template>
    <svg class="fa5icon" :viewBox="meta.view"><path :d="meta.path" /></svg>
</template>

<script>
window.uiIcons = window.uiIcons || {}

const fa5 = require('../data/fa5-free.json')

export default {
    props: ['icon'],
    computed: {
        meta() {
            let vm = this
            let icon = { view: '0 0 512 512', path: 'M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z' }
            for (var i in fa5) {
                if (vm.icon == fa5[i].name) {
                    icon = fa5[i]
                    break
                }
            }

            return icon
        }
    },
    mounted() {
        window.uiIcons[this.icon] = 1
    }
}
</script>

<style>
.fa5icon {
    display: inline-block;
    width: 16px;
    height: 16px;
    fill: #000;
}
</style>
