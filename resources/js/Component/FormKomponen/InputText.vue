<script setup>
defineProps({
  input_text: String,
  modelValue: String,
});
</script>

<template>
  <div class="form-floating">
    <input
      type="text"
      class="form-control"
      id="Text"
      placeholder="{{ input_text }}"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <label for="Text">{{ input_text }}</label>
  </div>
</template>