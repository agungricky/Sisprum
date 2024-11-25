<script setup>
import { computed, onMounted} from 'vue';
import Main from '../Pages/main.vue';
import { usePage, router } from '@inertiajs/vue3';
const Rumah = computed(() => usePage().props.Rumah);
let no = 1;

onMounted(() => {
    $('#example').DataTable();
})

function deleteRumah(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        router.delete(route('rumah.destroy', id), {
            onSuccess: () => {
                alert('Data berhasil dihapus.');
            },
        });
    }
}

</script>

<template>
    <Main>
        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data Rumah</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Berikut ini merupakan data Rumah yang ada di <b>MojoRoto Indah</b>.</p>

                            <!-- Table with stripped rows -->
                            <table id="example" class="table datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nomor Rumah</th>
                                        <th>Alamat Rumah</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="Rmh in Rumah" :key="Rmh.id">
                                        <td class="text-center">{{ no++ }}</td>
                                        <td class="text-center">{{ Rmh.nomor_rumah }}</td>
                                        <td>{{ Rmh.alamat_rumah }}</td>
                                        <td>-</td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-warning text-light me-2" @click="router.get(route('users.edit', Rmh.id))">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <div class="d-flex">
                                                    <button class="btn btn-danger" @click="deleteRumah(Rmh.id)">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </Main>
</template>