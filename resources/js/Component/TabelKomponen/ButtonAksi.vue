<script setup>
defineProps({
    button: Object
})

</script>
<template>
    <td>
        <div class="d-flex">
            <button class="btn btn-success text-light me-2" v-if="button.View === true">
                <i class="fas fa-eye"></i> View
            </button>
            <button class="btn btn-warning text-light me-2" v-if="button.Edit === true">
                <i class="fas fa-edit"></i> Edit
            </button>
            <div class="d-flex">
                <button class="btn btn-danger" v-if="button.Delete === true">
                    <i class="fas fa-trash-alt"></i> Hapus
                </button>
            </div>
        </div>
    </td>
</template>