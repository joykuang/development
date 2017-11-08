<template>
    <div class="uk-flex ui-backend-title">
        <h1 v-if="caption.label">{{ caption.label }}</h1>
        <div class="btn-group">

        <template v-for="(item, key) in caption.control">

            <template v-if="item.type === 'button' ">
                <a
                    class="btn"
                    :class="[item.className]"
                    :href="typeof item.link != undefined && item.link ? item.link : 'javascript:;' "
                    @click=" typeof item.click == 'function' ? item.click.apply(this, [_self, $event]) : undefined ">{{ item.label }}</a>
            </template>

            <template v-else-if="item.type === 'select' ">
                <div class="select" :class="[item.className]" :data-content="item.label">
                    <select>
                        <option :value="opt.value" v-for="(opt, i) in item.options">{{ opt.label }}</option>
                    </select>
                </div>
            </template>

        </template>
        </div>
    </div>
</template>

<script>

export default {
    props: ['caption']
}

</script>

<style lang="less">

    .ui-backend-title {
        padding: 0 24px;

        h1 {
            font-size: 24px;
            font-weight: 300;
            -ms-flex: 1;
            flex: 1;
        }

        * + * { margin-left: 16px; }
    }

</style>
