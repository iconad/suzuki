/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window._ = require('lodash');
window.Vue = require("vue");
import Vuex from 'vuex'

import PrettyCheckbox from 'pretty-checkbox-vue/check';
import Vodal from 'vodal';

Vue.component(Vodal.name, Vodal);

// import VueAwesomeSwiper from 'vue-awesome-swiper'
// import VTooltip from 'v-tooltip'
import VModal from 'vue-js-modal'
// import { VLazyImagePlugin } from "v-lazy-image";


require('./components')


Vue.use(Vuex)
Vue.use(VModal)
Vue.use(PrettyCheckbox)
// Vue.use(VueApollo)
// Vue.use(VLazyImagePlugin)

import { store } from './store.js';


const app = new Vue({
    el: '#app',
    store
});
