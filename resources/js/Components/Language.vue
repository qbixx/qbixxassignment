<script setup>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { usePage } from '@inertiajs/inertia-vue3'
import { Listbox, ListboxButton, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/solid'

const locale = usePage().props.value.locale
const availableLocales = usePage().props.value.availableLocales

const getLanguage = (selectedLocale) => Inertia.get(
  '/language',
  { locale: selectedLocale },
  { preserveScroll: true },
)

const selectedLocale = ref(availableLocales.find(availableLocale => availableLocale.value === locale))
</script>

<template>
  <div>
    <Listbox 
      v-model="selectedLocale" 
      as="div" 
      @update:model-value="() => getLanguage(selectedLocale.value)"
    >
      <div class="relative">
        <ListboxButton>
          <div class="inline-flex items-center px-6 py-2 border border-transparent font-bold text-sm rounded-full text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
            <span>{{ selectedLocale.text }}</span>
            <span class="ml-2">
              <ChevronDownIcon class="h-5 w-5" aria-hidden="true" />
            </span>
          </div>
        </ListboxButton>

        <transition
          leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
          leave-to-class="opacity-0"
        >
          <ListboxOptions class="absolute z-10 w-full py-1 text-base focus:outline-none">
            <ListboxOption
              v-for="availableLocale in availableLocales"
              :key="availableLocale.value"
              as="div" 
              :value="availableLocale"
            >
              <li class="text-blue-600 px-6 py-1">
                <button class="font-bold text-sm">
                  <span>
                    {{ availableLocale.label }}
                  </span>
                </button>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>
  </div>
</template>
