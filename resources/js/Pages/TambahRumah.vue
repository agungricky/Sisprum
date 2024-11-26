<script setup>
import Main from '../Pages/main.vue';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { object, string } from 'yup';
import { useForm } from '@inertiajs/vue3';

// Skema Validasi Yup
const schema = object({
    nomor_rumah: string().required('Nomor rumah wajib diisi'),
    alamat_rumah: string()
        .required('Alamat rumah wajib diisi')
        .min(10, 'Alamat minimal 10 karakter'),
});

// Inertia.js untuk pengiriman form
const form = useForm({
    nomor_rumah: '',
    alamat_rumah: '',
});

// Fungsi Submit
const submit = () => {
    form.post(route('TambahRumah.store'), {
        onSuccess: () => form.reset(),
        onError: (errors) => console.log('Validation errors:', errors),
    });
};
</script>

<template>
    <Main>
        <div class="pagetitle">
            <h1>Form Tambah Rumah</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambahkan Rumah</h5>

                            <!-- Form VeeValidate -->
                            <Form :validation-schema="schema" @submit="submit" v-slot="{ meta }" class="row g-3">
                                <!-- Field Nomor Rumah -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <Field name="nomor_rumah" id="nomor_rumah" class="form-control"
                                            placeholder="Nomor Rumah" v-model="form.nomor_rumah" />
                                        <label for="nomor_rumah">Nomor Rumah</label>
                                        <ErrorMessage name="nomor_rumah" class="text-danger" />
                                    </div>
                                </div>

                                <!-- Field Alamat Rumah -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <Field name="alamat_rumah" id="alamat_rumah" as="textarea" class="form-control"
                                            placeholder="Alamat Rumah" v-model="form.alamat_rumah"
                                            style="height: 100px" />
                                        <label for="alamat_rumah">Alamat Rumah</label>
                                        <ErrorMessage name="alamat_rumah" class="text-danger" />
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-primary" :disabled="!meta.valid">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary" @click="form.reset()">Reset</button>
                                </div>
                            </Form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Main>
</template>

<style>
.text-danger {
    font-size: 0.9rem;
    color: red;
}

button:disabled {
    cursor: not-allowed;
    opacity: 0.6;
}
</style>
