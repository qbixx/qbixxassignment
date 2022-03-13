import { createStore } from 'vuex'
import {SET_LANGUAGE} from "./keys";

export default createStore({
  state: {
    selectedLanguage: {
      key: 'en',
      name: 'English'
    },
    translations: {
      en: {
        'button': 'Just a button'
      },
      nl: {
        'button': 'Gewoon een knop'
      },
      fr: {
        'button': 'Juste un bouton'
      }
    }
  },
  mutations: {
    [SET_LANGUAGE] (state, payload) {
      state.selectedLanguage = payload
    }
  }
})
