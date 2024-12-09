<script setup>
const props = defineProps({
  message: {
    type: String,
    default: null,
  },
});
</script>

<template>
  <div v-if="message" class="text-danger">{{ message }}</div>
</template>
