<template>
    <li class="ui-sidebar-item">
        <a class="ui-sidebar-item-label" :href=" typeof href !== 'undefined' ? $root.link(href) : 'javascript:;' " v-if="label" exact>
            <icon :icon="icon" class="ui-sidebar-item-icon" v-if="icon"></icon>
            <span>{{ label }}</span>
        </a>
        <slot></slot>
    </li>
</template>

<script>

export default {
    props: ['label', 'icon', 'href']
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

    border-right: 4px solid transparent;
    line-height: @itemHeight;
    font-size: 14px;
    padding: 0 16px;
    cursor: pointer;
    color: @defaultColor;
}

.ui-sidebar-item-label:hover {
    opacity: 1;
    font-weight: 900;
    color: @defaultColor;
    text-decoration: none;
}

.ui-sidebar-item-label svg {
    opacity: .9;
    fill: @defaultColor;
}

.ui-sidebar-item-label {
    opacity: .8;
}

.ui-toggle .ui-sidebar-item-label {
    font-weight: 900;
    opacity: 1;
}

.ui-sidebar-item-label:hover svg,
.ui-toggle .ui-sidebar-item-label svg {
    opacity: 1;
}

/*
.ui-sidebar-item-label .ui-svg-icon {
    width: 24px;
    height: @itemHeight;
    float: left;
    padding: 8px 0;
    fill: @defaultColor;
    margin-right: 8px;
}*/
/*
.ui-toggle .ui-sidebar-item-label {
    border-right-color: @activeBorderColor;
    background-color: @activeBackgroundColor;
}

.ui-toggle .ui-sidebar-item-label,
.ui-sidebar-item-label:hover {
    color: @activeColor;
    font-weight: bold;
}*/


/*
.ui-toggle .ui-svg-icon,
.ui-sidebar-item-label:hover .ui-svg-icon {
    fill: @activeColor;
}*/

.ui-sidebar-item-icon {
    float: left;
    margin: 2px 6px 0 0;
}

.ui-sidebar-item-label {
    line-height: 20px;
    padding-top: 6px;
    padding-bottom: 6px;
}
</style>
