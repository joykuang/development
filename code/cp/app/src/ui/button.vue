<template>
    <uk-button class="ui-button" :level="level" :size="size"><slot></slot></uk-button>
</template>

<script>
export default {
    props: [ 'level', 'size' ]
}
</script>

<style lang="less">
@import "../less/mixed.less";
.ui-button {
    .shadow-button();
    border: none;
    border-radius: 3px;
}
</style>
