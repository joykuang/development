<template>

    <div class="ui-sidebar">

        <sidebar-menu
            v-for="(child, i) in menu"
            :key="i"
            :label="child.label">

            <sidebar-menu-item
                v-for="(item, j) in child.children"
                :key="j"
                :label="item.label"
                :icon="item.icon"
                :class=" [(current === item.name) ? 'ui-toggle' : null] "
                :href="item.link"
                @click.native=" current = item.name;">
            </sidebar-menu-item>

        </sidebar-menu>

    </div>

</template>

<script>

const menu = require('../data/sidebar-menu.json')

import SidebarMenu from './sidebar__menu.vue'
import SidebarMenuItem from './sidebar__menu-item.vue'

export default {
    components: { SidebarMenu, SidebarMenuItem },
    data() {
        return {
            current: 'dashboard',
            menu
        }
    }
}

</script>

<style lang="less">
    .ui-sidebar {
        padding-top: 24px;
    }
</style>
