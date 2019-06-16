import Vue from 'vue'
import Vuex from 'vuex' 
import message from './modules/message/index'
import users from './modules/user/index'


Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    message,
    users
  },
  strict: debug,
})