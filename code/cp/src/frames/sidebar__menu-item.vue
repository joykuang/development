<template>
    <router-link class="ui-sidebar-item" tag="li" :to=" { path: typeof href != undefined ? href : null } " exact>
        <a class="ui-sidebar-item-label" v-if="label">
            <icon :icon="icon" v-if="icon"></icon>
            <span>{{ label }}</span>
        </a>
        <slot></slot>
    </router-link>
</template>

<script>

import Icon from '../component/icon.vue'

export default {
    props: ['label', 'icon', 'href'],
    components: { Icon },
}
</script>

<style lang="less">

@defaultColor: #666;

@activeColor: #333; // #999;
@activeBorderColor: #ff9800;
@activeBackgroundColor: darken(#f1f5f9, 3%); // #3f3f3f

@itemHeight: 32px;

.ui-sidebar-menu-label {
    color: #aaa;
    font-size: 12px;
    line-height: 20px;
    padding: 8px 8px 4px;
}

.ui-sidebar-item-label {
    display: block;

    -webkit-transition: .15s color ease-in-out, .15s background-color ease-in-out, .15s border-color ease-in-out;
    transition: .15s color ease-in-out, .15s background-color ease-in-out, .15s border-color ease-in-out;
}

.ui-sidebar-item-label:hover { text-decoration: none; }

//.ui-sidebar-item { }

.ui-sidebar-item-label {
    border-right: 4px solid transparent;
    line-height: @itemHeight;
    font-size: 14px;
    padding: 0 16px;
    cursor: pointer;
    color: @defaultColor;
}

.ui-sidebar-item-label .ui-svg-icon {
    width: 24px;
    height: @itemHeight;
    float: left;
    padding: 8px 0;
    fill: @defaultColor;
    margin-right: 8px;
}

.ui-toggle .ui-sidebar-item-label {
    border-right-color: @activeBorderColor;
    background-color: @activeBackgroundColor;
}

.ui-toggle .ui-sidebar-item-label,
.ui-sidebar-item-label:hover {
    color: @activeColor;
    font-weight: bold;
}

.ui-toggle .ui-svg-icon,
.ui-sidebar-item-label:hover .ui-svg-icon {
    fill: @activeColor;
}
</style>
