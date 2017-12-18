<template>
<div id="app" class="app" v-cloak>
    <div class="demo-title">
        {{ app }}
    </div>

    <div class="demo-button uk-grid-small uk-child-width-auto uk-flex-middle uk-margin-medium" uk-grid>
        <div>
            <uk-button>Default</uk-button>
        </div>
        <div>
            <uk-button level="primary">Primary</uk-button>
        </div>
        <div>
            <uk-button level="secondary">Secondary</uk-button>
        </div>
        <div>
            <uk-button level="danger">Danger</uk-button>
        </div>
        <div>
            <uk-button disabled>Disabled</uk-button>
        </div>
    </div>

    <div class="demo-button uk-grid-small uk-child-width-auto uk-flex-middle uk-margin-medium" uk-grid>
        <div>
            <ui-button>Default</ui-button>
        </div>
        <div>
            <ui-button level="primary">Primary</ui-button>
        </div>
        <div>
            <ui-button level="secondary">Secondary</ui-button>
        </div>
        <div>
            <ui-button level="danger">Danger</ui-button>
        </div>
        <div>
            <ui-button disabled>Disabled</ui-button>
        </div>
    </div>

    <form class="uk-form-horizontal">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-h-text">输入框</label>
            <div class="uk-form-controls">
                <p><uk-input width="xsmall" placeholder="xsmall" /></p>
                <p><uk-input width="small" level="blank" placeholder="small + blank" /></p>
                <p><uk-input width="medium" level="success" placeholder="medium + success" /></p>
                <p><uk-input width="large" level="danger" placeholder="large + danger" /></p>
                <p><ui-input width="large" id="form-h-text" placeholder="请输入 ..." /></p>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-h-select">下拉框</label>
            <div class="uk-form-controls">
                <p>
                    <uk-select width="large" id="form-h-select">
                        <option>选项一</option>
                        <option>选项二</option>
                    </uk-select>
                </p>
                <p>
                    <ui-select width="large">
                        <option>选项一</option>
                        <option>选项二</option>
                    </ui-select>
                </p>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-h-textarea">文本域</label>
            <div class="uk-form-controls">
                <p><uk-textarea level="success" size="large" id="form-h-textarea" rows="5" placeholder="请尽情书写 ..." content="测试一下"></uk-textarea></p>
                <p><ui-textarea size="large" id="form-h-textarea" rows="5" placeholder="请尽情书写 ..."></ui-textarea></p>
            </div>
        </div>

        <div class="uk-margin">
            <span class="uk-form-label">单选框</span>
            <div class="uk-form-controls uk-form-controls-text">
                <p><label class="uk-margin-right"><input class="uk-radio" type="radio" name="radio1">选项三</label>
                <label><input class="uk-radio" type="radio" name="radio1">选项四</label></p>
                <p><label class="uk-margin-right"><input class="uk-radio" type="radio" name="radio1">选项三</label>
                <label><input class="uk-radio" type="radio" name="radio1">选项四</label></p>
            </div>
        </div>

        <div class="uk-margin">
            <span class="uk-form-label">多选框</span>
            <div class="uk-form-controls uk-form-controls-text">
                <p><label class="uk-margin-right"><input class="uk-checkbox" type="checkbox">选项五</label>
                <label><input class="uk-checkbox" type="checkbox">选项六</label></p>
                <p><label class="uk-margin-right"><input class="uk-checkbox" type="checkbox">选项五</label>
                <label><input class="uk-checkbox" type="checkbox">选项六</label></p>
            </div>
        </div>

    </form>
</div>
</template>

<script>

import button from './com'

export default {

    data() {
        return {
            app: 'App',
            textarea: '<p>段落一</p><hr><pre>.class { color: #fff; }</pre>'
        }
    },

    components: {

    }
}

</script>

<style lang="less">
[v-cloak] {
    display: none;
}

.app {
    padding: 24px;
}

label > input {
    margin-right: 12px !important;
}
</style>
