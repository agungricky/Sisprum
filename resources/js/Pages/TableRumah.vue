<script setup>
import Main from '../Pages/main.vue';
import PageTitle from '../Component/TabelKomponen/PageTitle.vue';

import { computed, onMounted } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
const Rumah = computed(() => usePage().props.Rumah);
let no = 1;

const title = ['Data Rumah', 'Home', 'Tables', 'Data Rumah']

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
        <PageTitle :title="title"/>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Rumah</h5>
                            <p>Berikut ini merupakan data Rumah yang ada di <b>MojoRoto Indah</b>.</p>

                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
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
                                                    <button class="btn btn-warning text-light me-2"
                                                        @click="router.get(route('users.edit', Rmh.id))">
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
                            </div>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Main>
</template>