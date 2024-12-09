<script setup>
import Main from "../Pages/main.vue";
import InputText from "../Component/FormKomponen/InputText.vue";
import InputFile from "../Component/FormKomponen/InputFile.vue";
import InputTextArea from "../Component/FormKomponen/InputTextArea.vue";
import PageTitle from "../Component/TabelKomponen/PageTitle.vue";
import ErrorMessage from "../Component/message/Validation.vue";
import { reactive } from "vue";
// import { useForm } from "vee-validate";
import { useForm } from '@inertiajs/vue3';
import * as yup from "yup";

// Schema Validasi
const schema = yup.object({
    nomor_rumah: yup
        .string()
        .required("Nomor Rumah harus diisi.")
        .matches(
            /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9\s]+$/,
            "Nomor Rumah harus mengandung huruf dan angka."
        ),
    foto_rumah: yup
        .mixed()
        .required("Foto Rumah harus diisi.")
        .test("fileSize", "Ukuran file tidak boleh lebih dari 2 MB.", (value) => {
            if (!value) return false; // Jika tidak ada file, return false untuk validasi
            const maxSize = 2 * 1024 * 1024; // Maksimal 2 MB
            return value.size <= maxSize; // Validasi ukuran file
        })
        .test("fileType", "File harus berupa PNG, JPG atau JPEG.", (value) => {
            if (!value) return false; // Jika tidak ada file, return false untuk validasi
            const allowedTypes = ["image/png", "image/jpg", "image/jpeg"];
            return allowedTypes.includes(value.type); // Hanya izinkan tipe gambar PNG, JPG, JPEG
        }),
    alamat_rumah: yup
        .string()
        .required("Alamat Rumah harus diisi.")
        .matches(/^[a-zA-Z\s]+$/, "Alamat Rumah hanya boleh berisi huruf dan spasi.")
        .min(10, "Alamat Rumah harus terdiri dari minimal 10 karakter.")
});

// Form Reactive
const form = reactive({
    nomor_rumah: "",
    foto_rumah: null,
    alamat_rumah: "",
    errors: {}, // Menyimpan pesan error
});

// Validasi Realtime
const validateField = (field) => {
    const value = form[field];
    schema
        .validateAt(field, { [field]: value })
        .then(() => {
            form.errors[field] = null; // Tidak ada error
        })
        .catch((err) => {
            form.errors[field] = err.message; // Menyimpan pesan error
        });
};

// Menghandle perubahan file (foto)
const handleFileChange = (e) => {
    const file = e.target.files[0]; // Ambil file pertama yang dipilih
    if (file) {
        form.foto_rumah = file;  // Set nilai foto_rumah di form
        validateField('foto_rumah');  // Validasi field foto_rumah secara langsung
    }
};

// Fungsi Submit
const submit = () => {
    // Menjalankan validasi untuk seluruh form
    schema
        .validate(form, { abortEarly: false }) // Validasi semua field
        .then(() => {
            console.log(form);
            form.post(route('TambahRumah.store'), {
                onSuccess: () => {
                    form.nomor_rumah = '';
                    form.foto_rumah = null;
                    form.alamat_rumah = '';
                    form.errors = {}; // Reset form dan error setelah submit
                }
            });
            alert("Form submitted successfully!");
        })
        .catch((err) => {
            // Menyimpan semua error
            err.inner.forEach((e) => {
                form.errors[e.path] = e.message;
            });
        });
};
</script>


<template>
    <Main>
        <div class="pagetitle">
            <PageTitle :title="['Forms', 'Forms', 'Tambah Rumah']" />
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center my-4 p-0">===== TAMBAH RUMAH =======</h5>

                            <form @submit.prevent="submit" enctype="multipart/form-data" class="row g-3">
                                <!-- Nomor Rumah -->
                                <div class="col-md-6">
                                    <InputText v-model="form.nomor_rumah" input_text="Masukan Nomor Rumah"
                                        @input="validateField('nomor_rumah')" />
                                    <ErrorMessage :message="form.errors.nomor_rumah" />
                                </div>

                                <!-- Foto Rumah -->
                                <div class="col-md-6">
                                    <InputFile @change="handleFileChange"
                                        input_file="Silahkan upload File Berupa Gambar" />
                                    <ErrorMessage :message="form.errors.foto_rumah" />
                                </div>

                                <!-- Alamat Rumah -->
                                <div class="col-12">
                                    <InputTextArea v-model="form.alamat_rumah"
                                        input_textArea="Silahkan Masukan Alamat Rumah"
                                        @input="validateField('alamat_rumah')" />
                                    <ErrorMessage :message="form.errors.alamat_rumah" />
                                </div>

                                <!-- Buttons -->
                                <div class="text-center d-flex justify-content-center gap-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button"
                                        @click="Object.assign(form, { nomor_rumah: '', foto_rumah: null, alamat_rumah: '', errors: {} })"
                                        class="btn btn-secondary">
                                        Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Main>
</template>
