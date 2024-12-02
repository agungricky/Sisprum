<script setup>
defineProps({
    success: String
})
</script>

<template>
    <div class="alert alert-success" role="alert">
        {{success}}
    </div>
</template>