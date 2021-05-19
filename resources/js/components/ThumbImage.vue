<template>
    <div :class="parentclasses">
        <v-lazy-image
            :class="classess"
            :src="`${publicUrl}/${id}/${image}`"
            :src-placeholder="`${publicUrl}/${id}/${image}`"
        />
    </div>
</template>

<script>
    export default {
        props: ['image', 'id', 'classess', 'parentclasses'],
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
.invert-logo {
    filter: invert(50%);
}
</style>
