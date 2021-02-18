<template>
    <div>
        <div
        :class="isSideButton ? 'bg-gray-100' : '' "
        class="hidden fixed h-screen z-20 right-0 top-0 w-auto md:flex flex-col justify-center space-y-1 pr-3"
        >
            <span @click="OpenBroucherModal" class="cursor-pointer border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto">
                <img src="../../../../public/assets/images/icons/download.png" alt="icon" class="w-8">
            </span>
            <a href="/test-drive" class="border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto">
                <img src="../../../../public/assets/images/icons/drive.png" alt="icon" class="w-8">
            </a>
            <button @click="sidebar" class="border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto">
                <img src="../../../../public/assets/images/icons/spec.png" alt="icon" class="w-6">
            </button>
            <a href="/after-sales/genuine-parts" class="border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto">
                <img src="../../../../public/assets/images/icons/setting.png" alt="icon" class="w-6">
            </a>
            <button class="border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto">
                <img src="../../../../public/assets/images/icons/calender.png" alt="icon" class="w-6">
            </button>

        </div>
        <transition name="slide-fade">
            <div
            v-if="isSidebar"
            class="right-0 sidebar fixed top-0 h-full w-35rem z-20 bg-gray-100 flex items-center justify-center pl-8 pr-24 border-gray-300 border-l-2 transition ease-out duration-300">
                <span class="block absolute right-0 top-0 p-5 hover:bg-gray-200 z-2 text-theme-red-500 cursor-pointer hover:text-theme-red-800" @click="clearEverything">
                    <svg class="fill-current w-10 h-10 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                </span>

                <financial-calculator></financial-calculator>
            </div>
        </transition>

    <div v-if="isBodyOverlay" class="body-overlay fixed inset-0 z-10 bg-black bg-opacity-50" @click="clearEverything"></div>
    <Keypress key-event="keydown" :key-code="27" @success="clearEverything" />

    </div>
</template>

<script>

    import FinancialCalculator from './sidebars/FinancialCalculator'
    export default {
        components: {
            FinancialCalculator,
            Keypress: () => import('vue-keypress')
        },
        data() {
            return {
                isSideButton: false,
                // isSideButtonStatus: 'drive'
            }
        },
        mounted () {
                // this.$store.commit('isSidebar', true)
                // this.$store.commit('isBodyOverlay', true)
        },
        computed: {
            isFinancialCalculator () {
                this.$store.state.isFinancialCalculator;
            },
            isSidebar () {
                return this.$store.state.isSidebar;
            },
            isBodyOverlay () {
                return this.$store.state.isBodyOverlay;
            }
        },
        methods: {
            OpenBroucherModal () {
                this.$store.commit('isModalOne', true)
            },
            sidebar () {
                this.$store.commit('isSidebar', true)
                this.$store.commit('isBodyOverlay', true)
            },
            clearEverything () {
                this.$store.commit('isSidebar', false)
                this.$store.commit('isBodyOverlay', false)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
