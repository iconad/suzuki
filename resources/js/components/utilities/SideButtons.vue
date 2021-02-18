<template>
    <div>
        <div
        :class="isSideButton ? 'bg-gray-100' : '' "
        class="hidden fixed h-screen z-20 right-0 top-0 w-auto md:flex flex-col justify-center space-y-1 pr-3"
        >
            <a href="/test-drive" class="border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto">
                <img src="../../../../public/assets/images/icons/drive.png" alt="icon" class="w-8">
            </a>
            <a href="/after-sales/genuine-parts" class="border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto">
                <img src="../../../../public/assets/images/icons/setting.png" alt="icon" class="w-6">
            </a>
            <a href="/locations/abu-dhabi/services" class="border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto">
                <img src="../../../../public/assets/images/icons/calender.png" alt="icon" class="w-6">
            </a>

        </div>

    </div>
</template>

<script>

    import FinancialCalculator from '../vehicle/sidebars/FinancialCalculator'
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

        methods: {
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
