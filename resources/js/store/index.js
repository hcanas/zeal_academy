import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";
import * as Cookies from "js-cookie";

const store = createStore({
  state: {
    token: null,
    slp_price: 0,
  },
  getters: {
    getSLPPrice(state) {
      return state.slp_price;
    },
  },
  mutations: {
    setSLPPrice(state, price) {
      state.slp_price = price;
    },
  },
  actions: {
    setSLPPrice({ commit }, price) {
      commit('setSLPPrice', price);
    },
  },
  plugins: [
    createPersistedState({
      storage: {
        getItem: (key) => Cookies.get(key),
        setItem: (key, value) => Cookies.set(key, value),
        removeItem: (key) => Cookies.remove(key),
      },
    }),
  ],
});

export default store;
