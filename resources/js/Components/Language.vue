<script setup>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { usePage } from '@inertiajs/inertia-vue3'
import { Listbox, ListboxButton, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { GlobeAltIcon } from '@heroicons/vue/solid'

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
  <div class="w-44 mx-auto">
    <Listbox v-model="selectedLocale" as="div" @update:model-value="() => getLanguage(selectedLocale.value)">
      <div class="mt-1 relative text-right">
        <ListboxButton>
          <div
            class="relative hidden lg:block lg:w-44 px-8 py-2 text-left text-white border-2 border-blue-600 bg-blue-600 hover:bg-white hover:text-blue-600 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400/50"
          >
            <span class="font-bold block truncate">{{ selectedLocale.text }}</span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
              <GlobeAltIcon class="h-5 w-5" aria-hidden="true" />
            </span>
          </div>
        </ListboxButton>

        <ListboxButton>
          <div class="relative lg:hidden w-[2.25rem] h-[2.25rem] text-white border-2 border-blue-600 bg-blue-600 hover:bg-white hover:text-blue-600 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400/50">
            <div class="absolute inset-0 flex items-center">
              <GlobeAltIcon class="h-5 w-5 mx-auto" aria-hidden="true" />
            </div>
          </div>
        </ListboxButton>

        <transition
          leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
          leave-to-class="opacity-0"
        >
          <ListboxOptions
            class="absolute z-10 mt-4 w-full max-h-56 py-1 text-base overflow-auto focus:outline-none"
          >
            <ListboxOption
              v-for="availableLocale in availableLocales" :key="availableLocale.value"
              v-slot="{ active }" as="template" :value="availableLocale"
            >
              <li class="relative text-blue-600 cursor-default select-none px-8 py-2 text-left">
                <span class="font-bold block truncate">{{ availableLocale.label }}</span>
                <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                  <GlobeAltIcon :class="[active ? 'visible' : 'invisible', 'h-5 w-5']" aria-hidden="true" />
                </span>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>
  </div>
</template>
