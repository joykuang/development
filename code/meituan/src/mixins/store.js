/**
 * 项目路由声明
 * @import vuex
 * @export const store
 */

import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        count: 0
    },
    mutations: {
        increment(state) {
            state.count++
        }
    }
})

export default store
