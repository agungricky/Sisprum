<script setup>
import Main from './main.vue';
import PageTitle from '../Component/TabelKomponen/PageTitle.vue';
import Tabel from '../Component/TabelKomponen/Tabel.vue';


const title = ['Data Penghuni', 'Home', 'Tables', 'Data Penghuni'];
const tabelTitle = [ 'No', 'Nama Lengakap', 'Foto Ktp', 'Status Penghuni', 'Nomor Telp', 'Status Nikah', 'Aksi'];
const text = {
    'h5': 'Data Rumah',
    'p': 'Berikut ini merupakan data Penghuni yang ada di <b>MojoRoto Indah</b>.'
}
const button = {
    'View': true,
    'Edit': true,
    'Delete' : true
}

const penghuni = computed(() => usePage().props.penghuni);

import { computed, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';

onMounted(() => {
    $('#example').DataTable();
})

</script>

<template>
    <Main>
        <PageTitle :title="title"/>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <Tabel :tabelTitle="tabelTitle" :data="penghuni" :button="button" :text="text" deleteRoute="Penghuni"/>        
                </div>
            </div>
        </section>
    </Main>
</template>