<script setup>
import Main from './main.vue';
import PageTitle from '../Component/TabelKomponen/PageTitle.vue';
import Tabel from '../Component/TabelKomponen/Tabel.vue';


const title = ['Data Penghuni', 'Home', 'Tables', 'Data Penghuni'];
const tabelTitle = [
    'No',
    'Nama Lengakap',
    'Foto Ktp',
    'Status Penghuni',
    'Nomor Telp',
    'Status Nikah'
];

const button = {
    'View': true,
    'Edit': true,
    'Delete' : true
}

defineProps({
    penghuni: {
        type: Array,
        require:true
    }
})
</script>

<template>
    <Main>
        <PageTitle :title="title"/>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <Tabel :tabelTitle="tabelTitle" :penghuni="penghuni" :button="button"/>        
                </div>
            </div>
        </section>
    </Main>
</template>