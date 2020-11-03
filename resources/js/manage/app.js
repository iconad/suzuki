require('./bootstrap');

window._ = require('lodash');

window.Vue = require("vue");
import Vuex from 'vuex'
import SemanticUI from 'semantic-ui-vue';
import VueSweetalert2 from 'vue-sweetalert2';



require('./components')


Vue.use(Vuex)
Vue.use(SemanticUI)
Vue.use(VueSweetalert2)
// Vue.use(VueApollo)

import { store } from './store.js';


const app = new Vue({
    el: '#app',
    store
});
