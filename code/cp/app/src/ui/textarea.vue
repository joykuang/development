<template>
    <uk-textarea class="ui-textarea" :width="width"></uk-textarea>
</template>

<script>
export default {
    props: [ 'width' ]
}
</script>

<style lang="less">
.ui-textarea {
    //height: auto;
    border: 1px solid #e0e0e0;
    border-radius: 3px;
    box-shadow: inset 0 1px 1px 0 rgba(0,0,0,.1);

    &:focus {
        border-color: #e0e0e0;
    }
}
</style>
