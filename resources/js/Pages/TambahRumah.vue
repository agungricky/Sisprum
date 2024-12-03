<script setup>
import Main from '../Pages/main.vue';
import InputText from '../Component/FormKomponen/InputText.vue';
import InputFile from '../Component/FormKomponen/InputFile.vue';
import InputTextArea from '../Component/FormKomponen/InputTextArea.vue';
import PageTitle from '../Component/TabelKomponen/PageTitle.vue';
import { useForm } from '@inertiajs/vue3';

const title = ['Forms', 'Forms', 'Tambah Rumah'];
const form = useForm({
    nomor_rumah: "",
    foto_rumah: null,
    alamat_rumah: ""
});

const submit = () => {
    form.post(route('TambahRumah.store'), {
        onSuccess: () => {
            form.reset();
        }
    })
}
</script>

<template>
    <Main>
        <div class="pagetitle">
            <PageTitle :title="title" />
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center my-4 p-0">===== TAMBAH RUMAH =======</h5>

                            <form @submit.prevent="submit" action="/upload-photo" enctype="multipart/form-data"
                                class="row g-3">
                                <div class="col-md-6">
                                    <InputText v-model="form.nomor_rumah" input_text="Masukan Nomor Rumah" />
                                </div>
                                <div class="col-md-6">
                                    <InputFile v-model="form.foto_rumah"
                                        input_file="Silahkan upload File Berupa Gambar" />
                                </div>
                                <div class="col-12">
                                    <InputTextArea v-model="form.alamat_rumah"
                                        input_textArea="Silahkan Masukan Alamat Rumah" />
                                </div>
                                <div class="text-center d-flex justify-content-center gap-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" @click="form.reset()" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Main>
</template>