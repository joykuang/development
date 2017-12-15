<template>
<div class="ui-backend">
    <backend-topbar></backend-topbar>
    <backend-caption :caption="caption"></backend-caption>
    <div class="ui-widgets">
        <div class="uk-grid-medium" uk-grid>
            <!--div class="ui-widget uk-width-2-5@s"></div-->
            <div class="ui-widget uk-width-1-1@s">
                <div class="ui-content-list ui-content-create">


                    <form>
                        <fieldset class="uk-fieldset">

                            <div class="uk-margin">
                                <input class="uk-input" type="text" placeholder="博文标题 ...">
                            </div>

                            <div class="uk-margin">
                                <div data-content="文章筛选" class="select select-default">
                                    <select>
                                        <option>Option 01</option>
                                        <option>Option 02</option>
                                    </select>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <textarea class="uk-textarea" rows="5" placeholder="请愉快的书写文章吧 ..."></textarea>
                            </div>

                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                <label><input class="uk-radio" type="radio" name="radio2" checked> A</label>
                                <label><input class="uk-radio" type="radio" name="radio2"> B</label>
                            </div>

                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                <label><input class="uk-checkbox" type="checkbox" checked> A</label>
                                <label><input class="uk-checkbox" type="checkbox"> B</label>
                            </div>

                            <div class="uk-margin">
                                <input class="uk-range" type="range" value="2" min="0" max="10" step="0.1">
                            </div>

                        </fieldset>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <slot></slot>
</div>
</template>

<script>

import BackendTopbar from '../frames/backend__topbar.vue'
import BackendCaption from '../frames/backend__caption.vue'

export default {
    components: {
        BackendTopbar,
        BackendCaption
    },

    data() {
        return {
            mode: 'text', // text, url
            caption: {
                label: '编辑',
                control: [
                    { label: '保存草稿', className: 'btn-white', link: '#', type: 'button' },
                    { label: '文章预览', className: 'btn-primary', link: '#', type: 'button' },
                    { label: '发布文章', className: 'btn-success', link: '#', type: 'button' }
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

@tableColor: #333;
@tableBackgroundColor: #fff;

.ui-content-create {
    padding: 24px;
}

</style>
