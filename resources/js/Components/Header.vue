<script setup>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { usePage } from '@inertiajs/inertia-vue3'
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { UserCircleIcon } from '@heroicons/vue/outline'
import { ChevronDownIcon, ChevronUpIcon, GlobeAltIcon, CheckIcon } from '@heroicons/vue/solid'
import TheButton from '@/js/Components/Button.vue'

defineProps({
  client: Object,
})

const locale = usePage().props.value.locale
const availableLocales = usePage().props.value.availableLocales

const getLanguage = (value) => Inertia.get('/language', { locale: value }, { preserveScroll: true })

const selectedLocale = ref(availableLocales.find(availableLocale => availableLocale.value === locale))
</script>

<template>
  <div class="bg-white shadow px-4 p-4">
    <Disclosure v-slot="{ open }" as="nav" class="max-w-7xl mx-auto">
      <div>
        <div class="flex justify-between items-start">
          <div class="flex">
            <div class="flex-shrink-0 flex items-center">
              <UserCircleIcon class="block sm:hidden h-8 w-auto" />

              <div class="hidden sm:block h-8 w-auto text-xl font-normal text-black">
                {{ client.name }}
              </div>
            </div>
          </div>

          <div class="flex items-center">
            <DisclosureButton>
              <TheButton>
                <div class="hidden sm:inline-flex items-center font-bold text-sm">
                  <span>{{ selectedLocale.text }}</span>
                  <span class="pl-2">
                    <ChevronUpIcon v-if="open" class="h-5 w-5" />
                    <ChevronDownIcon v-else class="h-5 w-5" />
                  </span>
                </div>
                <div class="sm:hidden">
                  <span>
                    <GlobeAltIcon class="h-5 w-5" />
                  </span>
                </div>
              </TheButton>
            </DisclosureButton>
          </div>
        </div>
      </div>

      <DisclosurePanel>
        <div class="flex pt-4 sm:justify-end">
          <div class="space-y-1 mx-1">
            <div v-for="availableLocale in availableLocales" :key="availableLocale.value">
              <DisclosureButton
                @click="() => getLanguage(availableLocale.value)"
              >
                <div class="inline-flex items-center text-sm font-semibold text-white hover:text-gray-700">
                  <span :class="[availableLocale.value === selectedLocale.value ? 'text-gray-700' : '']">
                    <CheckIcon class="h-5 w-5" />
                  </span>
                  <span class="pl-2 text-gray-700">
                    {{ availableLocale.label }}
                  </span>
                </div>
              </DisclosureButton>
            </div>
          </div>
        </div>
      </DisclosurePanel>
    </Disclosure>
  </div>
</template>