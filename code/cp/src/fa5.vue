<template>
    <div class="fa5">
        <div class="fa5-icons">
            <div class="fa5-svg" v-for="(item, key) in fa5">
                <svg class="fa5-icon" :viewBox="item.view"><path :d="item.path" /></svg>
                <div class="fa5-name">{{ item.name }}</div>
            </div>
        </div>
    </div>
</template>

<script>
const fa5 = require('./data/fa5-free.json')

export default {
    data() {
        return {
            fa5
        }
    }
}

</script>

<style lang="less">

.app {
    height: 100%;
    overflow: auto;
    overflow-x: hidden;
}

.fa5-icons {
    // max-width: 1200px;
    margin: 0 auto;
    padding: 24px;
}

.fa5-icons:after {
    display: block;
    content: '';
    clear: both;
}

.fa5-svg {
    width: 12.5%;
    float: left;
    text-align: center;
    padding: 12px 0;
}

.fa5-icon {
    width: 36px;
    height: 36px;
    fill: #666;
}

.fa5-name {
    color: #777;
    height: 36px;
    font-size: 13px;
    padding: 0 16px;
    margin-top: 8px;
    line-height: 16px;
}

@media (min-width: 1900px) {
    .fa5-svg { width: 10%; }
}

@media (min-width: 2540px) {
    .fa5-svg { width: 6.25%; }
}

</style>
