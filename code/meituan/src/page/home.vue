<template>
    <div class="wm-home">
        <div class="h-search" v-if=" search ">
            <div class="">
                <input type="text" name="search" placeholder="关键字 ...">
            </div>
        </div>

        <div class="ui-section ui-pt h-banner">
            <img src="../images/banner.jpg">
        </div>

        <div class="ui-section ui-pt h-menu">
            <div class="ui-items ui-items-5">
                <div class="ui-item" v-for="(n, i) in 10">
                    <div class="ui-item-icon"><img :src=" menu[n].icon "></div>
                    <div class="ui-item-name">{{ menu[n].name }}</div>
                </div>
            </div>
        </div>

        <div class="ui-section h-section-title">优惠专区</div>

        <div class="ui-section ui-pt h-yh1">
            <div class="ui-items ui-items-xs ui-items-2">
                <div class="ui-item" v-for="(n, i) in 2">
                    <div class="h-r-shop">
                        <div class="ui-item-icon"><img :src=" shop[n].icon "></div>
                        <div class="ui-item-name">{{ shop[n].name }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui-section ui-pt h-yh2">
            <div class="ui-items ui-items-xs ui-items-4">
                <div class="ui-item" v-for="(n, i) in 4">
                    <div class="h-r-shop">
                        <div class="ui-item-icon"><img :src=" shop[n+3].icon "></div>
                        <div class="ui-item-name">{{ shop[n+3].name }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

let menu = require('../json/types-sample.json')
let shop = require('../json/shop-sample.json')

export default {

    data() {
        return {
            menu,
            shop,
            search: false
        }
    },

    mounted() {

    }

}

</script>

<style lang="less">

@import "../less/base.less";

.wm-home {
    padding-bottom: 60px;
}

.h-search {
    padding: 8px;
    background-color: #ffb219;
}

.h-search input {
    outline: 0;
    width: 100%;
    padding: 0 8px;
    overflow: hidden;
    line-height: 32px;
    border-radius: 2px;
}

.h-menu {

    .ui-item {
        padding: 0 8px 4px 8px;
        text-align: center;
    }

    .ui-item-icon {
        border-radius: 50%;
        overflow: hidden;
        padding: 0 6px;
    }

    .ui-item-name {
        font-size: 11px;
        margin-top: 4px;
        line-height: 24px;
    }

}

.h-section-title {
    font-weight: bold;
    line-height: 20px;
}

.h-yh1 {

    .ui-item-icon {
        height: 30vw;
        overflow: hidden;
    }

    .ui-item-name {
        font-size: 13px;
        margin-top: 4px;
        line-height: 24px;
    }
}

.h-yh2 {

    .ui-item-icon {
        height: 30vw;
        overflow: hidden;
    }

    .ui-item-icon img {
        width: auto;
        height: 100%;
    }

    .ui-item-name {
        font-size: 13px;
        margin-top: 4px;
        line-height: 24px;
    }
}
</style>
