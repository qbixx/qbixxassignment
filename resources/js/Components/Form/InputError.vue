<script setup>
defineProps(['message'])
</script>

<template>
  <div v-show="message">
    <p class="font-semibold text-red-600">
      {{ message }}
    </p>
  </div>
</template>
