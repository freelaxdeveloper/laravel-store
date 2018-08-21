import BootstrapVue from 'bootstrap-vue'
window.Vue = require('./vue.library')

Vue.use(BootstrapVue);

import Basket from './components/Basket.vue'

var app = new Vue({
  components: {Basket},
  el: '#app',
  data: {
    message: 'Hello Vue!'
  }
})