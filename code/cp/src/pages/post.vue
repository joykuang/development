<template>
<div class="ui-backend">
    <backend-topbar></backend-topbar>
    <backend-caption :caption="caption"></backend-caption>
    <div class="ui-widgets">
        <div class="uk-grid-medium" uk-grid>
            <div class="ui-widget uk-width-1-1@s">
                <div class="ui-content-list ui-taxonomy-list">
                    <table class="uk-table uk-table-divider uk-table-hover">
                        <thead>
                            <tr>
                                <th class="checkbox">
                                    <input type="checkbox" id="checkbox-all" @click=" selected = getSelectAll() " :checked=" selected.length === items.length ">
                                    <label for="checkbox-all"></label>
                                </th>

                                <template v-for=" (item, key) in columns ">

                                    <th v-if="!item.hidden"
                                        :class=" [ /*'ui-dataset-' + item.field,*/ { 'ui-sortable': item.sortable, 'ui-sortable-current': sort === item.field, 'ui-sortable-desc': sort === item.field && sortOrder === 'desc' } ] "
                                        @click=" item.sortable ? sortableHandle(item) : undefined ">
                                        <span>{{ item.label }}</span>
                                        <span class="ui-sortable-handle" v-if=" item.sortable "><icon class="ui-icon" icon="caret-down"></icon></span>
                                    </th>

                                </template>

                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, key) in items">
                                <td class="checkbox">
                                    <input type="checkbox" :id=" 'post-item__' + item.postID " :value="item.postID" v-model="selected">
                                    <label :for=" 'post-item__' + item.postID "></label>
                                </td>

                                <template v-for=" (td, i) in columns ">
                                    <td v-if="!td.hidden">
                                        <span v-if=" td.field === 'title' ">{{ item[td.field] }}</span>
                                        <span v-else-if=" td.field === 'taxonomy' ">{{ item[td.field] }}</span>
                                        <span v-else-if=" td.field === 'status' ">{{ getStatus(item[td.field]) }}</span>
                                        <span v-else>{{ item[td.field] }}</span>
                                    </td>
                                </template>

                                <!--
                                <td><span :data-href=" '/post/' + item.post_id ">{{ item.post_title }}</span></td>
                                <td><span :data-href=" '/taxonomy/' + item.taxonomy_id ">{{ item.taxonomy_name }}</span></td>
                                <td>{{ item.user_id }}</td>
                                <td>{{ item.created_at }}</td>
                                <td>{{ getStatus(item.post_status) }}</td>
                                -->

                                <th>
                                    <div class="action-more">
                                        <icon class="ui-icon" icon="ellipsis-h"></icon>
                                        <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="ui-pagination" v-if="pagination.pages-1">
                        <ul class="uk-pagination uk-flex-center">
                            <li><a class="btn btn-white" href="#"><span uk-pagination-previous></span></a></li>
                            <li><a class="btn btn-white" href="#">1</a></li>
                            <li><a class="btn btn-white" href="#">2</a></li>
                            <li class="uk-disabled"><a class="btn btn-white"><span>...</span></a></li>
                            <li><a class="btn btn-white" href="#">6</a></li>
                            <li class="uk-active"><a class="btn btn-white"><span>7</span></a></li>
                            <li><a class="btn btn-white" href="#">8</a></li>
                            <li><a class="btn btn-white" href="#"><span uk-pagination-next></span></a></li>
                        </ul>
                    </div>

                    <div class="table-footer" v-show="selected.length">
                        <a class="btn btn-white" href="javascript:;" @click=" selected = []">全不选</a>
                        <a class="btn btn-danger" href="javascript:;" @click=" goUrl(selected) ">删除条目</a>
                    </div>
                </div>
            </div>

            <div class="ui-widget uk-width-1-1@s">
                <p>已选 {{selected}}, 共{{ selected.length }}条目</p>
            </div>
        </div>
    </div>
    <slot></slot>
</div>
</template>

<script>

const URL_POST = '/api/post.json'

var {ajax, each} = UIkit.util
var {orderBy} = _

import Icon from '../component/fa5-icon.vue'
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
                label: '博文',
                control: [
                    { label: '文章筛选', className: 'select-default', type: 'select', options: [
                        { label: '已发布', value: 'published' },
                        { label: '已发布(私密)', value: 'private' },
                        { label: '已删除', value: 'deleted' },
                        { label: '旧版本', value: 'inherit' },
                        { label: '文章草稿', value: 'draft' },
                        { label: '自动保存', value: 'auto-draft' }
                    ] },
                    { label: '新建分类', className: 'btn-white', link: '#', type: 'button' },
                    { label: '新增博文', className: 'btn-primary', link: '#', type: 'button' }
                ]
            },
            dropdown: [
                { label: '创建页面', type: 'item', link: '#', className: '' },
                { label: '添加分类', type: 'item', link: '#', className: '' },
                { label: '禁用条目', type: 'item', link: '#', className: '' },
                { type: 'divider' },
                { label: '删除条目', type: 'item', link: '#', className: 'uk-text-danger' }
            ],

            selected: [],

            sort: 'title',
            sortOrder: 'asc', // asc, desc

            columns: [
                { field: 'title', label: '标题', map: 'post_title', sortable: true },
                { field: 'taxonomy', label: '分类', map: 'taxonomy_name', sortable: true },
                { field: 'user', label: '作者', map: 'user_id' },
                { field: 'time', label: '时间', map: 'created_at', sortable: true },
                { field: 'status', label: '状态', map: 'post_status' },

                { field: 'postID', map: 'post_id', hidden: true },
                { field: 'taxonomyID', map: 'taxonomy_id', hidden: true }
            ],

            rawItems: [], // 文章列表

            pagination: {
                pages: 1,
                items: 3,
                current: 1
            }
        }
    },

    methods: {

        goUrl(data = [], method = 'delete') {
            let m = method.toUpperCase()
            console.log('%c[' + m + '] /api/post %c [PARMA] ' + data.join(', '), 'background-color: #000; color: #ffeb3b; padding-left: 8px;', 'background-color: #2196f3; color: #fff; padding-right: 8px;')
        },

        getSelectAll() {
            return this.selected.length === this.items.length ? [] : this.items.map(function(item) {
                return item.postID
            })
        },

        getStatus(status) {

            let arr = {
                published: '已发布',
                private: '已发布(私密)',
                deleted: '已删除',
                inherit: '旧版本文章',
                draft: '草稿',
                'auto-draft': '自动草稿'
            }

            return typeof arr[status] === 'undefined' ? '已发布' : arr[status]
        },

        sortableHandle(item) {
            let vm = this
            let col = vm.columns
            let rawData = vm.rawItems
            vm.sort = item.field
            vm.sortOrder = vm.sortOrder === 'desc' ? 'asc' : 'desc'

            let map = ''

            each(col, function(item, i) {
                if(item.field === vm.sort) map = item.map
            })

            vm.rawItems = orderBy(rawData, [map], [vm.sortOrder]);
        }

    },

    computed: {

        items() {
            let vm = this
            let col = vm.columns
            let raw = vm.rawItems
            let set = []
            each(raw, function(tr, i) {
                let row = {}
                each(col, function(td, i) {
                    let {field, map} = td
                    row[field] = tr[map]
                })
                set.push(row)
            })
            return set
        }
    },

    mounted() {
        let vm = this
        ajax(URL_POST).then(function(response) {
            let json = JSON.parse(response.response)
            vm.rawItems = json.response

            let perPage = vm.pagination.items
            let pages = Math.ceil(vm.items.length / perPage)

            vm.$set(vm.pagination, 'pages', pages)

        });

    }
}
</script>

<style lang="less">

@import "../less/variables.less";

@tableColor: #333;
@tableBackgroundColor: #fff;

.ui-taxonomy-list {

    table {
        background-color: @tableBackgroundColor;
        margin: 0;
    }

    th,
    td {
        padding: 8px;
        line-height: 32px;
    }

    input[type=checkbox],
    input[type=radio] {
        margin: 4px 0 0;
        margin-top: 1px\9;
        line-height: normal;
    }

    input[type=checkbox],
    textarea[type=checkbox] {
        opacity: 0;
        position: absolute;
        left: -9999px;
    }

    .ui-icon {
        width: 18px;
        height: 18px;
        fill: #32325d;
    }

    .action-more {
        float: right;
        padding: 0 10px 0 0;

        .ui-icon {
            -webkit-transition: transform .2s ease;
            transition: transform .2s ease;

            &[aria-expanded="true"] {
                -webkit-transform: rotate(90deg);
                transform: rotate(90deg);
            }
        }
    }
}

.checkbox {

    width: 48px;
    padding-left: 12px !important;

    label {
        display: inline-block;
        font-weight: 400;
        font-size: 14px;
        color: #333;
        margin: 0;
    }

    label:before {
        content: "";
        cursor: pointer;
        display: inline-block;
        height: 20px;
        margin: 0 8px 0 0;
        vertical-align: middle;
        width: 20px;
        background: #f6f9fc;
        border: none;
        border-radius: 3px;
        box-shadow: inset 0 1px 1px 0 rgba(0,0,0,.1);
    }

    input[type=checkbox]:checked+label:before,
    textarea[type=checkbox]:checked+label:before{
        background: #f6f9fc url(../images/checkmark.png) no-repeat 50%;
    }

    input[type=checkbox]:focus,
    input[type=file]:focus,
    input[type=radio]:focus {
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }
}

.table-footer {
    border-top: 1px solid #e5e5e5;
    padding: 16px;

    .btn + .btn { margin-left: 8px; }
}

.ui-pagination {
    border-top: 1px solid #e5e5e5;
    background-color: #fff;
    padding: 16px;

    .uk-pagination {
        margin: 0;
    }

    & > .uk-disabled > * {
        background-color: #eee;
    }
}

.ui-sortable-current {
    position: relative;
}

.ui-sortable-current:after {
    position: absolute;
    content: '';
    z-index: 1;
    width: 100%;
    display: block;

    left: 0;
    bottom: -1px;

    height: 2px;
    background-color: #3aa3e3;
}

.ui-sortable-handle {
    float: right;
    margin-right: 8px;
}

.ui-sortable-desc .ui-icon {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}
</style>
