<script setup>
import { router } from '@inertiajs/vue3';
defineProps({
    button: {
        type: Object,
        require: true
    },

    tabelTitle: {
        type: Array,
        require: true
    },

    data: {
        type: Array,
        require: true
    },

    text: {
        type: Object,
        require: true
    },

    deleteRoute: {
        type: String,
        required: true,
    },
})

function sukses() {
    alert('Data berhasil dihapus.');
}

function Delete(id, Request) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        if (Request == 'Rumah') {
            router.delete(route('rumah.destroy', id), {
                onSuccess: sukses
            });
        }
        if (Request == 'Penghuni') {
            router.delete(route('penghuni.destroy', id), {
                onSuccess: sukses
            });
        }
    }
}


</script>
<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ text.h5 }}</h5>
            <p v-html="text.p"></p>

            <div class="table-responsive">
                <table id="example" class="table datatable table-bordered mt-3">
                    <thead>
                        <tr>
                            <th class="text-center" v-for="item in tabelTitle" :key="item">{{ item }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in data" :key="index">
                            <td>{{ index + 1 }}</td>
                            <template v-for="(value, key) in item" :key="key">
                                <td v-if="key !== 'id'">
                                    {{ value }}
                                </td>
                            </template>
                            <td class="text-center">
                                <div class="d-flex">
                                    <button class="btn btn-success text-light me-2" v-if="button.View === true">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button class="btn btn-warning text-light me-2" v-if="button.Edit === true">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <div class="d-flex">
                                        <button class="btn btn-danger" v-if="button.Delete === true"
                                        @click="console.log(item.id); Delete(item.id, deleteRoute)">
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
</template>