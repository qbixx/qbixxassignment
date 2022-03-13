<template>
  <nav class="bg-white w-full z-50 border-gray-200 px-4 py-2.5 mb-4 shadow">
    <div class="max-w-7xl flex flex-wrap justify-between items-center mx-auto px-2">
      <template v-if="client">
        <span class="text-lg text-black font-montserrat">{{ client.name }}</span>
        <div class="relative">
          <div>
            <j-button id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                      shape="rounded-full" size="w-28"
                      type="button" @click="dropdown = !dropdown">
              <span class="sr-only">Open user menu</span>
              <div class="flex  items-center justify-between">
                <span v-if="selectedLanguage" class="inline-block font-bold text-sm">
                  {{ selectedLanguage.name }}
                </span>
                <svg class="w-4 h-4 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                  <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                </svg>
              </div>
            </j-button>
          </div>
          <div v-if="dropdown" aria-labelledby="user-menu-button" aria-orientation="vertical"
               class="origin-top-right absolute right-0 mt-2 w-36 rounded-md shadow-lg py-2 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
               role="menu" tabindex="-1">
            <a v-for="(language, i) in languages" :key="i"
               :class="{ 'bg-gray-200 dark:bg-gray-900': language.key === selectedLanguage.key }"
               class="flex items-center hover:bg-gray-200 px-2 cursor-pointer text-gray-800"
               @click="selectLanguage(language)">
              {{ language.name }}
            </a>
          </div>
        </div>
      </template>
      <template v-else>
        <a :href="route('admin.clients.index')"
           class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0">Clients</a>
        <a :href="route('front.welcome')"
           class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0">To the front end</a>
      </template>
    </div>
  </nav>
  <div class="max-w-7xl mx-auto">
    <flash-messages/>
    <slot/>
  </div>
</template>

<script>
import FlashMessages from "@/shared/FlashMessages";
import {computed, reactive, toRefs} from 'vue'
import {useStore} from 'vuex'
import {SET_LANGUAGE} from "@/store/keys";
import JButton from '@/templates/Button';

export default {
  name: "AppLayout",
  props: ['client'],
  components: {
    FlashMessages,
    JButton
  },
  setup() {
    // Store
    const store = useStore()
    // State
    const state = reactive({
      dropdown: false,
      languages: [
        {
          key: 'en',
          name: 'English'
        },
        {
          key: 'nl',
          name: 'Dutch'
        },
        {
          key: 'fr',
          name: 'French'
        }
      ]
    })
    // Computed
    const selectedLanguage = computed(() => store.state.selectedLanguage)

    // Methods
    const selectLanguage = (language) => {
      store.commit(SET_LANGUAGE, language)
      state.dropdown = false
    }

    return {
      ...toRefs(state),
      selectedLanguage,
      selectLanguage
    }
  }
}
</script>

<style scoped>

</style>