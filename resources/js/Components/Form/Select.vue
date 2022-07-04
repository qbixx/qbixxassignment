<script setup>
defineProps({
  modelValue: String,
  options: Array,
})

defineEmits(['update:modelValue'])
</script>

<template>
  <select
    :value="modelValue" 
    class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
    @change="$emit('update:modelValue', $event.target.value)"
  >
    <option 
      v-for="(option, index) in options" 
      :key="index" 
      :value="option.value"
    >
      {{ option.text }}
    </option>
  </select>
</template>
