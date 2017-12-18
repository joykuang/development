<template>
<div class="wpicons">
  <div class="wp-svg" v-html="html"></div>
  <div class="wp-icons">
    <div class="wp-svg-icon" v-for="(item, key) in icon">
      <svg class="wp-icon"><use :xlink:href=" '#' + item  " /></svg>
      <div class="wp-name">{{ item }}</div>
    </div>
  </div>
</div>
</template>

<script>
import UIkit from 'uikit'
const $ajax = UIkit.util.ajax

export default {
  data() {
    return {
      html: [],
      icon: []
    }
  },
  mounted() {
    let vm = this;
    let dom = document.createElement('div')
    let ajaxUrl = '/src/images/wpicons.svg'

    $ajax(ajaxUrl).then(function(response) {
      let html = response.response

      vm.html = html
      dom.innerHTML = html

      let icon = dom.querySelectorAll('symbol')
      let name = []

      for (let i in icon) {
        if (!icon[i].id) continue
        name.push(icon[i].id)
      }

      vm.icon = name
    });
  }
}
</script>

<style lang="less">
.app {
    height: 100%;
    overflow: auto;
    overflow-x: hidden;
}

.wp-svg {
    display: none;
}

.wp-icons {
    // max-width: 1200px;
    margin: 0 auto;
    padding: 24px;
}

.wp-icons:after {
    display: block;
    content: '';
    clear: both;
}

.wp-svg-icon {
    width: 12.5%;
    float: left;
    text-align: center;
    padding: 12px 0;
}

.wp-icon {
    width: 36px;
    height: 36px;
    fill: #666;
}

.wp-name {
    color: #777;
    height: 36px;
    font-size: 13px;
    padding: 0 16px;
    margin-top: 8px;
    line-height: 18px;
}

@media (min-width: 1900px) {
    .wp-svg-icon {
        width: 10%;
    }
}

@media (min-width: 2540px) {
    .wp-svg-icon {
        width: 6.25%;
    }
}
</style>
