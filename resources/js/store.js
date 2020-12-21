import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({

    state: {
        publicUrl: "http://127.0.0.1:8000/storage/",
        isModalOne: false,
        isBroucherModal: false,
        isSpecSheetModal: false,
        isSidebar: false,
        isBodyOverlay: false,
        isFinancialCalculator: true,
        isSideButtonStatus: 'drive',
        cart: [],
        isCart: false,
        isCheckout: false,
        accessoriesQuoteModal: false
    },

    mutations: {
        accessoriesQuoteModal: function(state, payload) {
            state.accessoriesQuoteModal = payload
        },
        flashing: function(state, payload) {
            state.flashing = payload
        },
        isCart: function(state, payload) {
            state.isCart = payload
        },
        isCheckout: function(state, payload) {
            state.isCheckout = payload
        },
        cart: function(state, payload) {
            if(payload != false) {
                state.cart.push(payload)
            }
            // console.log(payload)
        },
        deleteCartItem (state, payload) {
            state.cart.splice(payload,1)
            if(state.cart.length == 0) {
                state.isCart = false
            }
        },
        updateCart (state, payload) {
            window.sessionStorage.setItem("cart", JSON.stringify(state.cart))
            document.getElementById("audio").play()
        },
        isBodyOverlay: function(state, payload) {
            state.isBodyOverlay = payload
        },
        isModalOne: function(state, payload) {
            state.isModalOne = payload
        },
        isBroucherModal: function(state, payload) {
            state.isBroucherModal = payload
        },
        isSpecSheetModal: function(state, payload) {
            state.isSpecSheetModal = payload
        },
        isSidebar: function(state, payload) {
            state.isSidebar = payload
        },
        isSideButtonStatus: function(state, payload) {
            state.isSideButtonStatus = payload
        },
        isFinancialCalculator: function(state, payload) {
            state.isFinancialCalculator = payload
        },
    },

    actions: {
        addToCart ({ commit, state }, payload) {

            commit('cart', payload)
            commit('updateCart')

          },
          deleteCartItem ({commit, state}, payload) {
            commit('deleteCartItem', payload)
            commit('updateCart', payload)
          }
    },
  })







