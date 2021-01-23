import Vue from 'vue';
import Vuex from 'vuex';


import gql from 'graphql-tag'
import vehicleQuery from "../../gql/frontend/vehicle.gql";

import graphqlClient from './apollo';

Vue.use(Vuex);

export const store = new Vuex.Store({

    state: {
        publicUrl: "https://gyporomo.com/storage",
        baseUrl: "https://gyporomo.com",
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
        accessoriesQuoteModal: false,
        isVehicle: false,
        vehicle: null
    },

    mutations: {
        mutateVehicle: function (state, payload) {
            state.vehicle = payload
        },
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
        isVehicle: function(state, payload) {
            state.isVehicle = payload
        },
    },

    actions: {
        async getVehicle({ commit }, vid) {
            commit('isVehicle', false)
            const response = await graphqlClient.query({
            query: vehicleQuery,
            variables: { id: vid },
            });
            commit('mutateVehicle', response.data.vehicle)
            commit('isVehicle', true)
        },
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







