<template>

    <div class="ui-sidebar">

        <sidebar-menu
            v-for="(child, i) in menu"
            :key="i"
            :label="child.label"
            :class="['menu-' + child.name]">

            <sidebar-menu-item
                v-for="(item, j) in child.children"
                :key="j"
                :label="item.label"
                :icon="item.icon"
                :class=" ['menu-' + child.name + '-' + item.name, (current === item.name) ? 'ui-toggle' : null] "
                :href="item.link"
                @click.native=" current = item.name;">
            </sidebar-menu-item>

        </sidebar-menu>

    </div>

</template>

<script>

import SidebarMenu from './sidebar__menu.vue'
import SidebarMenuItem from './sidebar__menu-item.vue'

export default {
    components: { SidebarMenu, SidebarMenuItem },
    data() {
        return {
            current: 'dashboard',
            menu: [
                {
                    //label: '控制台',
                    name: 'control',
                    class: 'be-dashboard',
                    children: [
                        { label: '状态', name: 'dashboard', icon: 'dashboard', link: 'dashboard' },
                        { label: '统计', name: 'logger', icon: 'chart-bar' },
                        { label: 'WP图标', name: 'wpicons', icon: 'wordpress', link: 'wpicons' }
                    ]
                },
                {
                    label: '内容',
                    name: 'content',
                    class: 'be-content',
                    children: [
                        { label: '博文', name: 'post', icon: 'admin-post', link: 'post' },
                        { label: '分类', name: 'taxonomy', icon: 'portfolio', link: 'taxonomy' },
                        { label: '菜单', name: 'menu', icon: 'admin-links', link: 'menu' },
                        { label: '媒体', name: 'media', icon: 'admin-media' },
                        { label: '用户', name: 'user', icon: 'admin-users' }
                    ]
                },
                {
                    label: '工具',
                    name: 'utility',
                    class: 'be-utility',
                    children: [
                        { label: '主题', name: 'theme', icon: 'admin-appearance' },
                        { label: '插件', name: 'plugin', icon: 'admin-plugins' },
                        { label: '数据', name: 'database', icon: 'admin-network' },
                        { label: '备份', name: 'tool', icon: 'screenoptions' }
                    ]
                },
                {
                    label: '设置',
                    name: 'option',
                    class: 'be-option',
                    children: [
                        { label: '全局', name: 'general', icon: 'translation' },
                        { label: '系统', name: 'system', icon: 'admin-settings' }
                    ]
                }
            ]
        }
    }
}

</script>

<style lang="less">
    .ui-sidebar {
        padding-top: 24px;
    }
</style>
