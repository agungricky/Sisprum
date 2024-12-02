<script setup>
import Main from '../Pages/main.vue';
import PageTitle from '../Component/TabelKomponen/PageTitle.vue';
import Tabel from '../Component/TabelKomponen/Tabel.vue';

import { computed, onMounted } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
const Rumah = computed(() => usePage().props.Rumah);

const title = ['Data Rumah', 'Home', 'Tables', 'Data Rumah']
const tabelTitle = [ 'No', 'Nomor Rumah', 'Alamat Rumah', 'Foto', 'Aksi'];
const text = {
    'h5': 'Data Rumah',
    'p': 'Berikut ini merupakan data Rumah yang ada di <b>MojoRoto Indah</b>.'
}
const button = {
    'View': true,
    'Edit': true,
    'Delete' : true
}

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
                    <Tabel :tabelTitle="tabelTitle" :data="Rumah" :button="button" :text="text" deleteRoute="Rumah"/>        
                </div>
            </div>
        </section>
    </Main>
</template>