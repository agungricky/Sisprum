<script setup>
defineProps({
    input_file: String,
    modelValue: File
});
</script>

<template>
    <div class="form-floating">
        <input
            type="file"
            class="form-control"
            id="floatingFile"
            :placeholder="input_file"
            @change="$emit('update:modelValue', $event.target.files[0])" />

        <label for="floatingFile">{{ input_file }}</label>
    </div>
</template>
