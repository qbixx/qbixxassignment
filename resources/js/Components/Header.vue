<script setup>
import { UserCircleIcon } from '@heroicons/vue/solid'
import TheLanguage from '@/js/Components/Language.vue'

defineProps({
  url: String,
  client: Object,
})
</script>

<template>
  <div class="w-full bg-gradient-to-b from-white to-qbixx-gray-500/5 border-b px-4 pt-4 pb-40">
    <div class="rounded-lg bg-qbixx-gray-500">
      <div class="text-white text-center py-8 md:py-12 lg:py-24">
        <h2 class="text-xl md:text-3xl lg:text-5xl font-semibold leading-tight">Welcome Qbixx Client!</h2>
        <h3 class="text-lg md:text-xl lg:text-2xl leading-tight my-6">We wish you good times!</h3>
        <Link href="/admin/clients" class="inline-flex items-center px-8 py-2 text-base font-bold text-white border-2 border-blue-600 bg-blue-600 hover:bg-white hover:text-blue-600 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400/50">
          To admin panel
        </Link>
      </div>
    </div>

    <div class="mx-auto max-w-7xl pt-8">
      <div class="flex justify-between items-center">
        <div class="-mr-32">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <UserCircleIcon class="mr-2 h-5 w-5 text-black" aria-hidden="true" />
            </div>
            <div>
              <h3 class="text-xl leading-6 font-normal text-black line-clamp-1 break-words">
                {{ client.name }}
              </h3>
            </div>
          </div>
        </div>
        <div class="flex-shrink-0 flex justify-end">
          <div>
            <TheLanguage :url="url" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>