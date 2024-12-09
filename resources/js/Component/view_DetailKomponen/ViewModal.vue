<script setup>
const props = defineProps({
    selectedData: {
        type: [Object, null],
        required: true
    }
})
</script>

<template>
    <div class="modal fade" id="largeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Data Rumah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" v-if="selectedData">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Aturan divue semuanya dimulai dari manual -->
                            <img :src="`/Sisprum/public/FotoRumah/${selectedData.Foto}`" :alt="selectedData.Foto">
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label for="nomor_rumah">Nomor Rumah</label>
                                <input class="w-100" type="text" :value="selectedData.NomorRumah" id="nomor_rumah"
                                    disabled>
                            </div>
                            <div class="">
                                <label for="nomor_rumah">Nomor Rumah</label>
                                <textarea class="w-100" id="nomor_rumah" :value="selectedData.AlamatRumah" rows="5"
                                    disabled>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, omnis.</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
img {
    width: 100%;
}
</style>