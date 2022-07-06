<script setup>
import TheLanguage from '@/js/Components/Language.vue'

defineProps({
  client: Object,
})
</script>

<template>
  <div class="w-full px-4 pt-4 pb-28 bg-white">
    <div class="mx-auto lg:max-w-7xl">
      <div class="flex justify-between items-start">
        <div class="text-xl font-normal text-black line-clamp-1 break-words">
          {{ client.name }}
        </div>

        <div class="flex-shrink-0 flex justify-end">
          <TheLanguage />
        </div>
      </div>
    </div>
  </div>
</template>