<template>
    <ul class="ui-sidebar-menu">
        <div class="ui-sidebar-menu-label" v-if="label">{{ label }}</div>
        <slot></slot>
    </ul>
</template>

<script>
export default {
    props: ['label']
}
</script>

<style>
.ui-sidebar-menu {
    margin: 0;
    padding: 0;
    list-style: none;
}

.ui-sidebar-menu + .ui-sidebar-menu {
    margin-top: 16px;
}
</style>
