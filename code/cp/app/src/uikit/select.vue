<template>
    <select class="uk-select"
        :class=" [widthClass, sizeClass] ">
        <slot></slot>
    </select>
</template>

<script>
export default {
    props: [
        'size',
        'width'
    ],

    computed: {

        // 可空
        sizeClass() {
            let size = (this.size || '').toLowerCase()
            let sizes = {
                small: 1,
                large: 1
            }
            return sizes[size] ? 'uk-form-' + size : ''
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
