<template>
    <div>
        <!-- <div @click="OpenBroucherModal">specs</div> -->
        <div class="hold-the-iframe">
            <iframe :src="iframe" class="w-full h-screen-40 md:h-screen-70 xl:h-screen" title="Baleno"></iframe>
        </div>

        <side-buttons></side-buttons>
        <spec-broucher :spec="spec" :brochure="brochure" :vehicle="vehicle"></spec-broucher>

    </div>
</template>

<script>
    import SideButtons from './SideButtons'
    import SpecBroucher from '../forms/SpecBroucher'

    export default {
        props: ['iframe', "brochure", 'spec', 'vid'],
        components: {
            SideButtons
        },
        mounted() {
            this.$store.dispatch('getVehicle', this.vid)
        },
        computed: {
            isVehicle () {
                return this.$store.state.isVehicle
            },
            vehicle () {
                return this.$store.state.vehicle
            }
        },
        methods: {
            OpenBroucherModal () {
                // localStorage.setItem("test", "value");
                // let isSpec = localStorage.getItem("isSpecSheet");
                // let test = localStorage;
                // console.log(isSpec)
                // console.log(test)
                this.$store.commit('isModalOne', true)
                // console.log(window.postMessage)
            }
        },
    }
</script>

<style lang="scss">
    .hold-the-iframe {
        &:before {
            content: "360 Loading...";
            font-size: 32px;
            z-index: -1;
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
</style>
