<template>
    <textarea class="uk-textarea" :class=" [levelClass, widthClass] "></textarea>
</template>

<script>
export default {

    props: [
        'level',
        'width'
    ],

    computed: {

        // 可空
        levelClass() {
            let level = (this.level || '').toLowerCase()
            let levels = {
                danger: 1,
                success: 1,
                blank: 1
            }
            return levels[level] ? 'uk-form-' + level : ''
        },

        // 可空
        widthClass() {
            let width = (this.width || '').toLowerCase()
            let widths = {
                xsmall: 1,
                small: 1,
                medium: 1,
                large: 1
            }
            return  widths[width] ? 'uk-form-width-' + width : ''
        }

    }

}
</script>
