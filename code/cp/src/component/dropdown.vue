<template>
    <div :uk-dropdown="uk">
        <ul class="uk-nav uk-dropdown-nav">
            <template v-for="(item, key) in menu">
                <li class="uk-nav-divider" v-if="item.type === 'divider' "></li>
                <li v-else><a :class="item.className" :href="item.link">{{ item.label }}</a></li>
            </template>
        </ul>
    </div>
</template>

<script>
export default {
    props: [ 'menu', 'uk' ]
}
</script>

<style lang="less">

</style>
