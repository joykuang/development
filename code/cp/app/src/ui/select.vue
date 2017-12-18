<template>
    <uk-select class="ui-select" :size="size" :width="width">
        <slot></slot>
    </uk-select>
</template>

<script>
export default {
    props: [ 'size', 'width' ]
}
</script>

<style lang="less">
@import "../less/mixed.less";
.ui-select {
    .shadow-button();
    border: none;
    border-radius: 3px;
}
</style>
