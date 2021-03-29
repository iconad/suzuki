require('./bootstrap');

window.Vue = require("vue");
import Vuex from 'vuex'

import PrettyCheckbox from 'pretty-checkbox-vue/check';
import Vodal from 'vodal';
Vue.component(Vodal.name, Vodal);
import VueSweetalert2 from 'vue-sweetalert2';
import VModal from 'vue-js-modal'
import { VLazyImagePlugin } from "v-lazy-image";
import iframeResize from 'iframe-resizer/js/iframeResizer';


Vue.directive('resize', {
    bind: function(el, { value = {} }) {
      el.addEventListener('load', () => iframeResize(value, el))
    },
    unbind: function (el) {
      el.iFrameResizer.removeListeners();
    }
  })

require('./components')

import { store } from './store.js';


import VueApollo from 'vue-apollo'
import { ApolloClient } from 'apollo-client'
import { createHttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'

// HTTP connection to the API
const httpLink = createHttpLink({
    // You should use an absolute URL here
    uri: 'https://gypromo.com/graphql',
})
// Cache implementation
const cache = new InMemoryCache()

// Create the apollo client
const apolloClient = new ApolloClient({
    link: httpLink,
    cache,
})

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
})

Vue.use(Vuex)
Vue.use(VModal)
Vue.use(VueApollo)
Vue.use(PrettyCheckbox)
Vue.use(VueSweetalert2)
Vue.use(VLazyImagePlugin)


const app = new Vue({
    el: '#app',
    store,
    apolloProvider
});

// const bladeApp = new Vue({
//     store,
//     apolloProvider
// });
