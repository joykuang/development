<template>
<div class="ui-backend">
    <backend-topbar></backend-topbar>
    <backend-caption :caption="caption"></backend-caption>
    <div class="ui-widgets">
        <div class="uk-grid-medium" uk-grid>
            <div class="ui-widget uk-width-1-1@s">


                <div class="page-tree tree-sortable">
                    <ul class="tree-home list-unstyled">
                        <li class="branch">
                            <div class="branch-row">
                                <div class="page-indent">
                                    <span class="page-toggle"><icon class="ui-icon" icon="admin-home"></icon></span>
                                    <span class="page-unmovable"></span>
                                </div>
                                <div class="page-text">
                                    <a class="page-url" href="#" v-if="mode === 'url' ">/</a>
                                    <a class="page-title" href="#" v-else>Home</a>
                                </div>
                                <div class="page-extras"></div>
                                <div class="branch-meta">
                                    <div class="page-actions">
                                        <a class="page-action" target="_blank" href="/">
                                            <icon class="ui-icon" icon="admin-links"></icon>
                                        </a>
                                        <div class="btn-group page-action action-more">
                                            <icon class="ui-icon" icon="ellipsis"></icon>
                                            <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <ul class="branches depth-1 branches-open" uk-sortable000="handle: .drag-handle">
                        <li class="branch">
                            <div class="branch-row">
                                <div class="page-indent">
                                    <span class="page-toggle"><icon class="ui-icon" icon="arrow-down-alt2"></icon></span>
                                    <span class="page-move drag-handle"></span>
                                    <span class="indent-arrow"></span>
                                </div>
                                <div class="page-text">
                                    <a class="page-url" href="#" v-if="mode === 'url' ">/about</a>
                                    <a class="page-title" href="#" v-else>About Me</a>
                                </div>
                                <div class="page-extras"></div>
                                <div class="branch-meta">
                                    <div class="page-actions">
                                        <a class="page-action" target="_blank" href="/about">
                                            <icon class="ui-icon" icon="admin-links"></icon>
                                        </a>
                                        <div class="btn-group page-action action-more">
                                            <icon class="ui-icon" icon="ellipsis"></icon>
                                            <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="branches depth-2 empty0 branches-open">

                                <li class="branch">
                                    <div class="branch-row">
                                    	<div class="page-indent">
                                    		<span class="page-toggle"></span>
                                    		<span class="page-move drag-handle"></span>
                                    		<span class="indent-arrow"></span>
                                    	</div>
                                    	<div class="page-text">
                                            <a class="page-url" href="#" v-if="mode === 'url' ">/contact/my-collection</a>
                                            <a class="page-title" href="#" v-else>My Collection</a>
                                    	</div>
                                    	<div class="page-extras">
                                    	</div>
                                    	<div class="branch-meta">
                                    		<div class="page-actions">
                                    			<a class="page-action" target="_blank" href="#"><icon class="ui-icon" icon="admin-links"></icon></a>
                                    			<div class="btn-group page-action action-more">
                                                    <icon class="ui-icon" icon="ellipsis"></icon>
                                                    <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                    			</div>
                                    		</div>
                                    	</div>
                                    </div>
                                    <ul class="branches depth-3 empty branches-open"></ul>
                                </li>

                            </ul>
                        </li>
                        <li class="branch">
                            <div class="branch-row">
                                <div class="page-indent">
                                    <span class="page-toggle"></span>
                                    <span class="page-move drag-handle"></span>
                                    <span class="indent-arrow"></span>
                                </div>
                                <div class="page-text">
                                    <a class="page-url" href="#" v-if="mode === 'url' ">/blog</a>
                                    <a class="page-title" href="#" v-else>My Magical Blogventure</a>
                                </div>
                                <div class="page-extras">
                                    <div class="page-entries">
                                        <icon class="ui-icon" icon="admin-page"></icon>
                                        <a href="http://dev.io/cp/collections/entries/blog/create">Add</a> or
                                        <a href="http://dev.io/cp/collections/entries/blog">Edit</a>
                                    </div>
                                </div>
                                <div class="branch-meta">
                                    <div class="page-actions">
                                        <a class="page-action" target="_blank" href="/blog">
                                            <icon class="ui-icon" icon="admin-links"></icon>
                                        </a>
                                        <div class="btn-group page-action action-more">
                                            <icon class="ui-icon" icon="ellipsis"></icon>
                                            <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="branches depth-2 empty branches-open"></ul>
                        </li>
                        <li class="branch">
                            <div class="branch-row">
                                <div class="page-indent">
                                    <span class="page-toggle"></span>
                                    <span class="page-move drag-handle"></span>
                                    <span class="indent-arrow"></span>
                                </div>
                                <div class="page-text">
                                    <a class="page-url" href="#" v-if="mode === 'url' ">/gallery</a>
                                    <a class="page-title" href="#" v-else>Gallery</a>
                                </div>
                                <div class="page-extras"></div>
                                <div class="branch-meta">
                                    <div class="page-actions">
                                        <a class="page-action" target="_blank" href="/gallery">
                                            <icon class="ui-icon" icon="admin-links"></icon>
                                        </a>
                                        <div class="btn-group page-action action-more">
                                            <icon class="ui-icon" icon="ellipsis"></icon>
                                            <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="branches depth-2 empty branches-open"></ul>
                        </li>
                        <li class="branch">
                            <div class="branch-row">
                                <div class="page-indent">
                                    <span class="page-toggle"></span>
                                    <span class="page-move drag-handle"></span>
                                    <span class="indent-arrow"></span>
                                </div>
                                <div class="page-text">
                                    <a class="page-url" href="#" v-if="mode === 'url' ">/things</a>
                                    <a class="page-title" href="#" v-else>Favorite Things</a>
                                </div>
                                <div class="page-extras">
                                    <div class="page-entries">
                                        <icon class="ui-icon" icon="admin-page"></icon>
                                        <a href="http://dev.io/cp/collections/entries/things/create">Add</a> or
                                        <a href="http://dev.io/cp/collections/entries/things">Edit</a>
                                    </div>
                                </div>
                                <div class="branch-meta">
                                    <div class="page-actions">
                                        <a class="page-action" target="_blank" href="/things">
                                            <icon class="ui-icon" icon="admin-links"></icon>
                                        </a>
                                        <div class="btn-group page-action action-more">
                                            <icon class="ui-icon" icon="ellipsis"></icon>
                                            <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="branches depth-2 empty branches-open"></ul>
                        </li>
                        <li class="branch">
                            <div class="branch-row">
                                <div class="page-indent">
                                    <span class="page-toggle"></span>
                                    <span class="page-move drag-handle"></span>
                                    <span class="indent-arrow"></span>
                                </div>

                                <div class="page-text">
                                    <a class="page-url" href="#" v-if="mode === 'url' ">/contact</a>
                                    <a class="page-title" href="#" v-else>Contact</a>
                                </div>
                                <div class="page-extras"></div>
                                <div class="branch-meta">
                                    <div class="page-actions">
                                        <a class="page-action" target="_blank" href="#/contact">
                                            <icon class="ui-icon" icon="admin-links"></icon>
                                        </a>
                                        <div class="btn-group page-action action-more">
                                            <icon class="ui-icon" icon="ellipsis"></icon>
                                            <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="branches depth-2 empty branches-open"></ul>
                        </li>
                    </ul>
                </div>



            </div>
        </div>
    </div>
    <slot></slot>
</div>
</template>

<script>

import Icon from '../component/icon.vue'
import Dropdown from '../component/dropdown.vue'

import BackendTopbar from '../frames/backend__topbar.vue'
import BackendCaption from '../frames/backend__caption.vue'

export default {
    components: {
        Icon,
        Dropdown,
        BackendTopbar,
        BackendCaption
    },
    data() {
        return {
            mode: 'text', // text, url
            caption: {
                label: '页面',
                control: [
                    { label: '文章回收', className: 'btn-white', link: '#' },
                    { label: '筛选文章', className: 'btn-white', link: '#' },
                    { label: '显示 URL', className: 'btn-white', link: '#', click: function(vm, e) {
                        let el = e.target
                        let _vm = vm.$parent
                        let mode = _vm.mode === 'url' ? 'text' : 'url'
                        let text = _vm.mode === 'url' ? '显示 URL' : '显示标题'

                        el.textContent = text
                        _vm.mode = mode
                        //_vm.$set('mode', mode)

                    } },
                    { label: '新建页面', className: 'btn-primary', link: '#' }
                ]
            },
            dropdown: [
                { label: '创建页面', type: 'item', link: '#', className: '' },
                { label: '添加分类', type: 'item', link: '#', className: '' },
                { label: '禁用条目', type: 'item', link: '#', className: '' },
                { type: 'divider' },
                { label: '删除条目', type: 'item', link: '#', className: 'uk-text-danger' }
            ]
        }
    }
}
</script>

<style lang="less">

@import "../less/variables.less";
@import "../less/pagetree.less";

.page-tree {

    box-shadow: 0 0 0 0.5px rgba(49,49,93,.03), 0 2px 5px 0 rgba(49,49,93,.1), 0 1px 2px 0 rgba(0,0,0,.08);

    .tree-home {
        padding: 0;
    }

    .page-indent .page-move,
    .page-indent .page-unmovable,
    .page-indent .page-toggle,
    .page-indent {
        height: 40px;
    }

    .page-text {
        line-height: 20px;
    }

    .page-extras,
    .page-text {
        a,
        a:hover {
            color: @globalColor;
        }

        a:hover { text-decoration: none; }
    }

    .ui-icon {
        width: 18px;
        height: 18px;
        fill: @globalColor;
    }
}

.page-toggle .ui-icon {
    margin-top: (38px - 18px) / 2;
}

.page-action .ui-icon {
    fill: fade(black, 16%);
}

.page-action:hover .ui-icon {
    fill: @globalColor;
}

.page-extras .ui-icon {
    fill: #ccc;
}

.page-tree .page-title,
.page-tree .page-url {
    display: inherit;
}

.page-tree .page-action {
    margin-right: 0;
}

.page-tree .page-action + .page-action {
    margin-left: 12px;
}

.page-tree .page-action .ui-icon {
    -webkit-transition: transform .2s ease;
    transition: transform .2s ease;
}

[aria-expanded="true"] {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}

</style>
