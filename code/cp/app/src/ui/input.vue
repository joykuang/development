<template>
    <uk-input class="ui-input" :size="size" :width="width" />
</template>

<script>
export default {
    props: [ 'size', 'width' ]
}
</script>

<style lang="less">
.ui-input {
    border: none;
    border-radius: 3px;
    background-color: #f6f9fc;
    box-shadow: inset 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
