<template>
    <button class="uk-button"
        :class=" [levelClass, sizeClass] ">
        <slot></slot>
    </button>
</template>

<script>

export default {

    props: [
        'level',
        'size'
    ],

    computed: {

        // 不可空，默认
        levelClass() {
            let level = (this.level || 'default').toLowerCase()
            let levels = {
                default: 1,
                primary: 1,
                secondary: 1,
                danger: 1
            }
            return 'uk-button-' + (levels[level] ? level : 'default')
        },

        // 可空
        sizeClass() {
            let size = (this.size || '').toLowerCase()
            let sizes = {
                small: 1,
                large: 1
            }
            return sizes[size] ? 'uk-button-' + size : ''
        }
    }

}

</script>
