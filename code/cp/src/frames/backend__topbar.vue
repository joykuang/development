<template>
<div class="ui-backend-topbar">
    <div class="ui-search">
        <div class="ui-search-box">
            <icon class="ui-search-icon" icon="search"></icon>
            <input type="text" autocomplete="off" placeholder="搜索关键字 ..." class="search-input input-blank">
        </div>
    </div>
    <div class="ui-topbar-item">
        <div class="ui-view-site" title="查看网站" uk-tooltip="pos: left">
            <icon class="ui-search-icon" icon="external"></icon>
        </div>
        <div class="ui-view-user">
            <img src="/src/images/man.png">
            <dropdown uk="mode: click" :menu="dropdown"></dropdown>
        </div>
    </div>
</div>
</template>

<script>
import Icon from '../component/icon.vue'
import Dropdown from '../component/dropdown.vue'

export default {
    components: {
        Icon,
        Dropdown
    },
    data() {
        return {
            dropdown: [
                { label: '个人资料', type: 'item', link: '#', className: '' },
                { label: '修改密码', type: 'item', link: '#', className: '' },
                { type: 'divider' },
                { label: '退出登录', type: 'item', link: '#', className: 'uk-text-danger' }
            ]
        }
    }
}
</script>

<style lang="less">
@search-icon-color: #3a4a4d;

.ui-backend-topbar {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 24px;
    margin-bottom: 8px;
    font-size: 14px;
}

.ui-search-box {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    box-shadow: 0 0 0 0.5px rgba(49,49,93,.03), 0 2px 5px 0 rgba(49,49,93,.1), 0 1px 2px 0 rgba(0,0,0,.08);
    background-color: #fff;
    width: 100%;
    max-width: 400px;
    border-radius: 4px;
    padding: 0 8px;
    margin-right: 16px;

    .search-input {
        width: 100%;
        max-width: 400px;
        padding-left: 5px;
        height: 32px;
        outline: 0;

        //box-shadow: none;
        //border: 0;
    }
}

.ui-search-icon {
    width: 20px;
    height: 20px;
    fill: @search-icon-color;
}

.ui-topbar-item {
    float: right;

    [class^="ui-view"] {
        cursor: pointer;
    }
}

.ui-view-user {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    overflow: hidden;
}

.ui-view-site {
    float: left;
    width: 24px;
    height: 24px;
    margin: 4px 16px 4px 0;
    background-color: #eee;
    border-radius: 50%;
}
</style>
