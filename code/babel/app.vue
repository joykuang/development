<template>
    <div>
        <div class="ui-icon">{{ icon }}</div>
    </div>
</template>

<script>
export default {
    name: 'ui-icon',
    props: ['icon']
}
</script>

<style>
.ui-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
}
</style>
