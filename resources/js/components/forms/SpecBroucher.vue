<template>
    <div>

        <!-- <div class="isBroucher">Broucher</div> -->

            <modal @before-close="onCloseModal" adaptive width="1100" height="auto" scrollable name="modal" class="bg-opacity-50 bg-black relative">
            <div class="bg-white relative px-12 py-24 lg:rounded-30">
                <div class="absolute right-0 top-0 px-12 py-2">
                    <span @click="$modal.hide('modal')">
                        <svg class="fill-current w-16 h-`6` text-gray-800 hover:text-red-600 focus:outline-none cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                    </span>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <div class="flex items-center">
                        <div>
                            <img src="https://i.ibb.co/g4061LK/broucher.png" alt="image" class="w-full shadow-2xl">
                            <div class="mt-12 flex items-center">
                                <div class="flex items-center">
                                    <div v-if="brochure && brochure.length != 0" class="cursor-pointer border border-gray-300 explore-more-button mb-2 flex items-center focus:outline-none transition ease-linear duration-200 hover:bg-gray-300 focus:bg-gray-300 rounded-lg overflow-hidden bg-gray-200 w-48">
                                        <img src="https://i.ibb.co/sywLcjp/icon-download.png" alt="download icon" class="w-8">
                                        <a href="/get-a-brochure" class="inline-block px-2 py-1 text-sm capitalize" >Download Brochure </a>
                                    </div>
                                    <!-- <div v-if="spec && spec.length != 0" class="ml-3 cursor-pointer border border-gray-300 explore-more-button mb-2 flex items-center focus:outline-none transition ease-linear duration-200 hover:bg-gray-300 focus:bg-gray-300 rounded-lg overflow-hidden bg-gray-200 w-48"> -->
                                        <!-- <img src="https://i.ibb.co/3vn5hPx/icon-specs.png" alt="download icon" class="w-8"> -->
                                        <!-- <span class="inline-block px-2 py-1 text-sm capitalize">Specification Sheet</span> -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="w-full page-shadow">
                            <img src="https://i.ibb.co/gPZgfRp/spec-sheet.png" alt="image" class="w-full shadow-lg">
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


export default {
    props: ['brochure'],
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
