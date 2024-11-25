<script setup>
import { ref } from 'vue';
import Main from './main.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps(['user']);
const form = useForm({
    nomor_rumah: props.user.nomor_rumah,
    alamat_rumah: props.user.alamat_rumah
});

function updateUser() {
    form.put(route('users.update', props.user.id), {
        onSuccess: () => {
            alert('User updated successfully');
        },
    });
}
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
                            <form @submit.prevent="updateUser" class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                            placeholder="Nomor Rumah" v-model="form.nomor_rumah"
                                            rules="required|numberOnly" />
                                        <label for="floatingName">Nomor Rumah</label>
                                        <ErrorMessage name="nomor_rumah" class="text-danger" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input as="textarea" name="alamat_rumah" class="form-control"
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
                            </form>
                            <!-- End Floating Labels Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Main>
</template>
