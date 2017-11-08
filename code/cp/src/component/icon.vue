<template>
    <svg class="ui-svg-icon">
        <use :xlink:href=" href == undefined ? '../src/images/wpicons.svg#' + icon : href " />
    </svg>
</template>

<script>
export default {
    props: ['icon', 'href']
}
</script>

<style>

</style>
