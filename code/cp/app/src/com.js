import button from './uikit/button.vue'
import uiButton from './ui/button.vue'

import input from './uikit/input.vue'
import uiInput from './ui/input.vue'

import select from './uikit/select.vue'
import uiSelect from './ui/select.vue'

import textarea from './uikit/textarea.vue'
import uiTextarea from './ui/textarea.vue'

Vue.component('uk-button', button)
Vue.component('ui-button', uiButton)

Vue.component('uk-input', input)
Vue.component('ui-input', uiInput)

Vue.component('uk-select', select)
Vue.component('ui-select', uiSelect)

Vue.component('uk-textarea', textarea)
Vue.component('ui-textarea', uiTextarea)

export {
    button,
    input,
    select,
    textarea,

    uiButton,
    uiInput,
    uiSelect,
    uiTextarea
}
