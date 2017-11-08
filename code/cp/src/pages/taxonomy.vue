<template>
<div class="ui-backend">
    <backend-topbar></backend-topbar>
    <backend-caption :caption="caption"></backend-caption>
    <div class="ui-widgets">
        <div class="uk-grid-medium" uk-grid>
            <!--div class="ui-widget uk-width-2-5@s"></div-->
            <div class="ui-widget uk-width-1-1@s">
                <div class="ui-content-list ui-taxonomy-list">
                    <table class="uk-table uk-table-divider uk-table-hover">
                        <thead>
                            <tr>
                                <th class="checkbox-col">
                                    <input type="checkbox" id="checkbox-all">
                                    <label for="checkbox-all"></label>
                                </th>
                                <th>分类名称</th>
                                <th>分类SLUG</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, count, key) in postList" :key="key">
                                <td class="checkbox-col">
                                    <input type="checkbox" :id=" 'checkbox-' + count " :value="item.taxonomy_id" v-model="selectedPostID">
                                    <label :for=" 'checkbox-' + count "></label>
                                </td>
                                <td>{{ item.taxonomy_name }}</td>
                                <td>/{{ item.taxonomy_slug }}</td>
                                <th>
                                    <div class="action-more">
                                        <icon class="ui-icon" icon="ellipsis"></icon>
                                        <dropdown uk="mode: click" :menu="dropdown"></dropdown>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <slot></slot>
</div>
</template>

<script>

const URL_TAXONOMY = '/api/taxonomy.json'

import UIkit from 'uikit'
const $ajax = UIkit.util.ajax

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
                label: '分类',
                control: [
                    { label: '显示 URL', className: 'btn-white', link: '#', type: 'button', click: function(vm, e) {
                        let el = e.target
                        let _vm = vm.$parent
                        let mode = _vm.mode === 'url' ? 'text' : 'url'
                        let text = _vm.mode === 'url' ? '显示 URL' : '显示标题'

                        el.textContent = text
                        _vm.mode = mode
                        //_vm.$set('mode', mode)

                    } },
                    { label: '新建分类', className: 'btn-primary', link: '#', type: 'button' }
                ]
            },
            dropdown: [
                { label: '创建页面', type: 'item', link: '#', className: '' },
                { label: '添加分类', type: 'item', link: '#', className: '' },
                { label: '禁用条目', type: 'item', link: '#', className: '' },
                { type: 'divider' },
                { label: '删除条目', type: 'item', link: '#', className: 'uk-text-danger' }
            ],
            postList: [],
            selectedPostID: []
        }
    },

    mounted() {
        let vm = this
        $ajax(URL_TAXONOMY).then(function(response) {
            let json = JSON.parse(response.response)
            vm.postList = json.response
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
        }
    }
}

.checkbox-col {

    width: 48px;

    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 400;
        color: #333;
        font-size: 14px;
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

[aria-expanded="true"] {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}
</style>
