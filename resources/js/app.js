
require('./bootstrap');

window.Vue = require('vue');


Vue.component('content-component', require('./components/ContentComponent.vue').default);
Vue.component('admin-component', require('./components/AdminComponent.vue').default);

import router from './routes';
import VueCurrencyFilter from 'vue-currency-filter'

Vue.use(VueCurrencyFilter,
  {
    symbol : '$',
    thousandsSeparator: '.',
    fractionCount: 0,
    fractionSeparator: ',',
    symbolPosition: 'front',
    symbolSpacing: true
  })


Vue.mixin({
    data: function() {
      return {
        get url() {
          return "http://localhost:8000/api/";
        }
      }
    }
})

const app = new Vue({
    el: '#app',
    router
});