<template>
    <div>
        <v-lazy-image
            :class="classess"
            :src="`${publicUrl}${id}/${image}`"
            :src-placeholder="`${publicUrl}${id}/conversions/${mini}`"
        />
    </div>
</template>

<script>
    export default {
        props: ['image', 'id', 'classess'],
        computed: {
            mini() {
                return this.image.replace(/(\.[\w\d_-]+)$/i, "-mini.jpg");
            },
            small() {
                return this.image.replace(/(\.[\w\d_-]+)$/i, "-small.jpg");
            },
            publicUrl() {
                return this.$store.state.publicUrl;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
