<script setup>
import Main from '../Pages/main.vue';
import { useForm } from '@inertiajs/vue3';
import { defineRule, Field, Form as VeeForm, ErrorMessage } from "vee-validate";

// Definisikan aturan validasi Yup
defineRule("required", (value) => (value ? true : "Field ini wajib diisi"));
defineRule("minLength", (value, [limit]) =>
    value.length >= limit ? true : `Minimal ${limit} karakter`
);
defineRule("numberOnly", (value) =>
    /^\d+$/.test(value) ? true : "Hanya boleh angka"
);

// Gunakan inertia untuk pengiriman form
const form = useForm({
    nomor_rumah: "",
    alamat_rumah: "",
    blokRumah: "",
});

const submit = () => {
    // Kirim form menggunakan Inertia.js
    form.post(route("TambahRumah.store"), {
        onSuccess: () => form.reset(),
        onError: () => alert("Validation errors:", form.errors),
    });
};
</script>

<template>
    <Main>
        <div class="pagetitle">
            <h1>Form Layouts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Layouts</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambahkan Rumah</h5>

                            <!-- Floating Labels Form -->
                            <VeeForm @submit="submit" class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <Field type="text" name="nomor_rumah" class="form-control" id="floatingName"
                                            placeholder="Nomor Rumah" v-model="form.nomor_rumah"
                                            rules="required|numberOnly" />
                                        <label for="floatingName">Nomor Rumah</label>
                                        <ErrorMessage name="nomor_rumah" class="text-danger" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <Field as="textarea" name="alamat_rumah" class="form-control"
                                            id="floatingTextarea" placeholder="Alamat Rumah" v-model="form.alamat_rumah"
                                            style="height: 100px" rules="required|minLength:10" />
                                        <label for="floatingTextarea">Alamat Rumah</label>
                                        <ErrorMessage name="alamat_rumah" class="text-danger" />
                                    </div>
                                </div>

                                <div class="text-center d-flex justify-content-start gap-3 mt-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary" @click="form.reset()">
                                        Reset
                                    </button>
                                </div>
                            </VeeForm>
                            <!-- End Floating Labels Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Main>
</template>
