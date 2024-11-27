<script setup>
defineProps({
    title: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <div class="pagetitle">
            <h1>{{ title[0] }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">{{ title[1] }}</a></li>
                    <li class="breadcrumb-item">{{ title[2] }}</li>
                    <li class="breadcrumb-item active">{{ title[3] }}</li>
                </ol>
            </nav>
        </div>
</template>