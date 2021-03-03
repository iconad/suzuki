<template>
    <div>
        <div
        :class="isSideButton ? 'bg-gray-100' : '' "
        class="hidden fixed h-screen z-20 right-0 top-0 w-auto md:flex flex-col justify-center space-y-1 pr-3"
        >

            <div class="flex items-center space-x-1 float-button w-12 h-12 relative">
                <a href="/test-drive" class="absolute float-name right-0 border border-gray-400 bg-white bg-opacity-100 h-11 px-2 flex items-center justify-center rounded transition ease-linear duration-100 inline-block w-auto whitespace-nowrap">Test Drive</a>

                <a href="/test-drive" class="float-icon absolute right-0 w-8 h-12 border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto whitespace-nowrap">
                    <img src="../../../../public/assets/images/icons/drive.png" alt="icon" class="w-8">
                </a>
            </div>

            <div class="flex items-center space-x-1 float-button w-12 h-12 relative">
                <a href="/after-sales/genuine-parts" class="absolute float-name right-0 border border-gray-400 bg-white bg-opacity-100 h-11 px-2 flex items-center justify-center rounded transition ease-linear duration-100 inline-block w-auto whitespace-nowrap">Genuine Parts</a>

                <a href="/after-sales/genuine-parts" class="float-icon absolute right-0 w-8 h-12 border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto whitespace-nowrap">
                    <img src="../../../../public/assets/images/icons/setting.png" alt="icon" class="w-8">
                </a>
            </div>

            <div class="flex items-center space-x-1 float-button w-12 h-12 relative">
                <a href="/locations/abu-dhabi/services" class="absolute float-name right-0 border border-gray-400 bg-white bg-opacity-100 h-11 px-2 flex items-center justify-center rounded transition ease-linear duration-100 inline-block w-auto whitespace-nowrap">Services</a>

                <a href="/locations/abu-dhabi/services" class="float-icon absolute right-0 w-8 h-12 border border-gray-400 bg-white bg-opacity-100 focus:outline-none focus:bg-theme-red-500 focus:border-theme-red-500 p-2 flex items-center justify-center rounded hover:border-theme-red-500 hover:bg-theme-red-500 invert-img transition ease-linear duration-100 inline-block w-auto whitespace-nowrap">
                    <img src="../../../../public/assets/images/icons/calender.png" alt="icon" class="w-8">
                </a>
            </div>

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
    .float-button {
        .float-name {
            margin-right: -30px;
            opacity: 0;
            transition: 0.2s;
            z-index: 1;
            right: 55px;
        }
        .float-icon {
            z-index: 2;
        }
        &:hover {
            .float-name {
                margin-right: -0px;
                opacity: 1;
            }
        }
    }
</style>
