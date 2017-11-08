<template>
    <div class="ui-backend">
        <backend-topbar></backend-topbar>
        <backend-caption :caption="caption"></backend-caption>
        <div class="ui-widgets">
            <div class="uk-grid-medium" uk-grid>
                <div class="ui-widget" :class="[widget.className]" v-for="(widget, key) in widgets">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            <div class="ui-widget-title">{{ widget.label }}</div>
                            <a
                                href="#"
                                class="btn btn-primary ui-widget-button uk-float-right"
                                v-if=" typeof widget.control !== 'undefined' && typeof widget.control.newButton !== 'undefined' && widget.control.newButton">新建</a>
                        </div>
                        <div class="uk-card-body">
                            <div class="row" v-for="n in 8">
                                <div class="label uk-display-inline-block">Sample Sentence #{{ n }}</div>
                                <div class="times uk-float-right">2017-10-29 15:02:58</div>
                            </div>
                        </div>
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
    components: { BackendTopbar, BackendCaption },
    data() {
        return {
            caption: {
                label: '状态',
                control: [
                    { label: '管理插件', className: 'btn-white', link: '#', type: 'button' }
                ]
            },
            widgets: [
                { className: 'uk-width-1-2@s', label: 'Blog', control: { newButton: true } },
                { className: 'uk-width-1-2@s', label: 'Things', control: { newButton: true } },
                { className: 'uk-width-1-1@s', label: 'Timeline' }
            ]
        }
    },
    computed: {

    },
    mounted() {

    }
}
</script>

<style lang="less">

@primary-default: #1e87f0;
@primary: #3aa3e3;

.ui-widgets {

    .uk-card {
        border-radius: 4px;
        box-shadow: 0 7px 14px 0 rgba(50,50,93,.1), 0 3px 6px 0 rgba(0,0,0,.07);
    }

    .uk-card-header {
        background-color: #fafafa;
        vertical-align: top;
        padding: 16px;
    }

    .uk-card-body {
        padding: 16px;
    }

    .ui-widget-title {
        font-size: 24px;
        font-weight: 300;
        line-height: 32px;
        display: inline-block;
    }

}

.row {
    line-height: 20px;
    padding: 8px 8px 8px 16px;
}

.row + .row {
    border-top: 1px solid #e5e5e5;
}



</style>
