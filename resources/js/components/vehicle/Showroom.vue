<template>
    <div>
        <div @click="OpenBroucherModal">
        <img src="https://i.ibb.co/PNP2dWb/showroom.jpg" alt="Showroom" class="w-full object-cover object-bottom">
        </div>

        <side-buttons></side-buttons>

    </div>
</template>

<script>
    import SideButtons from './SideButtons'
    export default {
        components: {
            SideButtons
        },
        methods: {
            OpenBroucherModal () {
                this.$store.commit('isModalOne', true)
            }
        },
    }
</script>
