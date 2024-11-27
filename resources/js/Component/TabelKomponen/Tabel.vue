<script setup>
import ButtonAksi from './ButtonAksi.vue';
defineProps({
    button: {
        type: Object,
        require: true
    },

    tabelTitle: {
        type: Array,
        require:true
    },

    penghuni: {
        type: Array,
        require: true
    }
})
</script>
<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Rumah</h5>
            <p>Berikut ini merupakan data Rumah yang ada di <b>MojoRoto Indah</b>.</p>

            <div class="table-responsive">
                <table id="example" class="table datatable">
                    <thead>
                        <tr>
                            <th class="text-center" v-for="item in tabelTitle" :key="item">{{ item }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in penghuni" :key="item">
                            <td>{{ item.id }}</td>
                            <td>{{ item.nama_lengkap }}</td>
                            <td>{{ item.foto_ktp }}</td>
                            <td>{{ item.status_penghuni }}</td>
                            <td>{{ item.nomor_telp }}</td>
                            
                            <ButtonAksi :button="button"/>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Table with stripped rows -->
        </div>
    </div>
</template>