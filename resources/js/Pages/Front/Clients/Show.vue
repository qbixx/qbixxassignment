<template>
  <app-layout :client="client">
    <div class="grid grid-cols-3 px-4 lg:px-0 gap-2 md:gap-4">
      <div v-for="(item, i) in client.items"
           :key="i" class="col-span-3 md:col-span-1 bg-white rounded-lg py-8 shadow-md flex justify-between flex-col">
        <div>
          <p :class="`text-center tracking-tight font-montserrat p-2 font-semibold ${colors[i]}`">
            {{ translate(item, 'type') }}</p>
          <h1 class="px-4 my-4 font-montserrat tracking-tighter font-bold text-black text-title h-25.5 overflow-hidden text-ellipsis title">
            {{ translate(item, 'title') }}</h1>
          <p class="px-4 tracking-tight font-montserrat text-lg text-black">{{ translate(item, 'description') }}</p>
        </div>
        <div class="px-4 mt-8">
          <j-button shape="rounded-full">{{ translate(translations, 'button', true) }}</j-button>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/layouts/AppLayout";
import JButton from '@/templates/Button.vue';
import {computed, inject} from 'vue'
import {useStore} from 'vuex'

export default {
  name: "Show",
  props: ['client'],
  components: {AppLayout, JButton},
  setup() {
    // Providers
    const translate = inject('translate')
    // Store
    const store = useStore()

    const colors = ['blue', 'green', 'yellow']
    // Computed
    const translations = computed(() => store.state.translations)

    return {
      translate,
      colors,
      translations
    }
  }
}
</script>

<style lang="css" scoped>
.title {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
</style>
