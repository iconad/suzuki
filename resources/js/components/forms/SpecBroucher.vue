<template>
    <div>
<!--
        <div class="isBroucher">
        </div> -->

            <modal @before-close="onCloseModal" adaptive width="1100" height="auto" scrollable name="modal" class="bg-opacity-50 bg-black relative">
            <div class="bg-white relative px-12 py-24 lg:rounded-30">
                <div class="absolute right-0 top-0 px-12 py-2">
                    <span @click="$modal.hide('modal')">
                        <svg class="fill-current w-16 h-`6` text-gray-800 hover:text-red-600 focus:outline-none cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                    </span>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <div class="md:flex md:items-center">
                        <div>
                            <thumb-image v-if="firstMedia.length != 0" classess="w-full shadow-2xl" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
                            <div class="mt-12 flex items-center">
                                <div class="md:flex md:items-center">
                                    <div v-if="brochure && brochure.length != 0" class="cursor-pointer border border-gray-300 explore-more-button mb-2 flex items-center focus:outline-none transition ease-linear duration-200 hover:bg-gray-300 focus:bg-gray-300 rounded-lg overflow-hidden bg-gray-200 w-48">
                                        <img src="https://i.ibb.co/sywLcjp/icon-download.png" alt="download icon" class="w-8">
                                        <a href="/get-a-brochure" class="inline-block px-2 py-1 text-sm capitalize" >Download Brochure </a>
                                    </div>
                                    <div v-else>
                                        Broucher not available
                                    </div>
                                    <div v-if="spec && spec.length != 0" class="md:ml-3 mt-3 md:mt-0 cursor-pointer border border-gray-300 explore-more-button mb-2 flex items-center focus:outline-none transition ease-linear duration-200 hover:bg-gray-300 focus:bg-gray-300 rounded-lg overflow-hidden bg-gray-200 w-48">
                                        <img src="https://i.ibb.co/3vn5hPx/icon-specs.png" alt="download icon" class="w-8">
                                        <a href="/get-a-specsheet" class="inline-block px-2 py-1 text-sm capitalize">Specification Sheet</a>
                                    </div>
                                    <div class="ml-5" v-else>
                                        Specsheet not available
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="w-full page-shadow">
                            <thumb-image v-if="specList.length != 0" classess="w-full shadow-lg" :image="specList[0].file_name" :id="specList[0].id"></thumb-image>
                        </div>
                    </div>
                </div>
            </div>
            </modal>

            <modal @before-close="onCloseBroucherModal" adaptive width="1100" height="auto" scrollable name="broucher-modal" class="bg-opacity-50 bg-black relative">
            <div class="bg-white relative px-12 py-24 pb-8 rounded-30">
                <div class="absolute right-0 top-0 px-12 py-2">
                    <span @click="$modal.hide('broucher-modal')">
                        <svg class="fill-current w-16 h-`6` text-gray-800 hover:text-red-600 focus:outline-none cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                    </span>
                </div>
                <!-- <div> -->
                    <!-- <get-broucher></get-broucher> -->
                <!-- </div> -->
            </div>
        </modal>


    </div>
</template>

<script>

 import thumbImage from '../ThumbImage'

export default {
    props: ['brochure', 'spec', 'vehicle'],
    data() {
        return {
        }
    },
    watch: {
        isModalOne (value) {
            if(value){
                this.$modal.show('modal');
            }
        }
    },
    computed: {
        firstMedia (){
            return this.vehicle.media.filter(e => {
                if(e.collection_name === 'speccover') {
                    return e
                }
            })
        },
        specList (){
            return this.vehicle.media.filter(e => {
                if(e.collection_name === 'speclist') {
                    return e
                }
            })
        },
        isModalOne () {
            return this.$store.state.isModalOne
        }
    },
    mounted() {
            // this.$modal.show('broucher-modal');
    },
    methods: {
        getBroucherModal () {
            this.$modal.show('broucher-modal');
            this.$modal.hide('modal');
            this.onCloseModal()
        },
        onCloseModal () {
            this.$store.commit('isModalOne', false)
        },
        onCloseBroucherModal () {
            this.$store.commit('isModalOne', true)
        }
    },
}
</script>

<style lang="scss">
    .page-shadow {
        box-shadow: -15px -15px 20px rgba(black, 0.15);
    }
</style>
