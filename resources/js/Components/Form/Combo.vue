<template>
  <div class="">
    <Combobox v-model="selected">
      <div class="relative mt-1">
        <div
          class="relative cursor-default overflow-hidden m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
        >
          <ComboboxInput
            class="w-full border-none py-2 pl-3 pr-10 text-sm leading-5 text-gray-900 focus:ring-0"
            :display-value="(option) => option.text"
            @change="query = $event.target.value"
          />
          <ComboboxButton
            class="absolute inset-y-0 right-0 flex items-center pr-2"
          >
            <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
          </ComboboxButton>
        </div>
        <TransitionRoot
          leave="transition ease-in duration-100"
          leave-from="opacity-100"
          leave-to="opacity-0"
          @after-leave="query = ''"
        >
          <ComboboxOptions
            class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
          >
            <div
              v-if="filteredOptions.length === 0 && query !== ''"
              class="relative cursor-default select-none py-2 px-4 text-gray-700"
            >
              Nothing found.
            </div>

            <ComboboxOption
              v-for="option in filteredOptions"
              :key="option.value"
              v-slot="{ active }"
              as="template"
              :value="option"
            >
              <li
                class="relative cursor-default select-none py-2 pl-3 pr-4"
                :class="{
                  'bg-gray-100 text-gray-700': active,
                  'text-gray-700': !active,
                }"
              >
                <span class="block truncate">
                  {{ option.text }}
                </span>
              </li>
            </ComboboxOption>
          </ComboboxOptions>
        </TransitionRoot>
      </div>
    </Combobox>
  </div>
</template>

<script setup>
import { ref, computed, watch, watchEffect } from 'vue'
import {
  Combobox,
  ComboboxInput,
  ComboboxButton,
  ComboboxOptions,
  ComboboxOption,
  TransitionRoot,
} from '@headlessui/vue'
import { SelectorIcon } from '@heroicons/vue/solid'

const props = defineProps({
  modelValue: String,
  options: Array, // [{ value: '...', text: '...'}, ...]
})

const emit = defineEmits(['update:modelValue'])

const selected = ref('')
const query = ref('')

const filteredOptions = computed(() =>
  query.value === ''
    ? props.options
    : props.options.filter((option) =>
      option.text
        .toLowerCase()
        .replace(/\s+/g, '')
        .includes(query.value.toLowerCase().replace(/\s+/g, '')),
    ),
)

watchEffect(() => {
  selected.value = props.options.find((option) => option.value === props.modelValue)
})

watch(selected, (newSelected) => {
  emit('update:modelValue', newSelected.value)
})
</script>
