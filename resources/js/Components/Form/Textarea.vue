<script setup>
import { onMounted, ref } from 'vue'

defineProps({
  modelValue: String,
})

defineEmits(['update:modelValue'])

const input = ref(null)

onMounted(() => {
  if (input.value.hasAttribute('autofocus')) {
    input.value.focus()
  }
})

defineExpose({ focus: () => input.value.focus() })
</script>

<template>
  <textarea ref="input" class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" :value="modelValue" rows="5" autocomplete="off" @input="$emit('update:modelValue', $event.target.value)" />
</template>
