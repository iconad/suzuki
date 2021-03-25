import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({

    state: {
        isModalOne: false,
        isBroucherModal: false,
        isSpecSheetModal: false,
        isSidebar: false,
        isBodyOverlay: false,
        isFinancialCalculator: true,
        isSideButtonStatus: 'drive'
    },

    mutations: {
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
    },
  })







