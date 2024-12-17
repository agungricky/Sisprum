<script setup>
import InputFile from '../FormKomponen/InputFile.vue';
import InputText from '../FormKomponen/InputText.vue';
import InputTextArea from '../FormKomponen/InputTextArea.vue';

// Mendefinisikan props selectedData
const props = defineProps({
    selectedData: {
        type: Object,
        default: () => ({}),
    }
});

import { useForm } from '@inertiajs/vue3';

const form = useForm({
    nomor_rumah: props.selectedData?.NomorRumah || "",
    foto_rumah: null, 
    alamat_rumah: props.selectedData?.AlamatRumah || "",
});

// Fungsi submit
const submit = () => {
    const formData = new FormData();
    formData.append('nomor_rumah', form.nomor_rumah);
    formData.append('alamat_rumah', form.alamat_rumah);
    if (form.foto_rumah) {
        formData.append('foto_rumah', form.foto_rumah);
    }

    form.patch(route('users.update', { id: props.selectedData?.id }), {
        data: formData,
        onSuccess: () => {
            alert('Submit Berhasil');
        },
        onError: () => {
            alert('Terjadi kesalahan');
        }
    });
};
</script>

<template>
    <div class="modal fade" id="largeEdit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Rumah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit" action="/upload-photo" enctype="multipart/form-data" class="row g-3"
                        v-if="selectedData">
                        <div class="col-md-6">
                            <label for="">Nomor Rumah</label>
                            <InputText v-model="form.nomor_rumah" :input_text="selectedData.NomorRumah" />
                            <!-- <ErrorMessage :message="form.errors.nomor_rumah" /> -->
                        </div>
                        <div class="col-md-6">
                            <label for="">Foto Rumah</label>
                            <InputFile v-model="form.foto_rumah" :input_file="selectedData.Foto" />
                            <!-- <ErrorMessage :message="form.errors.foto_rumah" /> -->
                        </div>
                        <div class="col-12">
                            <label for="">Alamat Rumah</label>
                            <InputTextArea v-model="form.alamat_rumah" :input_textArea="selectedData.AlamatRumah" />
                            <!-- <ErrorMessage :message="form.errors.alamat_rumah" /> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="form.reset()">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
img {
    width: 100%;
}
</style>