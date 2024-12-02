<script setup>
defineProps({
  input_textArea: String,
  modelValue: String
});
</script>

<template>
  <div class="form-floating">
    <textarea
      class="form-control"
      placeholder="Address"
      id="floatingTextarea"
      style="height: 100px"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    ></textarea>
    <label for="floatingTextarea">{{ input_textArea }}</label>
  </div>
</template>