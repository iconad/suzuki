require('./bootstrap');

window.Vue = require("vue");
import Vuex from 'vuex'

import PrettyCheckbox from 'pretty-checkbox-vue/check';
import Vodal from 'vodal';

Vue.component(Vodal.name, Vodal);
import VueSweetalert2 from 'vue-sweetalert2';
import VModal from 'vue-js-modal'


require('./components')


Vue.use(Vuex)
Vue.use(VModal)
Vue.use(PrettyCheckbox)
Vue.use(VueSweetalert2)

// Vue.use(VueApollo)
// Vue.use(VLazyImagePlugin)

import { store } from './store.js';


const app = new Vue({
    el: '#app',
    store
});

const bladeApp = new Vue({
    store
});
