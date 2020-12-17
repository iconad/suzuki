<template>
    <div>
        <div class="text-2xl md:text-4xl suzuki-bold">Explore More</div>
        <div class="flex flex-col space-y-3 mt-3">
            <a href="#" class="flex flex-center border bg-gray-200 rounded-lg overflow-hidden w-64 explore-more-button">
                <img src="../../../../public/assets/images/icons/icon-drive.png" alt="icon" class="w-12">
                <span class="px-2 flex items-center text-xl">Book A Test Drive</span>
            </a>
            <span  class="flex flex-center border bg-gray-200 rounded-lg overflow-hidden w-64 explore-more-button">
                <img src="../../../../public/assets/images/icons/icon-download.png" alt="icon" class="w-12">
                <span class="px-2 flex items-center text-xl" @click="sidebar">Download Broucher</span>
            </span>
            <span class="flex flex-center border bg-gray-200 rounded-lg overflow-hidden w-64 explore-more-button">
                <img src="../../../../public/assets/images/icons/icon-specs.png" alt="icon" class="w-12">
                <span class="px-2 flex items-center text-xl" @click="close">Specification Sheet</span>
            </span>
        </div>
    </div>
</template>

<script>
    export default {

        methods: {
            sidebar () {
                this.$store.commit('isSidebar', true)
                this.$store.commit('isBodyOverlay', true)
            },
            close () {
                this.$store.commit('isSidebar', false)
                this.$store.commit('isBodyOverlay', false)
            }
        },

    }
</script>

<style lang="scss" scoped>

</style>
