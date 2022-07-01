<script setup>
import FrontLayout from '@/js/Layouts/FrontLayout.vue'
import TheHeader from '@/js/Components/Header.vue'

defineProps({
  url: String,
  client: Object,
  items: Object,
  itemTypes: Object,
  translations: Object,
})
</script>

<template>
  <FrontLayout>
    <Head title="Client" />
        
    <TheHeader :url="url" :client="client" />

    <div class="relative bg-qbixx-gray-500 pt-2 pb-40 px-4">
      <div class="absolute lg:absolute inset-0">
        <div class="bg-white h-2/3" />
      </div>
      <div class="relative mx-auto py-8">
        <div class="max-w-7xl mx-auto">
          <div class="mt-12 max-w-lg mx-auto grid gap-16 lg:gap-6 lg:grid-cols-3 lg:max-w-none">
            <div v-for="item in items" :key="item.type" class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden">
              <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" :src="itemTypes[item.type].config.image_url" :alt="itemTypes[item.type].translation" />
              </div>
              <div :class="`bg-${itemTypes[item.type].config.color}-600/5`" class="py-2">
                <p class="text-xl text-center font-bold tracking-widest" :class="`text-${itemTypes[item.type].config.color}-600`">
                  {{ itemTypes[item.type].translation.toUpperCase() }}
                </p>
              </div>
              <div class="flex-1 p-6 flex flex-col">
                <div class="flex-1">
                  <div class="block mt-2">
                    <p class="text-[3.125rem] font-bold text-black line-clamp-2 break-words">
                      {{ item.title }}
                    </p>
                    <p class="mt-3 text-xl font-normal text-black">
                      {{ item.paragraph }}
                    </p>
                  </div>
                </div>
                <div class="mt-20">
                  <a href="#" class="px-8 py-2 text-base font-bold text-white border-2 border-blue-600 bg-blue-600 hover:bg-white hover:text-blue-600 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400/50" aria-describedby="just-a-button">
                    {{ translations.just_a_button }}
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </FrontLayout>
</template>
