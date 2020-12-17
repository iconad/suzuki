<template>
    <div>
        <div @click="OpenBroucherModal">
            <iframe src="http://localhost:3000/baleno" class="w-full h-screen" title="Baleno"></iframe>
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
