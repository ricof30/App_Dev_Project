// store.js
import Vue from 'vue';
import Vuex from 'vuex';

// Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    alertMessage: null,
  },
  mutations: {
    setAlertMessage(state, message) {
      state.alertMessage = message;
    },
  },
});
