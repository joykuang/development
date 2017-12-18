<template>
    <input type="text" class="uk-input"
        :class=" [levelClass, widthClass, sizeClass] ">
</template>

<script>
export default {

    props: [
        'size',
        'level',
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

<style lang="less">
.ui-input {
    border: none;
    border-radius: 3px;
    box-shadow: inset 0 1px 1px 0 rgba(0,0,0,.1);

    &, &:focus {
        background-color: #f6f9fc;
    }

    &:focus {
        outline: 0;
        border-color: #66afe9;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
    }
}
</style>
