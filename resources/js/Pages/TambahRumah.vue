<script setup>
import Main from '../Pages/main.vue';
import { useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';

const form = useForm({
    nomor_rumah: '',
    alamat_rumah: '',
    blokRumah: '',
    fotoRumah: null,
});

const submit = () => {
  form.post(route('TambahRumah.store'), {
    onSuccess: () => {
      form.reset();
    },
    onError: () => {
      console.log('Validation errors:', form.errors);
    },
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
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambahkan Rumah</h5>

                            <!-- Floating Labels Form -->
                            <form @submit.prevent="submit" class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder=""
                                            v-model="form.nomor_rumah">
                                        <label for="floatingName">Nomor Rumah</label>
                                    </div>
                                    <span v-if="form.errors.nomor_rumah" class="text-danger">{{ form.errors.nomor_rumah }}</span>

                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Address" id="floatingTextarea"
                                            style="height: 100px;" v-model="form.alamat_rumah"></textarea>
                                        <label for="floatingTextarea">Alamat Rumah</label>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="file" class="form-control" id="floatingPassword" placeholder="" v-model="form.fotoRumah">
                                        <label for="floatingPassword">Foto Rumah</label>
                                    </div>
                                </div> -->


                                <div class="text-center d-flex justify-content-start gap-3 mt-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                            <!-- End floating Labels Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Main>
</template>