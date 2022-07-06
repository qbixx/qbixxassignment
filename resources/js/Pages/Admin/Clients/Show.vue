<script setup>
import FrontLayout from '@/js/Layouts/FrontLayout.vue'
import TheHeader from '@/js/Components/Header.vue'
import TheButton from '@/js/Components/Button.vue'

defineProps({
  client: Object,
  itemTypes: Object,
  translations: Object,
})
</script>

<template>
  <FrontLayout>
    <Head title="Client" />
        
    <TheHeader :client="client" />

    <div class="relative p-4">
      <div class="relative mx-auto max-w-7xl">
        <div class="max-w-lg mx-auto grid gap-4 lg:grid-cols-3 lg:max-w-none">
          <div 
            v-for="item in client.items" 
            :key="item.type" 
            class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden"
          >
            <div class="flex-shrink-0">
              <img 
                :src="itemTypes[item.type].config.image_url" 
                :alt="itemTypes[item.type].translation" 
                class="h-48 w-full object-cover" 
              />
            </div>

            <div :class="`bg-${itemTypes[item.type].config.color}-600/5`" class="py-2">
              <p class="text-sm text-center font-bold tracking-widest" :class="`text-${itemTypes[item.type].config.color}-600`">
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
                <TheButton>
                  {{ translations.just_a_button }}
                </TheButton>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </FrontLayout>
</template>
